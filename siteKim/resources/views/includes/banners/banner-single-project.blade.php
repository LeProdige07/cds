<div id="banner-area" class="banner-area" style="background-image:url({{ asset('front-end/images/banner/banner.jpg', env('REDIRECT_HTTPS')) }})">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">{{ $projectOne->project_name }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('/project') }}">Nos projets</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $projectOne->project_name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Banner text end -->
</div>
