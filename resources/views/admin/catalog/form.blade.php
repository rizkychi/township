@php
$rute = isset($data) ? route('admin.catalog.update', ['catalog' => $data->id]) : route('admin.catalog.store');
$formtype = isset($data) ? 'Edit' : 'Tambah';
@endphp

@extends('_template.master-admin')

@section('page_title', $formtype.' Katalog')

@section('title', $formtype.' Katalog')

@section('content')

<!-- Table -->
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header">
        <div class="row">
          <div class="col-8">
            <h3 class="mb-0">{{ $formtype }} Konten</h3>
          </div>
        </div>
      </div>

      <div class="card-body">
        <!-- Form groups used in grid -->
        <form action="{{ $rute }}" method="post" enctype="multipart/form-data">
          @csrf
          @if (isset($data))
          {{ method_field('PUT') }}
          @endif
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label" for="product_owner">Nama Owner/Toko</label>
                <input type="text" name="product_owner" class="form-control" id="product_owner" placeholder="Nama Owner/Toko" value="{{ old('product_owner', @$data->product_owner) }}" required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label" for="product_name">Nama Produk</label>
                <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Nama Produk" value="{{ old('product_name', @$data->product_name) }}" required>
              </div>
            </div>
            
            <div class="col-md-8">
              <div class="form-group">
                <label class="form-control-label" for="product_link">Link Produk</label>
                <input type="url" name="product_link" class="form-control" id="product_link" placeholder="Link Produk" value="{{ old('product_link', @$data->product_link) }}">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="product_price">Harga Produk</label>
                <input type="number" min="0" step="100" name="product_price" class="form-control" id="product_price" placeholder="Harga Produk (Rupiah)" value="{{ old('product_price', @$data->product_price) }}" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label" for="product_description">Deskripsi Produk</label>
                <textarea class="form-control" id="product_description" name="product_description" placeholder="Deskripsi Produk" rows="3">{{ old('product_description', @$data->product_description) }}</textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label" for="product_images">Gambar Produk</label>
                <input type="file" name="product_images[]" class="form-control" id="product_images" multiple accept="image/jpeg,image/png">
                <small class="form-text text-muted">Maksimal 4 gambar. Hanya format JPG, JPEG, dan PNG yang diperbolehkan. Maksimal ukuran gambar 2MB</small>
                <div id="image-error" class="text-danger mt-2 text-sm" style="display: none;">Jumlah gambar lebih dari 4</div>
              </div>

              @if(isset($data) && $data->catalog_images)
                <div class="form-group">
                  <label class="form-control-label">Gambar Produk:</label>
                  <div class="row justify-content-start">
                    @foreach($data->catalog_images as $image)
                        <div class="col-auto">
                          <img src="{{ asset('/media/products/' . $image->image_path) }}" class="img-fluid mb-2" alt="Gambar Produk" style="object-fit: cover; width: 100px; height: 100px;">
                          <div class="d-flex justify-content-center">
                            <a href="{{ asset('/media/products/' . $image->image_path) }}" target="_blank" type="button" class="btn btn-primary btn-sm" title="Lihat">
                              <i class="fa fa-eye"></i>
                            </a>
                            <a href="" data-url="{{ route('admin.catalog.image.delete', ['id' => $image->id]) }}" data-text="Gambar" class="btn btn-danger btn-sm" onclick="deleteConfirm(event, this)" title="Hapus">
                              <i class="fa fa-trash-alt"></i>
                            </a>
                          </div>
                        </div>
                    @endforeach
                  </div>
                </div>
              @endif
            </div>
          </div>

          <div class="row">
            <div class="col-3">
              <div class="form-group">
                <label class="form-control-label" for="published">Publish?</label>
                <div class="form-switch" id="published">
                  <label class="custom-toggle">
                    <input type="checkbox" name="published" {{ old('published', @$data->published) ?? !isset($data) ? 'checked' : '' }}>
                    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                  </label>
                </div>
              </div>
            </div>
            <div class="col-9 text-right pt-3">
              <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
              <a href="{{ route('admin.catalog.index') }}" class="btn btn-light"> <i class="fas fa-times"></i> Cancel</a>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
  document.getElementById('product_link').addEventListener('focus', function(e) {
    if (!e.target.value) {
      e.target.value = 'https://';
    }
  });

  document.getElementById('product_link').addEventListener('input', function(e) {
    if (e.target.value === 'https://') {
      e.target.setSelectionRange(e.target.value.length, e.target.value.length);
    }
  });

  document.getElementById('product_images').addEventListener('change', function(e) {
    if (e.target.files.length > 4) {
      document.getElementById('image-error').style.display = 'block';
      e.target.value = '';
    } else {
      document.getElementById('image-error').style.display = 'none';
    }
  });
</script>
@endpush