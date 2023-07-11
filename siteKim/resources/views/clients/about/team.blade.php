@extends('client-layouts.client')

@section('title')
Notre équipe
@endsection
@section('content')
    @include('includes.client-header')


    @include('includes.banners.banner-team')

    <section id="main-container" class="main-container pb-4">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h3 class="section-sub-title">Notre équipe</h3>
                </div>
            </div>

            <div class="row justify-content-center">
                @foreach ($team as $item)
                    <div class="col-lg-3 col-sm-6 mb-5">
                        <div class="ts-team-wrapper">
                            <div class="team-img-wrapper">
                                <img loading="lazy" src="storage/personnel_images/{{ $item->image }}" class="img-fluid"
                                    alt="team-img">
                            </div>
                            <div class="ts-team-content-classic">
                                <h3 class="ts-name">{{ $item->names }}</h3>
                                <p class="ts-designation">{{ $item->poste }}</p>
                                <p class="ts-description">{{ $item->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    @include('includes.client-footer')
@endsection
