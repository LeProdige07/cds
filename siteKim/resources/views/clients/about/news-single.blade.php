@extends('client-layouts.client')

@section('title')
Nouvelles | {{ $singleNews->nouvelle_titre }}
@endsection
@section('content')
    @include('includes.client-header')

    @include('includes.banners.banner-single-new')

    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 mb-6 mb-lg-0">

                    <div class="post-content post-single">
                        <div class="post-media post-image">
                            <img loading="lazy" style="height : 500px; width : 600px"
                                src="{{asset("storage/nouvelle_images/".$singleNews->nouvelle_image)}}" class="img-fluid"
                                alt="post-image">
                        </div>

                        <div class="post-body">
                            <div class="entry-header">
                                <div class="post-meta">
                                    <span class="post-author">
                                        <i class="far fa-user"></i> Admin
                                    </span>
                                    <span class="post-cat">
                                        <i class="far fa-folder-open"></i>
                                    </span>
                                    <span class="post-meta-date"><i class="far fa-calendar"></i>
                                        {{ $singleNews->created_at }}
                                    </span>
                                </div>
                                <h2 class="entry-title">
                                    {{ $singleNews->nouvelle_titre }}
                                </h2>
                            </div>
                            <div class="entry-content">
                                <p>{{ $singleNews->sujet }}</p>
                                    <p>{{ $singleNews->nouvelle_contenu }}</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="sidebar sidebar-right">
                        @include('includes.recent-post')

                        <div class="widget widget-tags">
                            @include('includes.tags')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('includes.client-footer')
@endsection
