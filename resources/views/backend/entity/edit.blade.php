@extends('admin.layout.master')
@section('title', 'Update Entity')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Entities</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.entity.index') }}">Entities</a></li>
                        <li class="breadcrumb-item active">Update Entity</li>
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
                            <h3 class="card-title">Update Entity</h3>
                        </div>
                        <form class="form-horizontal" action="{{ route('admin.entity.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="profile-user-img img-fluid"
                                            src="{{ !empty($entity->thumbnail) ? asset($entity->thumbnail) : asset('upload/no_image.jpg') }}"
                                            alt="Entity picture" style="width: 150px; height: 150px" id="showImage">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="thumbnail" class="custom-file-input"
                                                    id="thumbnail">
                                                <label class="custom-file-label" for="thumbnail">Choose
                                                    Thumbnail</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Enter Name" value="{{ $entity->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="category" class="col-sm-2 col-form-label">Category</label>
                                    <div class="col-sm-10">
                                        <select name="category" id="category" class="custom-select">
                                            <option value="">Choose Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @selected($entity->category_id == $category->id)>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="preview" class="col-sm-2 col-form-label">Video Preview</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="preview" class="custom-file-input"
                                                    id="preview">
                                                <label class="custom-file-label" for="preview"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" id="status" class="custom-select">
                                            <option value="active" @selected($entity->status == 'active')>Active</option>
                                            <option value="inactive" @selected($entity->status == 'inactive')>InActive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Entity</button>
                                <a href="{{ route('admin.entity.index') }}" class="btn btn-default float-right">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@push('scripts')
    <script src="{{ asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#thumbnail').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            })
        })

        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endpush
