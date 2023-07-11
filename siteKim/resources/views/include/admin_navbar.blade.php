<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('/')}}" class="nav-link">Accueil</a>
        </li>
        @permission('Service', 'read')
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('services.index')}}" class="nav-link">Services</a>
        </li>
        @endpermission
        @permission('Project', 'read')
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('projects.index')}}" class="nav-link">Projets</a>
        </li>
        @endpermission
        @permission('Personnel', 'read')
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('personnels.index')}}" class="nav-link">Personnel</a>
        </li>
        @endpermission
        @permission('Nouvelle', 'read')
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('nouvelles.index')}}" class="nav-link">News</a>
        </li>
        @endpermission
        @permission('Contact', 'read')
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('contacts.index')}}" class="nav-link">Contacts</a>
        </li>
        @endpermission
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <!-- Message Start -->
                    Logout
                    <!-- Message End -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
                <div class="dropdown-divider"></div>
        </li>

        <!-- Messages Dropdown Menu -->
        @permission('Contact', 'read')
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">{{count(Auth::user()->recent_contacts())}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                @foreach (Auth::user()->recent_contacts() as $item)
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                {{$item->name}}
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">{{$item->subject}}</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{$item->created_at}}</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                @endforeach
                @if (count(Auth::user()->recent_contacts()) != 0)
                <div class="dropdown-divider"></div>
                <a href="{{route('contacts.index')}}" class="dropdown-item dropdown-footer">Voir tous les messages</a>
                @else
                <a href="#" class="dropdown-item">Vous n'avez aucun nouveau message !</a>
                <div class="dropdown-divider"></div>
                <a href="{{route('contacts.index')}}" class="dropdown-item dropdown-footer">Voir tous les messages</a>
                @endif
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">{{count(Auth::user()->recent_contacts())}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">{{count(Auth::user()->recent_contacts()) + count(Auth::user()->users_inscrits())}} Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="{{route('contacts.index')}}" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> {{count(Auth::user()->recent_contacts())}} nouveaux messages
                </a>
                <div class="dropdown-divider"></div>
                {{-- <a href="{{route('users.index')}}" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> {{count(Auth::user()->users_inscrits())}} utilisateurs inscrits
                </a> --}}
            </div>
        </li>
        @endpermission
    </ul>
</nav>
