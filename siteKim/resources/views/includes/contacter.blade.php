<section id="main-container" class="main-container">
    <div class="container">

        <div class="row text-center">
            <div class="col-12">
                <h2 class="section-title">Contactez-nous pour bénéficier nos services</h2>
                <h3 class="section-sub-title">Travaillez avec nous comme partenaire</h3>
            </div>
        </div>
        <!--/ Title row end -->

        <div class="row">
            <div class="col-md-4">
                <div class="ts-service-box-bg text-center h-100">
                    <span class="ts-service-icon icon-round">
                        <i class="fas fa-map-marker-alt mr-0"></i>
                    </span>
                    <div class="ts-service-box-content">
                        <h4>Visiter Nos Bureaux</h4>
                        <p>Kinshasa/Gombe, Av Mwenwditu N°6, RDC</p>
                    </div>
                </div>
            </div><!-- Col 1 end -->

            <div class="col-md-4">
                <div class="ts-service-box-bg text-center h-100">
                    <span class="ts-service-icon icon-round">
                        <i class="fa fa-envelope mr-0"></i>
                    </span>
                    <div class="ts-service-box-content">
                        <h4>Nous envoyer un mail</h4>
                        <p>cyriellenyamabo05@gmail.com</p>
                    </div>
                </div>
            </div><!-- Col 2 end -->

            <div class="col-md-4">
                <div class="ts-service-box-bg text-center h-100">
                    <span class="ts-service-icon icon-round">
                        <i class="fa fa-phone-square mr-0"></i>
                    </span>
                    <div class="ts-service-box-content">
                        <h4>Appelez-nous</h4>
                        <p>(+243) 827868560</p>
                    </div>
                </div>
            </div><!-- Col 3 end -->

        </div><!-- 1st row end -->

        <div class="gap-60"></div>

        <div class="google-map">
            {{-- <div id="map" class="map" data-latitude="-4.322447" data-longitude="15.307045" --}}
            {{-- data-marker="images/marker.png" data-marker-name="Constra"></div> --}}
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.530466313132!2d15.28418076585197!3d-4.310912486077977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a6a33652a0f99ab%3A0xf6187f06dca81856!2sArr%C3%AAt%2024%20NOVEMBRE!5e0!3m2!1sen!2scd!4v1682525794550!5m2!1sen!2scd"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="gap-40"></div>

        <div class="row bg-light">
            <div class="col-md-12">
                <h3 class="column-title">Nous Ecrire Via Le Formulaire</h3>
                @if (Session::has('status'))
                    <div class="alert alert-success">
                        {{ Session::get('status') }}
                    </div>
                @endif
                <form id="contactUSForm" action="{{ route('contact.us.store') }}" method="post" role="form">
                    {{ csrf_field() }}
                    <div class="error-container"></div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Votre nom</label>
                                <input class="form-control form-control-name" name="name" id="name"
                                    placeholder="Votre nom" type="text" required>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control form-control-email" name="email" id="email"
                                    placeholder="Adresse Email" type="email" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Téléphone"
                                    value="{{ old('phone') }}" required>
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Subject</label>
                                <input class="form-control form-control-subject" name="subject" id="subject"
                                    placeholder="Sujet" value="{{ old('subject') }}" required>
                                @if ($errors->has('subject'))
                                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control form-control-message" name="message" id="message" placeholder="Votre message"
                            rows="10" required>{{ old('message') }}</textarea>
                        @if ($errors->has('message'))
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                        @endif
                    </div>
                    <div class="text-center"><br>
                        <button class="btn btn-primary solid blank" type="submit">Envoyer</button>
                    </div>
                </form>
            </div>

        </div><!-- Content row -->
    </div><!-- Conatiner end -->
</section>
