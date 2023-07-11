@extends('client-layouts.client')

@section('title')
Services | {{ $servicesName->service_name }}
@endsection
@section('header')
    <div id="top-bar" class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <ul class="top-info text-center text-md-left">
                        <li><i class="fas fa-map-marker-alt"></i>
                            <p class="info-text">Kinshasa, kin 94126, RDC</p>
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
                            <a title="Linkdin" href="#">
                                <span class="social-icon"><i class="fab fa-github"></i></span>
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
                                        <a href="{{ url('/service') }}" class="nav-link dropdown-toggle"
                                            data-toggle="dropdown">Services
                                            <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu" role="menu">

                                            <li><a href="{{ url('/service') }}">Tous les Services</a></li>

                                            @foreach ($services as $item)
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
                                            <li><a href="{{ url('/team') }}">Notre Equipe</a></li>
                                            <li><a href="{{ url('/temoignage') }}">Temoignage</a></li>
                                            <li><a href="{{ url('/faq') }}">Faq</a></li>
                                            <li><a href="{{ url('/project') }}">Projets</a></li>
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
@endsection

@section('content')
    @include('includes.banners.banner-single-service')

    @include('includes.single-service')
@endsection

@section('footer')
   <footer id="footer" class="footer bg-overlay">
        <div class="footer-main">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-4 col-md-6 footer-widget footer-about">
                        <h3 class="widget-title">A Propos</h3>
                        <img loading="lazy" width="200px" class="footer-logo"
                            src="{{ asset('front-end/images/logoValide2.jpeg', env('REDIRECT_HTTPS')) }}" alt="CDS">
                        <p>Congodrone Service vous offre des services à la hauteur de vos attentes
                            et s'assure de la satisfaction de ses clients.</p>
                        <div class="footer-social">
                            <ul>
                                <li><a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li><a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#" aria-label="Github"><i class="fab fa-github"></i></a></li>
                            </ul>
                        </div><!-- Footer social end -->
                    </div><!-- Col end -->

                    <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
                        <h3 class="widget-title">Notre Horaire</h3>
                        <div class="working-hours">
                            Nous sommes ouverts 7 / 7 jours, chaque jour excepté les jours feriés. Contactez-nous en cas
                            d'urgence, avec notre
                            numéro ou par le formulaire de contact.
                            <br><br> Lundi - Vendredi: <span class="text-right">8:00 - 17:00 </span>
                        </div>
                    </div><!-- Col end -->

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
                        <h3 class="widget-title">Nos Services</h3>
                        <ul class="list-arrow">
                            @foreach ($services as $item)
                                <li><a href="#">{{ $item->service_name }} </a></li>
                            @endforeach
                        </ul>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Footer main end -->

        <div class="copyright" style="background-color: #1c1c1d;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="copyright-info text-white">
                            <span>Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>, Designed &amp; Developed by <a
                                    href="mailto:Kimengineering15@gmail.com">Kim Engineering</a>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="footer-menu text-center text-md-right">
                            <ul class="list-unstyled text-white">
                                <li><a href="{{ url('/about') }}">A propos de nous</a></li>
                                <li><a href="{{ url('/temoignage') }}">Témoignages</a></li>
                                <li><a href="{{ url('/faq') }}">Faq</a></li>
                                <li><a href="{{ url('/project') }}">Nos projets</a></li>
                                <li><a href="{{ url('/service') }}">Nos services</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- Row end -->

                <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
                    <button class="btn btn-primary" title="Back to Top">
                        <i class="fa fa-angle-double-up"></i>
                    </button>
                </div>

            </div><!-- Container end -->
        </div><!-- Copyright end -->
    </footer>
@endsection
