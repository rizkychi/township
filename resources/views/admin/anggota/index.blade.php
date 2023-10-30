@extends('_template.master-admin')

@section('page_title', 'Anggota')

@section('title', 'Anggota')

@section('content')
<!-- Table -->
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header">
        <div class="row">
          <div class="col-8">
            <h3 class="mb-0">Anggota</h3>
            <p class="text-sm mb-0">
              List yang menjadi anggota Jogmatis.
            </p>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a href="{{ route('admin.anggota.create') }}" class="btn btn-sm btn-primary">
              <span class="btn-inner--icon"><i class="fas fa-plus"></i> Tambah Anggota</span>
            </a>
          </div>
        </div>
      </div>
      <div class="table-responsive py-4">
        <table class="table table-flush dtx">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>ID Lokal</th>
              <th>ID NAS KODE REG</th>
              <th>Nama</th>
              <th>No. HP</th>
              <th>Tempat Lahir</th>
              <th>Tanggal Lahir</th>
              <th>Alamat</th>
              <th>Tanggal Register TKSCI</th>
              <th>Jenis Kendaraan</th>
              <th>Warna Kendaraan</th>
              <th>Tahun Kendaraan</th>
              <th>Nopol Kendaraan</th>
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
      dom: 'Bfrtip',
      buttons: [
          {
              extend: 'excel',
              text: '<span class="text-success"><i class="fa fa-file-excel"></i>  Excel</span>',
              titleAttr: 'Excel',
              action: newexportaction,
              exportOptions: {
                  columns: ':not(:last-child)',
              }
          }
      ],
      processing: true,
      serverSide: true,
      ajax: "{{ route('admin.anggota.json') }}",
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
          data: 'id_lokal',
          name: 'id_lokal'
        },
        {
          data: 'kode_reg',
          name: 'kode_reg'
        },
        {
          data: 'nama',
          name: 'nama'
        },
        {
          data: 'no_hp',
          name: 'no_hp'
        },
        {
          data: 'tempat_lahir',
          name: 'tempat_lahir',
          visible: false
        },
        {
          data: 'tgl_lahir',
          name: 'tgl_lahir',
          visible: false
        },
        {
          data: 'alamat',
          name: 'alamat',
          visible: false
        },
        {
          data: 'tgl_reg_tksci',
          name: 'tgl_reg_tksci',
          visible: false
        },
        {
          data: 'kendaraan_jenis',
          name: 'kendaraan_jenis',
          visible: false
        },
        {
          data: 'kendaraan_warna',
          name: 'kendaraan_warna',
          visible: false
        },
        {
          data: 'kendaraan_tahun',
          name: 'kendaraan_tahun',
          visible: false
        },
        {
          data: 'kendaraan_nopol',
          name: 'kendaraan_nopol',
          visible: false
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