<div class="widget">
    <h3 class="widget-title">Nos services</h3>
    <ul class="arrow nav nav-tabs">
        @foreach ($servicesName as $item)
            <li><a href="{{ url('/detail_service', ['id' => $item->id]) }}">{{ $item->service_name }} </a></li>
        @endforeach
    </ul>
</div>
