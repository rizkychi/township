@php
$rute = isset($data) ? route('admin.anggota.update', ['anggotum' => $data->id]) : route('admin.anggota.store');
$formtype = isset($data) ? 'Edit' : 'Tambah';
@endphp

@extends('_template.master-admin')

@section('page_title', $formtype.' Anggota')

@section('title', $formtype.' Anggota')

@section('content')

<!-- Table -->
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header">
        <div class="row">
          <div class="col-8">
            <h3 class="mb-0">{{ $formtype }} Anggota</h3>
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
            <div class="col-md-9">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label" for="id_lokal">ID Lokal</label>
                    <input type="text" name="id_lokal" class="form-control" id="id_lokal" placeholder="" value="{{ old('id_lokal', @$data->id_lokal) ?? '#' }}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label" for="kode_reg">ID_NAS KODE_REG</label>
                    <input type="text" name="kode_reg" class="form-control" id="kode_reg" placeholder="ID_NAS KODE_REG" value="{{ old('kode_reg', @$data->kode_reg) }}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label" for="no_hp">No. HP (Whatsapp)</label>
                    <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="No. HP" value="{{ old('no_hp', @$data->no_hp) }}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label" for="tgl_reg_tksci">Tanggal Registrasi TKSCI</label>
                    <input type="date" name="tgl_reg_tksci" class="form-control" id="tgl_reg_tksci" placeholder="Tanggal" value="{{ old('tgl_reg_tksci', @$data->tgl_reg_tksci) }}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label" for="status">Status</label>
                    <select class="form-control" id="status" name="status" data-toggle="select">
                      @foreach ($statuses as $key => $val)
                        <option value="{{ $key }}" {{ old('status', @$data->status) == $key ? 'selected':''}}>{{ $val }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="keterangan">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan" value="{{ old('keterangan', @$data->keterangan) }}">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label" for="file_foto">Foto</label>
                <input type="file" name="file_foto" class="form-control" id="file_foto" accept="image/jpg,image/jpeg" value="{{ old('file_foto') }}">
                <input type="hidden" name="base64_foto" id="base64_foto" value="{{ old('base64_foto') }}">
                <img class="rounded mx-auto d-block mt-2 w-75" id="thumb_foto" src="{{ old('base64_foto', @$data->avatar) ?? 'https://bootdey.com/img/Content/avatar/avatar1.png' }}">
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
              <a href="{{ route('admin.anggota.index') }}" class="btn btn-light"> <i class="fas fa-times"></i> Cancel</a>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_foto" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modalLabel">Upload Foto Anggota</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <div class="img-container">
                  <img class="w-100" id="image_foto" style="max-height: calc(100vh - 250px)">
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-primary" id="crop_foto">Upload</button>
          </div>
      </div>
  </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(function() {
        var ava_foto = document.getElementById('thumb_foto');
        var image_foto = document.getElementById('image_foto');
        var input_foto = document.getElementById('file_foto');
        var crop_foto = document.getElementById('crop_foto');
        var base64_foto = document.getElementById('base64_foto');

        var $modal_foto = $('#modal_foto');
        var cropper;

        input_foto.addEventListener('change', function (e) {
            var files = e.target.files;
            var done = function (url) {
                image_foto.src = url;
                $modal_foto.modal('show');
            };

            if (files && files.length > 0) {
                let file = files[0];

                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        });

        $modal_foto.on('shown.bs.modal', function () {
            cropper = new Cropper(image_foto, {
                aspectRatio: 256/256,
                viewMode: 2,
                autoCropArea: 1
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        crop_foto.addEventListener('click', function () {
            var canvas;
            $modal_foto.modal('hide');

            if (cropper) {
                canvas = cropper.getCroppedCanvas({
                    width: 256,
                    height: 256,
                });
                ava_foto.src = canvas.toDataURL('image/jpeg');
                base64_foto.value = canvas.toDataURL('image/jpeg');
            }
        });
    });
</script>
@endpush

@push('styles')
  <style>
    .cropper-view-box {
      border-radius: 50%;
    }
    .cropper-face {
      background-color:inherit !important;
    }
    .cropper-dashed {
      display: none;
    }
  </style>
@endpush