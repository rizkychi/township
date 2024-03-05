@php
$rute = isset($data) ? route('admin.banner.update', ['banner' => $data->id]) : route('admin.banner.store');
$formtype = isset($data) ? 'Edit' : 'Tambah';
@endphp

@extends('_template.master-admin')

@section('page_title', $formtype.' Banner')

@section('title', $formtype.' Banner')

@section('content')

<!-- Table -->
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header">
        <div class="row">
          <div class="col-8">
            <h3 class="mb-0">{{ $formtype }} Banner</h3>
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
          @if (!isset($data))
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                  <label class="form-control-label" for="file_banner">Banner</label>
                  <input type="file" name="file_banner" class="form-control" id="file_banner" accept="image/jpg,image/jpeg" value="{{ old('file_banner') }}" <?= (old('base64_banner') == '') ? 'required':'' ?>>
                  <input type="hidden" name="base64_banner" id="base64_banner" value="{{ old('base64_banner') }}">
                  <img class="rounded mt-2 w-100" id="thumb_banner" src="{{ old('base64_banner') }}">
              </div>
            </div>
          </div>
          @endif

          <div class="row">
            <div class="col-3">
              <div class="form-group">
                <label class="form-control-label" for="active">Aktif?</label>
                <div class="form-switch" id="active">
                  <label class="custom-toggle">
                    <input type="checkbox" name="active" {{ old('active', @$data->active) ?? !isset($data) ? 'checked' : '' }}>
                    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                  </label>
                </div>
              </div>
            </div>
            <div class="col-9 text-right pt-3">
              <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
              <a href="{{ route('admin.banner.index') }}" class="btn btn-light"> <i class="fas fa-times"></i> Cancel</a>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_banner" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modalLabel">Upload Foto Banner</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <div class="img-container">
                  <img class="w-100" id="image_banner" style="max-height: calc(100vh - 250px)">
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-primary" id="crop_banner">Upload</button>
          </div>
      </div>
  </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(function() {
        var ava_banner = document.getElementById('thumb_banner');
        var image_banner = document.getElementById('image_banner');
        var input_banner = document.getElementById('file_banner');
        var crop_banner = document.getElementById('crop_banner');
        var base64_banner = document.getElementById('base64_banner');

        var $modal_banner = $('#modal_banner');
        var cropper;

        input_banner.addEventListener('change', function (e) {
            var files = e.target.files;
            var done = function (url) {
                image_banner.src = url;
                $modal_banner.modal('show');
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

        $modal_banner.on('shown.bs.modal', function () {
            cropper = new Cropper(image_banner, {
                aspectRatio: 1280/720,
                viewMode: 2,
                autoCropArea: 1
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        crop_banner.addEventListener('click', function () {
            var canvas;
            $modal_banner.modal('hide');

            if (cropper) {
                canvas = cropper.getCroppedCanvas({
                    width: 1280,
                    height: 720,
                });
                ava_banner.src = canvas.toDataURL('image/jpeg');
                base64_banner.value = canvas.toDataURL('image/jpeg');
            }
        });
    });
</script>
@endpush