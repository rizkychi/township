<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Anggota;
use App\Models\Banner;
use App\Models\Content;
use App\Models\Enrollment;
use App\Models\Topic;
use Illuminate\Http\Request;
use Validator;

class HomeController extends Controller
{
    public $colors = [
        'Pengumuman' => 'yellow',
        'Berita' => 'blue',
        'Event' => 'pink',
        'Artikel' => 'green',
        'Arsip' => 'blue-dark'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::all();
        $popular = Content::where('published', '=', 1)->orderBy('views', 'DESC')->skip(0)->take(5)->get();
        $latest = Content::where('published', '=', 1)->orderBy('created_at', 'DESC')->skip(0)->take(6)->get();

        $ad_top = Ads::where('position', '=', 'Atas')->first();
        $ad_bot = Ads::where('position', '=', 'Bawah')->first();

        return view('public.home')
            ->with('banner', $banner)
            ->with('popular', $popular)
            ->with('latest', $latest)
            ->with('colors', $this->colors)
            ->with('ad_top', $ad_top)
            ->with('ad_bot', $ad_bot);
    }

    public function topic($topic)
    {
        $tpc = new Topic();
        $tpc = $tpc->getList()->toArray();
        if (!in_array($topic, $tpc)) {
            abort('404');
        }

        $list = Content::where('topic', '=', $topic)->where('published', '=', 1)->orderBy('created_at', 'DESC')->paginate(5);

        return view('public.topic')
            ->with('topic', $topic)
            ->with('list', $list)
            ->with('colors', $this->colors);
    }

    public function post($url)
    {
        $content = Content::where('url', '=', $url)->first();
        if (!$content || $content->published != 1) {
            abort('404');
        }

        // add view
        $content->views++;
        $content->save();

        $related = Content::where('topic', '=', $content->topic)->where('id', '!=', $content->id)->where('published', '=', 1)->orderBy('created_at', 'DESC')->skip(0)->take(5)->get();
        // $popular = Content::where('published', '=', 1)->orderBy('views')->skip(0)->take(5)->get();

        $ad_top = Ads::where('position', '=', 'Atas')->first();
        $ad_bot = Ads::where('position', '=', 'Bawah')->first();

        return view('public.post')
            ->with('content', $content)
            ->with('next', $content->getNext())
            ->with('prev', $content->getPrev())
            ->with('colors', $this->colors)
            // ->with('popular', $popular)
            ->with('related', $related)
            ->with('ad_top', $ad_top)
            ->with('ad_bot', $ad_bot);
    }

    public function search(Request $request)
    {
        $q = $request->q;
        $list = Content::where('published', '=', 1)
            ->where(function ($query) use ($q) {
                $query
                    ->where('title', 'LIKE', "%$q%")
                    ->orWhere('desc', 'LIKE', "%$q%");
            })
            ->orderBy('created_at', 'DESC')
            ->paginate(5)
            ->appends(request()->query());

        return view('public.search')
            ->with('list', $list)
            ->with('colors', $this->colors)
            ->with('query', $request->q);
    }

    public function registerForm()
    {
        return view('public.register');
    }

    public function register(Request $request)
    {
        // Check required
        $validator = Validator::make($request->all(), [
            'base64_stnk'     => 'required',
            'base64_sim'     => 'required',
        ],[
            'base64_stnk.required' => 'STNK tidak boleh kosong!',
            'base64_sim.required' => 'SIM tidak boleh kosong!',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

        // Create new object
        $mem = new Enrollment();
        $mem->nama = $request->nama;
        $mem->tempat_lahir = $request->tempat_lahir;
        $mem->tgl_lahir = $request->tgl_lahir;
        $mem->no_hp = $request->no_hp;
        $mem->alamat = $request->alamat;
        $mem->kendaraan_jenis = $request->kendaraan_jenis;
        $mem->kendaraan_warna = $request->kendaraan_warna;
        $mem->kendaraan_nopol = $request->kendaraan_nopol;
        $mem->kendaraan_tahun = $request->kendaraan_tahun;
        $mem->file_stnk = $request->base64_stnk;
        $mem->file_sim = $request->base64_sim;
        $mem->status = 'baru';

        // Store into database
        if ($mem->save()) {
            return redirect()->route('home')->with('success', 'Pendaftaran berhasil!');
        } else {
            return back()->with('errors', 'Terjadi kesalahan, silahkan coba kembali')->withInput();
        }
    }

    public function member()
    {
        $list = Anggota::orderBy('id', 'ASC')->paginate(10);

        return view('public.member')
            ->with('list', $list)
            ->with('colors', $this->colors);
    }
}
