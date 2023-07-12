<section class="ftco-section bg-light mb-4">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Contact</h2>
                <!--Section: Contact v.2-->
                @if (Session::has('status'))
                    <div class="alert alert-success">
                        {{ Session::get('status') }}
                    </div>
                @endif
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-9 mb-md-0 mb-5">
                        <form id="contactUSForm" action="{{ route('contact.us.store') }}" method="post" role="form">
                            {{ csrf_field() }}
                            <!--Grid row-->
                            <div class="row">
                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="text" id="name" name="name" class="form-control">
                                        <label for="name" class="">Votre nom</label>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="text" id="email" name="email" class="form-control">
                                        <label for="email" class="">Votre email</label>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form mb-0">
                                        <input type="text" id="phone" name="phone" class="form-control"
                                            value="{{ old('phone') }}" required>
                                        <label for="subject" class="">Téléphone</label>
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--Grid row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form mb-0">
                                        <input type="text" id="subject" name="subject" class="form-control"
                                            value="{{ old('subject') }}" required>
                                        <label for="subject" class="">Sujet</label>
                                        @if ($errors->has('subject'))
                                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--Grid row-->
                            <!--Grid row-->
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="md-form">
                                        <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea">{{ old('message') }}</textarea>
                                        <label for="message">Votre message</label>
                                        @if ($errors->has('message'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--Grid row-->
                            <div class="text-center text-md-left">
                                <p class="text-center">
                                    <button class="btn btn-primary solid blank" type="submit">Envoyer</button>
                                </p>
                            </div>
                            <div class="status"></div>
                        </form>
                    </div>
                    <div class="col-md-3 text-center">
                        <ul class="list-unstyled mb-0">
                            <li><i class="fas fa-map-marker-alt fa-2x"></i>
                                <p>Kinshasa/Gombe, Av Mwenwditu N°6, RDC</p>
                            </li>

                            <li><i class="fas fa-phone mt-2 fa-2x"></i>
                                <p>(+243) 827868560</p>
                            </li>

                            <li><i class="fas fa-envelope mt-2 fa-2x"></i>
                                <p>cyriellenyamabo05@gmail.com</p>
                            </li>
                            <li>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.530466313132!2d15.28418076585197!3d-4.310912486077977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a6a33652a0f99ab%3A0xf6187f06dca81856!2sArr%C3%AAt%2024%20NOVEMBRE!5e0!3m2!1sen!2scd!4v1682525794550!5m2!1sen!2scd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
