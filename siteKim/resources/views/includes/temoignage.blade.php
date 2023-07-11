<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="column-title">Témoignages</h3>

                <div id="testimonial-slide" class="testimonial-slide">
                    @foreach ($listeTemoin as $item)
                        <div class="item">
                            <div class="quote-item">
                                <span class="quote-text">
                                    {{ $item->temoin_contenu }}
                                </span>

                                <div class="quote-item-footer">
                                    <img loading="lazy" class="testimonial-thumb"
                                        src="storage/temoin_images/{{ $item->temoin_image }}" alt="testimonial">
                                    <div class="quote-item-info">
                                        <h3 class="quote-author">{{ $item->temoin_name }} </h3>
                                        <span class="quote-subtext">Propos recueilli le {{ $item->created_at }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-6 mt-5 mt-lg-0">

                <h3 class="column-title">Nos Clients Satisfaits</h3>

                <div class="row all-clients">
                    @foreach ($client as $item)
                        <div class="col-sm-4 col-6">
                            <figure class="clients-logo">
                                <a href="#!"><img loading="lazy" class="img-fluid"
                                        src="{{ asset("storage/clientsatisfait_images/$item->logo_client ", env('REDIRECT_HTTPS')) }}"
                                        alt="clients-logo" /></a>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
