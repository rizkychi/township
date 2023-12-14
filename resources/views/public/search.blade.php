@extends('_template.master-public-news')

@section('page_title', 'Pencarian')

@section('title', 'Pencarian')

@section('content')
    <!-- post wraper start-->
    <section class="block-wrapper mt-3 mb-3">
        <div class="container">
           
            <div class="row">
                <div class="col-lg-9">
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
                                        <a href="{{ route('search') }}">{{ $query }}</a>
                                    </li>
                                </ol>
                                <div class="clearfix entry-cat-header text-center">
                                    <h2 class="ts-title">Cari: {{ $query }}</h2>
                                </div>
                           </div>
                        </div>
                    </div>
                    <div class="post-list">
                        <!-- row start-->
                        @if ($list)
                            @foreach ($list as $l)
                                <div class="row mb-20">
                                    <div class="col-md-4 pr-0" style="min-height: 180px;">
                                        <div class="ts-post-thumb mb-0" style="background-image: url({{ getImage($l->desc) }})">
                                            <a href="{{ route('topic', ['topic' => $l->topic]) }}" class="post-cat ts-{{ $colors[$l->topic] }}-bg">{{ $l->topic }}</a>
                                            <a href="{{ route('post', ['id' => $l->id]) }}" class="d-inline-block h-100 w-100">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 pl-0" style="min-height: 180px;">
                                        <div class="d-flex flex-column post-content ts-white-bg py-3 px-4 h-100">
                                            <h3 class="post-title md">
                                                <a href="{{ route('post', ['id' => $l->id]) }}">{{ $l->title }}</a>
                                            </h3>
                                            <ul class="post-meta-info mb-2">
                                                <li>
                                                    Admin
                                                </li>
                                                <li>
                                                    <i class="fa fa-clock-o"></i>
                                                    {{ Carbon\Carbon::parse($l->created_at)->isoFormat('D MMMM Y'); }}
                                                </li>
                                            </ul>
                                            <p>
                                                {{ Str::limit(strip_tags(str_replace('&nbsp;', ' ', $l->desc)), 180, '...') }}
                                            </p>
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