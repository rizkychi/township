<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Validator;

class AdsController extends Controller
{
    public $title = 'Iklan';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ads.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('admin.ads.edit', ['ads' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Ads::findOrFail($id);
        return view('admin.ads.form')
            ->with('data', $ad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Check required
        // $validator = Validator::make($request->all(), [
        //     'base64_ads'     => 'required',
        // ],[
        //     'base64_ads.required' => 'Ads tidak boleh kosong!',
        // ]);

        // if ($validator->fails()) {
        //     return back()->with('errors', $validator->messages()->all()[0])->withInput();
        // }

        // Find data
        $ad = Ads::find($id);
        if (!$ad) {
            return back()->with('errors', 'Terjadi kesalahan, '.$this->title.' tidak ditemukan')->withInput();
        }

        // Update object
        if ($request->base64_ads <> '') {
            $ad->image = $request->base64_ads;
        }
        $ad->url = $request->url;
        $ad->active = $request->active == 'on' ? 1 : 0;

        // Store into database
        if ($ad->update()) {
            return redirect()->route('admin.ads.index')->with('success', 'Perubahan ' . $this->title . ' berhasil');
        } else {
            return back()->with('errors', 'Terjadi kesalahan, silahkan coba kembali')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Display list in json
    public function json(Request $request)
    {
        if ($request->ajax()) {
            $data = Ads::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $cols = '<div class="d-flex">';
                    $cols .= '<a href="' . route('admin.ads.edit', ['ad' => $row->id]) . '" class="btn-sm btn-primary mx-1" title="Edit"><i class="fas fa-pen"></i></a>';
                    $cols .= '</div>';
                    return $cols;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
