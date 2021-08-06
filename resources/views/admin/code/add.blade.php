@extends('_template.master-admin')

@section('page_title', 'Insert Code')

@section('title', 'Insert Code')

@section('content')
<!-- Table -->
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header">
        <div class="row">
          <div class="col-8">
            <h3 class="mb-0">Insert Code</h3>
          </div>
        </div>
      </div>

      <div class="card-body">
        <!-- Form groups used in grid -->
        <form action="{{ route('code.show.store') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="codename">Code Name</label>
                <input type="text" name="codename" class="form-control" id="codename" placeholder="example: Skin_Disco_SP8">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="alias">Alias</label>
                <input type="text" name="alias" class="form-control" id="alias" placeholder="example: Train Disco">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label" for="val">Value</label>
                <input type="text" name="val" class="form-control" id="val" placeholder="value">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <p class="form-control-label mb-2">Image</p>
              <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="imgPreview" accept="image">
                <label class="custom-file-label" for="imgPreview">Select image</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="typeCode">Type</label>
                <select class="form-control" name="type" id="typeCode">
                  @foreach ($data['type'] as $t)
                  <option value="{{ $t->id }}">{{ $t->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="statusCode">Status</label>
                <select class="form-control" name="status" id="statusCode">
                  @foreach ($data['status'] as $s)
                  <option value="{{ $s }}">{{ ucfirst($s) }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="credits">Credits</label>
                <input type="text" name="credits" class="form-control" id="credits" placeholder="example: Township Code">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="creditsUrl">Link</label>
                <input type="url" name="credits_url" class="form-control" id="creditsUrl" placeholder="example: Township.masrizky.com">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <p class="form-control-label mb-2">Worked?</p>
              <label class="custom-toggle mb-3">
                <input type="checkbox" name="worked" checked>
                <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
              </label>
            </div>
          </div>

          <div class="row">
            <div class="col-12 text-right">
              <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
              <a href="{{ route('code.show.index') }}" class="btn btn-danger"> <i class="fas fa-times"></i> Cancel</a>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection