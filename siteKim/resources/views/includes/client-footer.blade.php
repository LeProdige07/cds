<footer id="footer" class="footer bg-overlay">
    <div class="footer-main">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4 col-md-6 footer-widget footer-about">
                    <h3 class="widget-title">A Propos</h3>
                    <img loading="lazy" width="200px" class="footer-logo" src="{{ asset('front-end/images/logoValide2.jpeg', env('REDIRECT_HTTPS')) }}"
                        alt="Constra">
                    <p>Congodrone Service vous offre des services à la hauteur de vos attentes
                        et s'assure de la satisfaction de ses clients.</p>
                    <div class="footer-social">
                        <ul>
                            <li><a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li><a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a></li>
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
                        @foreach ($servicesName as $item)
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
                                href="https://kimengineering.net/">Kim Engineering</a>
                        </span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="footer-menu text-center text-md-right">
                        <ul class="list-unstyled text-white">
                            <li><a href="{{ url('/about') }}">A propos de nous</a></li>
                            <li><a href="{{url('/temoignage')}}">Témoignages</a></li>
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
