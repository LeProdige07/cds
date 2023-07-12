<section id="news" class="news">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h3 class="section-sub-title">LES PROJETS RECENTS</h3>
            </div>
        </div>
        <div class="row">
            @foreach ($recentProject as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="latest-post">
                        <div class="latest-post-media">
                            <a href="{{ url('/detail_project', ['id' => $item->id]) }}" class="latest-post-img">
                                <img loading="lazy" class="img-fluid"
                                    src="storage/project_images/{{ $item->project_image1 }}" alt="img">
                            </a>
                        </div>
                        <div class="post-body">
                            <h4 class="post-title">
                                <a href="{{ url('/detail_project', ['id' => $item->id]) }}"
                                    class="d-inline-block">{{ $item->project_name }}</a>
                            </h4>
                            <div class="latest-post-meta">
                                <span class="post-item-date">
                                    <i class="fa fa-clock-o"></i> {{ $item->created_at }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</section>
