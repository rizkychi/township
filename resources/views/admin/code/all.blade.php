@extends('_template.master-admin')

@section('page_title', 'Code')

@section('title', 'Code')

@section('content')
<!-- Table -->
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header">
        <div class="row">
          <div class="col-8">
            <h3 class="mb-0">Code List</h3>
            <p class="text-sm mb-0">
              List for all code that can be used to get item in Township.
            </p>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a href="#!" class="btn btn-sm btn-primary">
              <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
            </a>
          </div>
        </div>
      </div>
      <div class="table-responsive py-4">
        <table class="table table-flush dtx">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Image</th>
              <th>Code Name</th>
              <th>Alias</th>
              <th>Value</th>
              <th>Status</th>
              <th>Type</th>
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
      ajax: "{{ route('code.json') }}",
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
          name: 'image'
        },
        {
          data: 'codename',
          name: 'codename'
        },
        {
          data: 'alias',
          name: 'alias'
        },
        {
          data: 'value',
          name: 'value'
        },
        {
          data: 'work',
          name: 'work'
        },
        {
          data: 'type',
          name: 'type'
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