@extends('admin_layout.admin')
@section('title')
    Partenaires
@endsection
@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset("backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css", env('REDIRECT_HTTPS'))}}">
    <link rel="stylesheet" href="{{asset("backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css", env('REDIRECT_HTTPS'))}}">
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active">Partenaires</li>
@endsection
@section('content')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="float-sm-right">
                                            @permission('Clientsatisfait','create')
                                                <a href="#" class="btn btn-success" style="color:white" data-toggle="modal" data-target="#ModalCreate">
                                                    <span style="color:white"></span> {{ __('Ajouter') }}
                                                </a>
                                                @include('admin.clientsatisfait.modal.create')
                                            @endpermission
                                        </div>
                                    </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (Session::has('status'))
                                <div class="alert alert-success">
                                    {{ Session::get('status') }}
                                </div>
                            @endif
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Num.</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clientsatisfaits as $key => $clientsatisfait)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $clientsatisfait->designation }}</td>
                                                <td>

                                                    <img src="{{asset("storage/clientsatisfait_images/$clientsatisfait->logo_client ", env('REDIRECT_HTTPS'))}}"
                                                        style="height : 50px; width : 50px" class="img-circle elevation-2"
                                                        alt="clientsatisfait Image">
                                                </td>
                                                <td>@permission('Clientsatisfait', 'update')
                                                    @if ($clientsatisfait->status != 0)
                                                    <a href="{{ url('/desactiver_clientsatisfait/' . $clientsatisfait->id) }}" class="btn btn-success">Désactiver</a>
                                                    @else
                                                    <a href="{{ url('/activer_clientsatisfait/' . $clientsatisfait->id) }}" class="btn btn-warning">Activer</a>
                                                    @endif
                                                        <a class="btn btn-primary"
                                                            href="{{ route('clientsatisfaits.edit', $clientsatisfait->id) }}"><i
                                                                class="nav-icon fas fa-edit"></i></a>
                                                    @endpermission
                                                    @permission('Clientsatisfait', 'delete')
                                                        <a href="#" class="btn btn-danger" data-toggle="modal"
                                                            data-target="#ModalDelete{{ $clientsatisfait->id }}" id="delete"><i
                                                                class="nav-icon fas fa-trash"></i></a>
                                                    @endpermission
                                                    @include('admin.clientsatisfait.modal.delete')
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Num.</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
@endsection
@section('scripts')
    <!-- DataTables -->
    <script src="{{asset("backend/plugins/datatables/jquery.dataTables.min.js", env('REDIRECT_HTTPS'))}}"></script>
    <script src="{{asset("backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js", env('REDIRECT_HTTPS'))}}"></script>
    <script src="{{asset("backend/plugins/datatables-responsive/js/dataTables.responsive.min.js", env('REDIRECT_HTTPS'))}}"></script>
    <script src="{{asset("backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js", env('REDIRECT_HTTPS'))}}"></script>
    <script src="{{asset("backend/dist/js/bootbox.min.js", env('REDIRECT_HTTPS'))}}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
