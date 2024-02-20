@extends('admin.layout.master')
@section('title', 'Category Index')
@push('css')
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Category Index</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Categories</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <a href="{{ route('admin.category.create') }}" class="btn btn-success btn-sm">Create
                                        Category</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@push('scripts')
    {{-- <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script> --}}
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                var id = $(this).data('id');
                var status = $(this).is(':checked') ? 'active' : 'inactive';

                $.ajax({
                    url: "{{ route('admin.category.change-status') }}",
                    method: "put",
                    data: {
                        id: id,
                        status: status,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        toastr.options.closeButton = true;
                        toastr.success(data.message);
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            });
        });
    </script>
@endpush
