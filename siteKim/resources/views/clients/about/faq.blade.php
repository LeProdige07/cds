@extends('client-layouts.client')
@section('title')
Foire aux questions
@endsection
@section('content')
    @include('includes.client-header')

    @include('includes.banners.banner-faq')

    <section id="main-container" class="main-container">
        <div class="container">

            <div class="row">
                <div class="col-lg-8">
                    <h3 class="border-title border-left mar-t0">Les questions les plus posees</h3>

                    <div class="accordion accordion-group accordion-classic" id="construction-accordion">
                        @foreach ($question as $item)
                        <div class="card">
                            <div class="card-header p-0 bg-transparent" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapse{{$item->id}}">
                                        {{$item->question}}
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse{{$item->id}}" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#construction-accordion">
                                <div class="card-body">
                                    {{$item->reponse}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="gap-40"></div>
                </div>

                @include('includes.recent-post')

            </div>

        </div>
    </section>

    @include('includes.client-footer')
@endsection
