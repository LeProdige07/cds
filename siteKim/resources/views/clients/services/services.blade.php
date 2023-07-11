@extends('client-layouts.client')

@section('title')
Nos services
@endsection
@section('content')
    @include('includes.client-header')

    @include('includes.banners.banner-service')

    <section id="main-container" class="main-container pb-2">
        <div class="container">
            <div class="row">
                @foreach ($servicesName as $item)
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="ts-service-box">
                            <div class="ts-service-image-wrapper">
                                <img loading="lazy" class="w-100" src="storage/service_images/{{ $item->service_image }}"
                                    alt="service-image">
                            </div>
                            <div class="d-flex">
                                <div class="ts-service-box-img">
                                    <img loading="lazy" src="{{ asset('front-end/images/icon-image/fact2.png') }}"
                                        alt="service-icon">
                                </div>
                                <div class="ts-service-info">
                                    <h3 class="service-box-title"><a
                                            href="{{ url('/detail_service',['id' => $item->id]) }}">{{ $item->service_name }}</a></h3>
                                    <p>{{ $item->service_description }}</p>
                                    <a class="learn-more d-inline-block" href="{{ url('/detail_service', ['id' => $item->id]) }}"
                                        aria-label="service-details"><i class="fa fa-caret-right"></i> Lire Plus</a>
                                </div>
                            </div>
                        </div>
                        <!-- Service1 end -->
                    </div><!-- Col 1 end -->
                @endforeach
            </div>
        </div>
    </section>
    @include('includes.client-footer')
@endsection
