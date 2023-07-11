@extends('admin_layout.admin')
@section('title')
Tableau de bord
@endsection

@section('content')
    {{-- Start content --}}
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->

                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $nbr_user_online }}</h3>

                                <p>Visiteurs en ligne</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $nbr_services }}</h3>

                                <p>Les services de CDS</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            @permission('Service', 'read')
                                <a href="{{ route('services.index') }}" class="small-box-footer">Plus d'info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            @endpermission
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $nbr_projects }}</h3>

                                <p>Les projets de CDS</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            @permission('Project', 'read')
                                <a href="{{ route('projects.index') }}" class="small-box-footer">Plus d'info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            @endpermission
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $nbr_users }}</h3>

                                <p>Les utilisateurs</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            @permission('User', 'read')
                                <a href="{{ route('users.index') }}" class="small-box-footer">Plus d'info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            @endpermission
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- ./Row -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $nbr_partenaires }}</h3>

                                <p>Les Partenaires</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            @permission('Clientsatisfait', 'read')
                                <a href="{{ route('clientsatisfaits.index') }}" class="small-box-footer">Plus d'info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            @endpermission
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $nbr_faqs }}</h3>

                                <p>FAQ</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            @permission('Faq', 'read')
                                <a href="{{ route('faqs.index') }}" class="small-box-footer">Plus d'info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            @endpermission
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $nbr_news }}</h3>

                                <p>News</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            @permission('Nouvelle', 'read')
                                <a href="{{ route('nouvelles.index') }}" class="small-box-footer">Plus d'info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            @endpermission
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $nbr_temoignages }}</h3>

                                <p>Les témoignages</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            @permission('Temoignage', 'read')
                                <a href="{{ route('temoignages.index') }}" class="small-box-footer">Plus d'info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            @endpermission
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- ./Row -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $nbr_personnel }}</h3>

                                <p>L'équipe</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            @permission('Personnel', 'read')
                                <a href="{{ route('personnels.index') }}" class="small-box-footer">Plus d'info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            @endpermission
                        </div>
                    </div>
                </div>
                <!-- ./Row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    {{-- end content --}}
@endsection
