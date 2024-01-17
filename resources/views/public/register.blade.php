@extends('_template.master-public-news')

@section('page_title', 'Pendaftaran Anggota')

@section('title', 'Pendaftaran Anggota')

@section('content')
    <!-- post wraper start-->
    <section class="block-wrapper mt-3 mb-3">
        <div class="container">
           
            <div class="row">
                <div class="col-lg-12">
                    <div class="row mb-30">
                        <div class="col-lg-12">
                           <div class="ts-grid-box pt-3">
                                <ol class="ts-breadcrumb">
                                    <li>
                                        <a href="{{ route('home') }}">
                                            <i class="fa fa-home"></i>
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('register') }}">Pendaftaran Anggota</a>
                                    </li>
                                </ol>
                                <div class="clearfix entry-cat-header">
                                    <h2 class="ts-title">Pendaftaran Anggota TKSCI Jogmatis</h2>
                                </div>

                                <form method="post" class="pt-md-4 pt-0" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="nama">Nama Anggota</label>
                                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" required value="{{ old('nama', @$data->nama) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-control-label" for="tempat_lahir">Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" required value="{{ old('tempat_lahir', @$data->tempat_lahir) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-control-label" for="tgl_lahir">Tanggal Lahir</label>
                                                <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir" required value="{{ old('tgl_lahir', @$data->tgl_lahir) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-control-label" for="no_hp">No. HP (Whatsapp)</label>
                                                <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="No. HP" maxlength="13" pattern=".{9,13}" title="9 to 13 characters" inputmode="numeric" oninput="this.value = this.value.replace(/\D+/g, '')" required value="{{ old('no_hp', @$data->no_hp) }}">
                                            </div>
                                        </div>
    
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="form-control-label" for="alamat">Alamat</label>
                                                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat" required>{{ old('alamat', @$data->alamat) }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-control-label" for="kendaraan_jenis">Jenis Kijang</label>
                                                <input type="text" name="kendaraan_jenis" class="form-control" id="kendaraan_jenis" placeholder="Jenis Kijang" required value="{{ old('kendaraan_jenis', @$data->kendaraan_jenis) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-control-label" for="kendaraan_warna">Warna</label>
                                                <input type="text" name="kendaraan_warna" class="form-control" id="kendaraan_warna" placeholder="Warna" required value="{{ old('kendaraan_warna', @$data->kendaraan_warna) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-control-label" for="kendaraan_nopol">Nomor Polisi</label>
                                                <input type="text" name="kendaraan_nopol" class="form-control" id="kendaraan_nopol" placeholder="Nomor Polisi" required value="{{ old('kendaraan_nopol', @$data->kendaraan_nopol) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-control-label" for="kendaraan_tahun">Tahun</label>
                                                <input type="text" name="kendaraan_tahun" class="form-control" id="kendaraan_tahun" placeholder="Tahun" maxlength="4" pattern=".{4}" title="4 characters" inputmode="numeric" oninput="this.value = this.value.replace(/\D+/g, '')" required value="{{ old('kendaraan_tahun', @$data->kendaraan_tahun) }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-control-label" for="file_stnk">STNK</label>
                                                <input type="file" name="file_stnk" class="form-control" id="file_stnk" accept="image/jpg,image/jpeg" value="{{ old('file_stnk') }}" <?= (old('base64_stnk') == '') ? 'required':'' ?>>
                                                <input type="hidden" name="base64_stnk" id="base64_stnk" value="{{ old('base64_stnk') }}">
                                                <img class="rounded mt-2 w-100" id="thumb_stnk" src="{{ old('base64_stnk') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-control-label" for="file_sim">SIM</label>
                                                <input type="file" name="file_sim" class="form-control" id="file_sim" accept="image/jpg,image/jpeg" value="{{ old('file_sim') }}" <?= (old('base64_sim') == '') ? 'required':'' ?>>
                                                <input type="hidden" name="base64_sim" id="base64_sim" value="{{ old('base64_sim') }}">
                                                <img class="rounded mt-2 w-100" id="thumb_sim" src="{{ old('base64_sim') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 text-center">
                                          <button type="submit" class="btn btn-primary">Daftar</button>
                                        </div>
                                    </div>

                                </form>
                           </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- row end-->
        </div>
        <!-- container end-->
    </section>
    <!-- post wraper end-->

    <div class="modal fade" id="modal_stnk" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Upload Foto STNK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <img class="w-100" id="image_stnk" style="max-height: calc(100vh - 250px)">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="crop_stnk">Upload</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_sim" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Upload Foto SIM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <img class="w-100" id="image_sim" style="max-height: calc(100vh - 250px)">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="crop_sim">Upload</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@php
    function getImage($text) {
        $regex = '/(data:image\/[^;]+;base64[^"]+)/i';
        preg_match($regex, $text, $matches_out);
        
        if ($matches_out) {
            return $matches_out[0];
        } else {
            return asset('src/img/No-Image-Placeholder.png');
        }
    }
@endphp

@push('scripts')
<script type="text/javascript">
    $(function() {
        var ava_stnk = document.getElementById('thumb_stnk');
        var image_stnk = document.getElementById('image_stnk');
        var input_stnk = document.getElementById('file_stnk');
        var crop_stnk = document.getElementById('crop_stnk');
        var base64_stnk = document.getElementById('base64_stnk');
        var ava_sim = document.getElementById('thumb_sim');
        var image_sim = document.getElementById('image_sim');
        var input_sim = document.getElementById('file_sim');
        var crop_sim = document.getElementById('crop_sim');
        var base64_sim = document.getElementById('base64_sim');

        var $modal_stnk = $('#modal_stnk');
        var $modal_sim = $('#modal_sim');
        var cropper;

        input_stnk.addEventListener('change', function (e) {
            var files = e.target.files;
            var done = function (url) {
                image_stnk.src = url;
                $modal_stnk.modal('show');
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
        input_sim.addEventListener('change', function (e) {
            var files = e.target.files;
            var done = function (url) {
                image_sim.src = url;
                $modal_sim.modal('show');
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

        $modal_stnk.on('shown.bs.modal', function () {
            cropper = new Cropper(image_stnk, {
                aspectRatio: 690/225,
                viewMode: 2,
                autoCropArea: 1
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });
        $modal_sim.on('shown.bs.modal', function () {
            cropper = new Cropper(image_sim, {
                aspectRatio: 640/480,
                viewMode: 2,
                autoCropArea: 1
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        crop_stnk.addEventListener('click', function () {
            var canvas;
            $modal_stnk.modal('hide');

            if (cropper) {
                canvas = cropper.getCroppedCanvas({
                    width: 690,
                    height: 225,
                });
                ava_stnk.src = canvas.toDataURL('image/jpeg');
                base64_stnk.value = canvas.toDataURL('image/jpeg');
            }
        });
        crop_sim.addEventListener('click', function () {
            var canvas;
            $modal_sim.modal('hide');

            if (cropper) {
                canvas = cropper.getCroppedCanvas({
                    width: 640,
                    height: 480,
                });
                ava_sim.src = canvas.toDataURL('image/jpeg');
                base64_sim.value = canvas.toDataURL('image/jpeg');
            }
        });
    });
</script>
@endpush