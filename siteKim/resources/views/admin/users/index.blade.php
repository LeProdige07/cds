@extends('admin_layout.admin')
@section('title')
Utilisateurs
@endsection

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active">Utilisateurs</li>
@endsection
@section('content')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tous les utilisateurs</h3>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="float-sm-right">
                                            @permission('User','create')
                                                <a href="#" class="btn btn-success" style="color:white" data-toggle="modal" data-target="#ModalCreate">
                                                    <span style="color:white"></span> {{ __('Ajouter') }}
                                                </a>
                                                @include('admin.users.modal.create')
                                            @endpermission
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (Session::has('status'))
                                <div class="alert alert-success">
                                    {{ Session::get('status') }}
                                </div>
                            @endif

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Num.</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>Email</th>
                                            <th>{{ __('Role') }}</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->getRolesUser() }}</td>
                                                <td>
                                                    @permission('User', 'read')
                                                    <a class="btn btn-secondary" data-toggle="modal"
                                                        data-target="#ModalShow{{ $user->id }}" href="#"><i
                                                            class="nav-icon fas fa-file"></i></a>
                                                    @endpermission
                                                    @permission('User', 'update')
                                                    <a class="btn btn-primary" href="#" data-toggle="modal"
                                                        data-target="#ModalEdit{{ $user->id }}"><i
                                                            class="nav-icon fas fa-edit"></i></a>
                                                    @endpermission
                                                    @permission('User', 'delete')
                                                    <a href="#" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#ModalDelete{{ $user->id }}" id="delete"><i
                                                            class="nav-icon fas fa-trash"></i></a>
                                                    @endpermission
                                                    @include('admin.users.modal.edit')
                                                    @include('admin.users.modal.delete')
                                                </td>
                                                @include('admin.users.modal.show')
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Num.</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>Email</th>
                                            <th>{{ __('Role') }}</th>
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
    <script src="backend/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


    <script src="backend/dist/js/bootbox.min.js"></script>
    <!-- page script -->

    {{-- <script>
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            bootbox.confirm("Do you really want to delete this element ?", function(confirmed) {
                if (confirmed) {
                    window.location.href = link;
                };
            });
        });
    </script> --}}
    <!-- page script -->
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
