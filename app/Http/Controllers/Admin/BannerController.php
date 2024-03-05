<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Validator;

class BannerController extends Controller
{
    public $title = 'Konten';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check required
        $validator = Validator::make($request->all(), [
            'base64_banner'     => 'required',
        ],[
            'base64_banner.required' => 'Banner tidak boleh kosong!',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

        // Check Banner
        $exist = Banner::all();
        if ($exist->count() >= 10) {
            return back()->with('errors', 'Sudah mencapai batas maksimal')->withInput();
        }

        // Create new object
        $bann = new Banner();
        $bann->image = $request->base64_banner;
        $bann->active = $request->active == 'on' ? 1 : 0;

        // Store into database
        if ($bann->save()) {
            return redirect()->route('admin.banner.index')->with('success', 'Penambahan ' . $this->title . ' baru berhasil');
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
        return redirect()->route('admin.banner.edit', ['banner' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bann = Banner::findOrFail($id);
        return view('admin.banner.form')
            ->with('data', $bann);
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
        $bann = Banner::find($id);
        if (!$bann) {
            return back()->with('errors', 'Terjadi kesalahan, ' . $this->title . ' tidak ditemukan')->withInput();
        }

        $bann->active = $request->active == 'on' ? 1 : 0;

        if ($bann->update()) {
            return redirect()->route('admin.banner.index')->with('success', 'Perubahan ' . $this->title . ' berhasil');
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
            $data = Banner::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $cols = '<div class="d-flex">';
                    $cols .= '<a href="' . route('admin.banner.edit', ['banner' => $row->id]) . '" class="btn-sm btn-primary mx-1" title="Edit"><i class="fas fa-pen"></i></a>';
                    $cols .= '<a href="" data-url="' . route('admin.banner.delete', ['banner' => $row->id]) . '" data-text="' . $this->title . '" class="btn-sm btn-danger mx-1" onclick="deleteConfirm(event, this)" title="Hapus"><i class="fas fa-trash"></i></a>';
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
        $bann = Banner::findOrFail($id);
        if ($bann->delete()) {
            return back()->with('success', 'Dihapus');
        } else {
            return back()->with('errors', 'Terjadi kesalahan!');
        }
    }
}
