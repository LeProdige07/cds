<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">

            <div class="col-xl-3 col-lg-4">
                <div class="sidebar sidebar-left">
                    <div class="widget">
                        <h3 class="widget-title">Services</h3>
                        <ul class="nav service-menu">
                            @foreach ($services as $item)
                                <li><a href="{{ url('/detail_service', ['id' => $item->id]) }}">{{ $item->service_name }}
                                    </a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                        <div class="quote-item quote-border">
                            <div class="quote-text-border">
                                Nous vous assurons des services de haute qualité et répondons présent à toutes vos attentes 
                                relatives à tous nos services.
                            </div>

                            <div class="quote-item-footer">
                                <img loading="lazy" class="testimonial-thumb"
                                    src="{{ asset('front-end/images/4M4A0669.jpg') }}" alt="testimonial">
                                <div class="quote-item-info">
                                    <h3 class="quote-author">Cyrielle Ntumba</h3>
                                    <span class="quote-subtext">CEO, Congodrone Service</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">
                <div class="content-inner-page">

                    <h2 class="column-title mrt-0">{{ $servicesName->service_name }}</h2>

                    <div class="row">
                        @foreach ($detail as $item)
                            <div class="col-md-12">
                                <h3 class="column-title-small">{{ $item->detail_titre }}</h3>
                                <p>{{ $item->detail_description }}</p>

                            </div>
                        @endforeach
                    </div>

                    <div class="gap-40"></div>

                    <div id="page-slider" class="page-slider">
                        @foreach ($detail as $item)
                            <div class="item">
                                <img loading="lazy" class="img-fluid"
                                    src="{{ asset("storage/detail_images/$item->detail_image ") }}"
                                    alt="project-slider-image" />
                            </div>
                        @endforeach
                    </div>
                    <div class="gap-40"></div>
                </div>
            </div>
        </div>
    </div>
</section>
