<div class="banner-carousel banner-carousel-1 mb-0">
    <div class="banner-carousel-item" style="background-image:url({{ asset('front-end/images/4M4A0611.jpg'), env('REDIRECT_HTTPS')) }}">
        <div class="slider-content">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-12 text-center">
                        <h2 class="slide-title-box" data-animation-in="slideInLeft" style="background-color: #03224c;">
                            SERVICES DE CARTOGRAPHIE PAR DRONE HAUT DE GAMME</h2>
                        <h3 class="slide-sub-title" data-animation-in="slideInRight">Bienvenue sur Congo Drone Service
                            (CDS).</h3>
                        {{-- <p data-animation-in="slideInLeft" data-duration-in="1.2">
                            <a href="services.html" class="slider btn btn-primary"
                                style="background-color: #03224c;">Voir Plus</a>
                            <a href="contact.html" class="slider btn btn-primary border"
                                style="background-color: #03224c;">Contacter Maintenant</a>
                        </p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-carousel-item" style="background-image:url({{ asset('front-end/images/4M4A0679.jpg', env('REDIRECT_HTTPS'))) }}">
        <div class="slider-content text-left">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-12">
                        <h2 class="slide-title-box" data-animation-in="slideInDown" style="background-color: #03224c;">
                            CARTOGRAPHIE DE HAUTE PRÉCISION</h2>
                        <h3 class="slide-sub-title" data-animation-in="fadeIn">Nos équipements sont capables de fournir
                            une
                            précision centimétrique.</h3>
                        <p class="slider-description lead" data-animation-in="slideInLeft">Nous utilisons la technologie
                            RTK
                            pour synchroniser nos drones afin de fournir des plans très précis. La précision varie de 3
                            à 5 cm en photogrammétrie et entre 1,5 et 2,5 pour le LiDAR.</p>
                        <p data-animation-in="slideInRight">
                            <a href="{{ url('/service') }}" class="slider btn btn-primary border"
                                style="background-color: #03224c;">Voir plus</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-carousel-item" style="background-image:url({{ asset('front-end/images/4M4A0616.jpg', env('REDIRECT_HTTPS'))) }}">
        <div class="slider-content text-right">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-12">
                        <h2 class="slide-title-box" data-animation-in="slideInDown" style="background-color: #03224c;">
                            SERVICES DRONE LIDAR</h2>
                        <h3 class="slide-sub-title" data-animation-in="fadeIn">Oubliez toutes les contraintes de la
                            cartographie drone traditionnelle.</h3>
                        <p class="slider-description lead" data-animation-in="slideInRight">La cartographie LiDAR permet
                            de percer la végétation et offre un haut niveau de précision : jusqu'à 5 couches de
                            feuillage et 1 cm de précision avec le capteur LiDAR que nous utilisons.</p>
                        <div data-animation-in="slideInLeft">
                            <a href="{{ url('/service') }}" class="slider btn btn-primary" aria-label="contact-with-us"
                                style="background-color: #03224c;">Voir plus</a>
                            {{-- <a href="about.html" class="slider btn btn-primary border" aria-label="learn-more-about-us"
                                style="background-color: #03224c;">Learn more</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="call-to-action-box no-padding">
    <div class="container">
        <div class="action-style-box" style="background-color: #03224c;">
            <div class="row align-items-center">
                <div class="col-md-8 text-center text-md-left" style="background-color: #03224c;">
                    <div class="call-to-action-text">
                        <h3 class="action-title">Nous comprenons vos besoins dans la Cartographie.</h3>
                    </div>
                </div><!-- Col end -->
                <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                    <div class="call-to-action-btn">
                        <a class="btn btn-dark" href="{{ url('/contact') }}">Contactez-nous</a>
                    </div>
                </div><!-- col end -->
            </div><!-- row end -->
        </div><!-- Action style box -->
    </div><!-- Container end -->
</section><!-- Action end -->
