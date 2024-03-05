<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ContentController extends Controller
{
    public $title = 'Konten';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.content.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = new Topic();
        return view('admin.content.form')
            ->with('topics', $topics->getList());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'desc'     => 'required',
        ],[
            'title.required' => 'Judul tidak boleh kosong!',
            'desc.required' => 'Konten tidak boleh kosong!',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

        // Create new object
        $cont = new Content();
        $cont->title = $request->title;
        $cont->desc = $request->desc;
        $cont->topic = $request->topic;
        $cont->thumbnail = $this->getThumbnail($request->desc);
        $cont->published = $request->published == 'on' ? 1 : 0;

        // url 
        $title_url = preg_replace("/[^a-zA-Z0-9\s+]+/", '', $cont->title);
        $title_url = strtolower(str_replace(' ', '-', $title_url));
        $url = date('Y-m-') . $title_url;

        $exist = Content::where('url', 'LIKE', '%'.$url.'%')->get();
        if ($exist) {
            $url = $url . '-' . $exist->count();
        }

        $cont->url = $url;

        // Store into database
        if ($cont->save()) {
            return redirect()->route('admin.content.index')->with('success', 'Penambahan ' . $this->title . ' baru berhasil');
        } else {
            return back()->with('errors', 'Terjadi kesalahan, silahkan coba kembali')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('admin.content.edit', ['content' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cont = Content::findOrFail($id);
        $topics = new Topic();
        return view('admin.content.form')
            ->with('data', $cont)
            ->with('topics', $topics->getList());
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
        $cont = Content::find($id);
        if (!$cont) {
            return back()->with('errors', 'Terjadi kesalahan, ' . $this->title . ' tidak ditemukan')->withInput();
        }

        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'desc'     => 'required',
        ],[
            'title.required' => 'Judul tidak boleh kosong!',
            'desc.required' => 'Konten tidak boleh kosong!',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

        $cont->title = $request->title;
        $cont->desc = $request->desc;
        $cont->topic = $request->topic;
        $cont->thumbnail = $this->getThumbnail($request->desc);
        $cont->published = $request->published == 'on' ? 1 : 0;

        if ($cont->update()) {
            return redirect()->route('admin.content.index')->with('success', 'Perubahan ' . $this->title . ' berhasil');
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
            $data = Content::orderBy('created_at', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $cols = '<div class="d-flex">';
                    $cols .= '<a href="' . route('admin.content.edit', ['content' => $row->id]) . '" class="btn-sm btn-primary mx-1" title="Edit"><i class="fas fa-pen"></i></a>';
                    $cols .= '<a href="" data-url="' . route('admin.content.delete', ['content' => $row->id]) . '" data-text="' . $this->title . '" class="btn-sm btn-danger mx-1" onclick="deleteConfirm(event, this)" title="Hapus"><i class="fas fa-trash"></i></a>';
                    $cols .= '</div>';
                    return $cols;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    // Delete data
    public function delete($id)
    {
        $cont = Content::findOrFail($id);
        if ($cont->delete()) {
            return back()->with('success', 'Dihapus');
        } else {
            return back()->with('errors', 'Terjadi kesalahan!');
        }
    }

    function getThumbnail($text) {
        $matches = [];
        $src = '/src/img/No-Image-Placeholder.png';

        if(preg_match('/src="(.*?)"/', $text, $matches)) {
            $src = $matches[1];
        }

        return $src;
    }
}
