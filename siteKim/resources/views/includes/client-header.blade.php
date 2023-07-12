<div id="top-bar" class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <ul class="top-info text-center text-md-left">
                    <li><i class="fas fa-map-marker-alt"></i>
                        <p class="info-text">Kinshasa/Gombe, Av Mwenwditu N°6, RDC</p>
                    </li>
                </ul>
            </div>
            <!--/ Top info end -->

            <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                <ul class="list-unstyled">
                    <li>
                        <a title="Facebook" href="#">
                            <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                        </a>
                        <a title="Twitter" href="#">
                            <span class="social-icon"><i class="fab fa-twitter"></i></span>
                        </a>
                        <a title="Instagram" href="#">
                            <span class="social-icon"><i class="fab fa-instagram"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
            <!--/ Top social end -->
        </div>
        <!--/ Content row end -->
    </div>
    <!--/ Container end -->
</div>
<header id="header" class="header-two">
    <div class="site-navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">

                        <div class="logo">
                            <a class="d-block" href="{{ url('/') }}">
                                <img loading="lazy" src="{{ asset('front-end/images/logoValid4.jpeg', env('REDIRECT_HTTPS')) }}"
                                    alt="Congo Drone Service">
                            </a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div id="navbar-collapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav ml-auto align-items-center">
                                <li><a href="{{ url('/') }}">Home </a></li>
                                <li class="nav-item dropdown">
                                    <a href="{{ url('/serviceLink') }}" class="nav-link dropdown-toggle"
                                        data-toggle="dropdown">Services
                                        <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">

                                        <li><a href="{{ url('/service') }}">Nos services</a></li>

                                        @foreach ($servicesName as $item)
                                            <li><a href="{{ url('/detail_service', ['id' => $item->id]) }}">{{ $item->service_name }}
                                                </a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle"
                                        data-toggle="dropdown">L'Entreprise <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/about') }}">A propos de nous</a></li>
                                        <li><a href="{{ url('/team') }}">Notre équipe</a></li>
                                        <li><a href="{{ url('/temoignage') }}">Témoignages</a></li>
                                        <li><a href="{{ url('/faq') }}">FAQ</a></li>
                                        <li><a href="{{ url('/project') }}">Nos projets</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">News <i
                                            class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/news') }}">News </a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
