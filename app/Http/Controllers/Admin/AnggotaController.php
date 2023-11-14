<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;

use App\Models\Anggota;

class AnggotaController extends Controller
{
    public $title = 'Anggota';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.anggota.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.anggota.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create new object
        $mem = new Anggota();
        $mem->id_lokal = $request->id_lokal;
        $mem->kode_reg = $request->kode_reg;
        $mem->no_hp = $request->no_hp;
        $mem->tgl_reg_tksci = $request->tgl_reg_tksci;
        $mem->nama = $request->nama;
        $mem->tempat_lahir = $request->tempat_lahir;
        $mem->tgl_lahir = $request->tgl_lahir;
        $mem->alamat = $request->alamat;
        $mem->kendaraan_jenis = $request->kendaraan_jenis;
        $mem->kendaraan_warna = $request->kendaraan_warna;
        $mem->kendaraan_nopol = $request->kendaraan_nopol;
        $mem->kendaraan_tahun = $request->kendaraan_tahun;

        // Store into database
        if ($mem->save()) {
            return redirect()->route('admin.anggota.index')->with('success', 'Penambahan ' . $this->title . ' baru berhasil');
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
        return redirect()->route('admin.anggota.edit', ['anggotum' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mem = Anggota::findOrFail($id);
        return view('admin.anggota.form')
            ->with('data', $mem);
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
        $mem = Anggota::find($id);
        if (!$mem) {
            return back()->with('errors', 'Terjadi kesalahan, '.$this->title.' tidak ditemukan')->withInput();
        }

        $mem->id_lokal = $request->id_lokal;
        $mem->kode_reg = $request->kode_reg;
        $mem->no_hp = $request->no_hp;
        $mem->tgl_reg_tksci = $request->tgl_reg_tksci;
        $mem->nama = $request->nama;
        $mem->tempat_lahir = $request->tempat_lahir;
        $mem->tgl_lahir = $request->tgl_lahir;
        $mem->alamat = $request->alamat;
        $mem->kendaraan_jenis = $request->kendaraan_jenis;
        $mem->kendaraan_warna = $request->kendaraan_warna;
        $mem->kendaraan_nopol = $request->kendaraan_nopol;
        $mem->kendaraan_tahun = $request->kendaraan_tahun;

        if ($mem->update()) {
            return redirect()->route('admin.anggota.index')->with('success', 'Perubahan ' . $this->title . ' berhasil');
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
            $data = Anggota::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $cols = '<div class="d-flex">';
                    $cols .= '<a href="' . route('admin.anggota.edit', ['anggotum' => $row->id]) . '" class="btn-sm btn-primary mx-1" title="Edit"><i class="fas fa-pen"></i></a>';
                    $cols .= '<a href="" data-url="' . route('admin.anggota.delete', ['anggota' => $row->id]) . '" data-text="' . $this->title . '" class="btn-sm btn-danger mx-1" onclick="deleteConfirm(event, this)" title="Hapus"><i class="fas fa-trash"></i></a>';
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
        $anggota = Anggota::findOrFail($id);
        if ($anggota->delete()) {
            return back()->with('success', 'Dihapus');
        } else {
            return back()->with('errors', 'Terjadi kesalahan!');
        }
    }
}
