<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\EnrollStatus;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EnrollmentController extends Controller
{
    public $title = 'Pendaftar';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.enrollment.index');
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
        return redirect()->route('admin.enrollment.edit', ['enrollment' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mem = Enrollment::findOrFail($id);
        $statuses = new EnrollStatus();
        return view('admin.enrollment.form')
            ->with('data', $mem)
            ->with('statuses', $statuses->getList());
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
        $mem = Enrollment::find($id);
        if (!$mem) {
            return back()->with('errors', 'Terjadi kesalahan, '.$this->title.' tidak ditemukan')->withInput();
        }

        $mem->no_hp = $request->no_hp;
        $mem->nama = $request->nama;
        $mem->tempat_lahir = $request->tempat_lahir;
        $mem->tgl_lahir = $request->tgl_lahir;
        $mem->alamat = $request->alamat;
        $mem->kendaraan_jenis = $request->kendaraan_jenis;
        $mem->kendaraan_warna = $request->kendaraan_warna;
        $mem->kendaraan_nopol = $request->kendaraan_nopol;
        $mem->kendaraan_tahun = $request->kendaraan_tahun;
        $mem->status = $request->status;

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
            $data = Enrollment::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $cols = '<div class="d-flex">';
                    $cols .= '<a href="#" data-id="' . $row->id . '" class="btn-sm btn-info mx-1 btn-lihat" title="Lihat"><i class="fas fa-eye"></i></a>';
                    $cols .= '<a href="' . route('admin.enrollment.edit', ['enrollment' => $row->id]) . '" class="btn-sm btn-primary mx-1" title="Edit"><i class="fas fa-pen"></i></a>';
                    // $cols .= '<a href="" data-url="' . route('admin.enrollment.delete', ['enrollment' => $row->id]) . '" data-text="' . $this->title . '" class="btn-sm btn-danger mx-1" onclick="deleteConfirm(event, this)" title="Hapus"><i class="fas fa-trash"></i></a>';
                    $cols .= '</div>';
                    return $cols;
                })
                ->rawColumns(['action', 'status_label_html'])
                ->make(true);
        }
    }

    // Get detail
    public function getDetail(Request $request) {
        $anggota = Enrollment::findOrFail($request->id);
        echo json_encode($anggota);
        exit;
    }
}
