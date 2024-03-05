@extends('_template.master-admin')

@section('page_title', 'Banner')

@section('title', 'Banner')

@section('content')
<!-- Table -->
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header">
        <div class="row">
          <div class="col-8">
            <h3 class="mb-0">Banner</h3>
            <p class="text-sm mb-0">
              Manajemen banner website Jogmatis.
            </p>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a href="{{ route('admin.banner.create') }}" class="btn btn-sm btn-primary">
              <span class="btn-inner--icon"><i class="fas fa-plus"></i> Tambah Banner</span>
            </a>
          </div>
        </div>
      </div>
      <div class="table-responsive py-4">
        <table class="table table-flush w-100 dtx">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Gambar</th>
              <th>Published</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
  $(function() {
    var table = $('.dtx').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('admin.banner.json') }}",
      language: {
        paginate: {
          previous: "<i class='fas fa-angle-left'>",
          next: "<i class='fas fa-angle-right'>"
        }
      },
      columns: [{
          data: 'DT_RowIndex',
          name: 'DT_RowIndex'
        },
        {
          data: 'image',
          name: 'image',
          render: function (data, type, row, meta) {
            return img = '<img style="width:120px" src="' + data + '" />';;
          }
        },
        {
          data: 'active',
          name: 'active',
          render: function (data, type, row, meta) {
            if (data == true) {
              button = '<span class="badge badge-success">Yes</span>';
            } else {
              button = '<span class="badge badge-warning">No</span>';
            }
            return button;
          }
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },
      ],
    });
  });
</script>
@endpush