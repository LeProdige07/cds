    <div class="sidebar sidebar-right">
        <div class="widget recent-posts">
            <h3 class="widget-title">Les projets récents</h3>
            <ul class="list-unstyled">
                @foreach ($recentProject as $item)
                <li class="d-flex align-items-center">
                    <div class="posts-thumb">
                        <a href="#"><img loading="lazy" alt="news-image"
                                src="{{ asset('storage/project_images/'.$item->project_image1, env('REDIRECT_HTTPS')) }}"></a>
                    </div>
                    <div class="post-info">
                        <h4 class="entry-title">
                            <a href="{{ url('/detail_project', ['id' => $item->id]) }}">{{ $item->project_name }}</a>
                        </h4>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
