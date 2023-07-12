@extends('client-layouts.client')

@section('title')
A propos de nous
@endsection
@section('content')
    @include('includes.client-header')

    @include('includes.banners.banner-about')

   @include('includes.about')

   <section id="main-container" class="main-container">
    <div class="container">
      <div class="row">
          <div class="col-lg-6">
            <h3 class="column-title">Qui sommes-nous ?</h3>
            <p>CDS est une entreprise qui fournit des solutions UAV pour l'industrie et la cartographie en République Démocratique du Congo. Nos services sont les suivants : Cartographie par drone, Technologie LiDAR haut de gamme et haute précision pour des projets immobiliers ou de génie civil, Exploitation minière, Modèle 3D, Inspections d'actifs.</p>
            <blockquote><p>Nous vous assurons des services de haute qualité et répondons présent à toutes vos attentes relatives à tous nos services.</p></blockquote>
            <p>Nous sommes ouverts 7 / 7 jours, chaque jour excepté les jours feriés. Contactez-nous en cas d'urgence, avec notre numéro ou par le formulaire de contact.</p>
          </div><!-- Col end -->

          <div class="col-lg-6 mt-5 mt-lg-0">

            <div id="page-slider" class="page-slider small-bg">

                <div class="item" style="background-image:url({{ asset('front-end/images/slider-pages/slide-page1.jpg') }}, env('REDIRECT_HTTPS'))">
                  <div class="container">
                      <div class="box-slider-content">
                        <div class="box-slider-text">
                            <h2 class="box-slide-title">Leadership</h2>
                        </div>
                      </div>
                  </div>
                </div><!-- Item 1 end -->

                <div class="item" style="background-image:url({{ asset('front-end/images/slider-pages/slide-page2.jpg', env('REDIRECT_HTTPS')) }})">
                  <div class="container">
                      <div class="box-slider-content">
                        <div class="box-slider-text">
                            <h2 class="box-slide-title">Relationships</h2>
                        </div>
                      </div>
                  </div>
                </div><!-- Item 1 end -->

                <div class="item" style="background-image:url({{ asset('front-end/images/slider-pages/slide-page3.jpg', env('REDIRECT_HTTPS')) }})">
                  <div class="container">
                      <div class="box-slider-content">
                        <div class="box-slider-text">
                            <h2 class="box-slide-title">Performance</h2>
                        </div>
                      </div>
                  </div>
                </div><!-- Item 1 end -->
            </div><!-- Page slider end-->


          </div><!-- Col end -->
      </div><!-- Content row end -->

    </div><!-- Container end -->
  </section>

  @include('includes.statistique')

  @include('includes.team')

    @include('includes.client-footer')
@endsection
