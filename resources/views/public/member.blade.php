@extends('_template.master-public-news')

@section('page_title', 'Member')

@section('title', 'Member')

@section('content')
    <!-- post wraper start-->
    <section class="block-wrapper mt-3 mb-3">
        <div class="container">
           
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
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
                                        <a href="{{ route('member') }}">Member TKSCI</a>
                                    </li>
                                </ol>
                                <div class="clearfix entry-cat-header text-center">
                                    <h2 class="ts-title">Daftar Member TKSCI Jogmatis</h2>
                                </div>
                           </div>
                        </div>
                    </div>
                    <div class="post-list">
                         <!-- row start-->
                         @if ($list)
                            @foreach ($list as $l)
                            <div class="card mt-3">
                                <div class="p-4 card-body">
                                    <div class="align-items-center row">
                                        <div class="col-auto">
                                            <div class="candidate-list-images">
                                                <a href="#"><img src="{{ $l->avatar ?? 'https://bootdey.com/img/Content/avatar/avatar1.png' }}" alt="" class="avatar-md img-thumbnail rounded-circle" /></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="candidate-list-content mt-3 mt-lg-0">
                                                <h5 class="fs-19 mb-1 d-flex align-items-center">
                                                    <a class="primary-link mr-2" href="#">{{ $l->nama }}</a>{!! $l->status_label_html !!}
                                                </h5>
                                                <p class="text-muted mb-0">{{ $l->id_lokal }}</p>
                                                <ul class="list-inline mb-0 text-muted">
                                                    <li class="list-inline-item"><i class="mdi mdi-map-marker"></i>KODE REG: {{ $l->kode_reg ?? '-' }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <p class="text-muted mb-0">Kendaraan</p>
                                            @if ($l->kendaraan_jenis == '' && $l->kendaraan_warna == '' && $l->kendaraan_tahun == '')
                                                <p class="text-muted mb-0">-</p>
                                            @else
                                                <div class="mt-2 mt-lg-0 d-flex flex-wrap align-items-start gap-1">
                                                    <span class="badge bg-soft-secondary fs-14 mt-1 mr-1">{{ $l->kendaraan_jenis }}</span><span class="badge bg-soft-secondary fs-14 mt-1 mr-1">{{ $l->kendaraan_warna }}</span><span class="badge bg-soft-secondary fs-14 mt-1">{{ $l->kendaraan_tahun }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                        
                        <!-- row end-->
                        <div class="ts-pagination text-center mt-15 md-mb-30">
                            {{ $list->onEachSide(1)->links('vendor.pagination.default') }}
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    @include('_template.master-sidebar')
                </div>
            </div>
            <!-- row end-->
        </div>
        <!-- container end-->
    </section>
    <!-- post wraper end-->

@endsection

@push('styles')
    <style>
        .avatar-md {
            height: 5rem;
            width: 5rem;
        }
        .fs-19 {
            font-size: 19px;
        }
        .fs-19 span {
            font-size: 12px;
        }
        .primary-link {
            color: #314047;
            -webkit-transition: all .5s ease;
            transition: all .5s ease;
        }
        .fs-14 {
            font-size: 14px;
        }
        .bg-soft-secondary {
            background-color: rgba(116,120,141,.15)!important;
            color: #74788d!important;
        }
    </style>
@endpush