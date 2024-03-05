@extends('_template.master-admin')

@section('page_title', 'Konten')

@section('title', 'Konten')

@section('content')
<!-- Table -->
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header">
        <div class="row">
          <div class="col-8">
            <h3 class="mb-0">Konten</h3>
            <p class="text-sm mb-0">
              Manajemen konten website Jogmatis.
            </p>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a href="{{ route('admin.content.create') }}" class="btn btn-sm btn-primary">
              <span class="btn-inner--icon"><i class="fas fa-plus"></i> Tambah Konten</span>
            </a>
          </div>
        </div>
      </div>
      <div class="table-responsive py-4">
        <table class="table table-flush w-100 dtx">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th style="min-width: 250px">Judul</th>
              <th>Topik</th>
              <th>Jumlah Tayangan</th>
              <th>Tanggal</th>
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
      ajax: "{{ route('admin.content.json') }}",
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
          data: 'title',
          name: 'title'
        },
        {
          data: 'topic',
          name: 'topic'
        },
        {
          data: 'views',
          name: 'views'
        },
        {
          data: 'tanggal',
          name: 'tanggal'
        },
        {
          data: 'published',
          name: 'published',
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