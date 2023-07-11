@extends('admin_layout.admin')
@section('title')
   FAQ
@endsection
@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active">FAQ</li>
@endsection
@section('content')
<!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">FAQ</h3>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="float-sm-right">
                                            @permission('Faq','create')
                                                <a href="#" class="btn btn-success" style="color:white" data-toggle="modal" data-target="#ModalCreate">
                                                    <span style="color:white"></span> {{ __('Ajouter') }}
                                                </a>
                                                @include('admin.faqs.modal.create')
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
                                            <th>{{ __('Question') }}</th>
                                            <th>{{ __('Réponse') }}</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($faqs as $key => $faq)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $faq->question }}</td>
                                                <td>{{ $faq->reponse }}</td>
                                                <td>
                                                    @permission('Faq', 'update')
                                                    @if ($faq->status != 0)
                                                    <a href="{{ url('/desactiver_faq/' . $faq->id) }}" class="btn btn-success">Désactiver</a>
                                                    @else
                                                    <a href="{{ url('/activer_faq/' . $faq->id) }}" class="btn btn-warning">Activer</a>
                                                    @endif
                                                    <a class="btn btn-primary" href="#" data-toggle="modal"
                                                        data-target="#ModalEdit{{ $faq->id }}"><i
                                                            class="nav-icon fas fa-edit"></i></a>
                                                    @endpermission
                                                    @permission('Faq', 'delete')
                                                    <a href="#" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#ModalDelete{{ $faq->id }}" id="delete"><i
                                                            class="nav-icon fas fa-trash"></i></a>
                                                    @endpermission
                                                    @include('admin.faqs.modal.edit')
                                                    @include('admin.faqs.modal.delete')
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Num.</th>
                                            <th>{{ __('Question') }}</th>
                                            <th>{{ __('Réponse') }}</th>
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
