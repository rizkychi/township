@extends('_template.master-admin')

@section('page_title', 'Tambah Anggota')

@section('title', 'Tambah Anggota')

@section('content')

@php
$rute = isset($data) ? route('admin.anggota.update', ['anggotum' => $data->id]) : route('admin.anggota.store');
@endphp

<!-- Table -->
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header">
        <div class="row">
          <div class="col-8">
            <h3 class="mb-0">Tambah Anggota</h3>
          </div>
        </div>
      </div>

      <div class="card-body">
        <!-- Form groups used in grid -->
        <form action="{{ $rute }}" method="post">
          @csrf
          @if (isset($data))
          {{ method_field('PUT') }}
          @endif
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label" for="id_lokal">ID Lokal</label>
                <input type="text" name="id_lokal" class="form-control" id="id_lokal" placeholder="" value="{{ old('id_lokal', @$data->id_lokal) ?? '#' }}">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label" for="kode_reg">ID_NAS KODE_REG</label>
                <input type="text" name="kode_reg" class="form-control" id="kode_reg" placeholder="" value="{{ old('kode_reg', @$data->kode_reg) }}">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label" for="no_hp">No. HP (Whatsapp)</label>
                <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="No. HP" value="{{ old('no_hp', @$data->no_hp) }}">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label" for="tgl_reg_tksci">Tanggal Registrasi TKSCI</label>
                <input type="date" name="tgl_reg_tksci" class="form-control" id="tgl_reg_tksci" placeholder="Tanggal" value="{{ old('tgl_reg_tksci', @$data->tgl_reg_tksci) }}">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label" for="status">Status</label>
                <select class="form-control" id="status" name="status" data-toggle="select">
                  @foreach ($statuses as $key => $val)
                    <option value="{{ $key }}" {{ old('status', @$data->status) == $key ? 'selected':''}}>{{ $val }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-9">
              <div class="form-group">
                <label class="form-control-label" for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="" value="{{ old('keterangan', @$data->keterangan) }}">
              </div>
            </div>
          </div>

          <hr class="mt-2 mb-4">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="nama">Nama Anggota</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" value="{{ old('nama', @$data->nama) }}">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label" for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" value="{{ old('tempat_lahir', @$data->tempat_lahir) }}">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label" for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir" value="{{ old('tgl_lahir', @$data->tgl_lahir) }}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label" for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat">{{ old('alamat', @$data->alamat) }}</textarea>
              </div>
            </div>
          </div>

          <hr class="mt-2 mb-4">

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label" for="kendaraan_jenis">Jenis Kijang</label>
                <input type="text" name="kendaraan_jenis" class="form-control" id="kendaraan_jenis" placeholder="Jenis Kijang" value="{{ old('kendaraan_jenis', @$data->kendaraan_jenis) }}">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label" for="kendaraan_warna">Warna</label>
                <input type="text" name="kendaraan_warna" class="form-control" id="kendaraan_warna" placeholder="Warna" value="{{ old('kendaraan_warna', @$data->kendaraan_warna) }}">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label" for="kendaraan_nopol">Nomor Polisi</label>
                <input type="text" name="kendaraan_nopol" class="form-control" id="kendaraan_nopol" placeholder="Nomor Polisi" value="{{ old('kendaraan_nopol', @$data->kendaraan_nopol) }}">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label" for="kendaraan_tahun">Tahun</label>
                <input type="number" name="kendaraan_tahun" class="form-control" id="kendaraan_tahun" placeholder="Tahun" value="{{ old('kendaraan_tahun', @$data->kendaraan_tahun) }}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 text-right">
              <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
              <a href="{{ route('admin.anggota.index') }}" class="btn btn-danger"> <i class="fas fa-times"></i> Cancel</a>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection