@extends('admin.layout.master')
@section('title', 'Create Entity')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blog Posts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.blog.post.index') }}">Blog Posts</a></li>
                        <li class="breadcrumb-item active">Update Blog Post</li>
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
                            <h3 class="card-title">Update Blog Post</h3>
                        </div>
                        <form class="form-horizontal" action="{{ route('admin.blog.post.update', $post->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="profile-user-img img-fluid"
                                            src="{{ !empty($post->image) ? asset($post->image) : asset('upload/no_image.jpg') }}"
                                            alt="Post image" style="width: 150px; height: 150px" id="showImage">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="thumbnail" class="col-sm-2 col-form-label">Post Image</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input"
                                                    id="image">
                                                <label class="custom-file-label"
                                                    for="image">{{ basename($post->image) }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 col-form-label">Post Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="Enter Title" value="{{ $post->title }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="category" class="col-sm-2 col-form-label">Category</label>
                                    <div class="col-sm-10">
                                        <select name="category" id="category" class="custom-select">
                                            <option value="">Choose Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @selected($category->id == $post->category_id)>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" id="status" class="custom-select">
                                            <option value="active" @selected($post->status == 'active')>Active</option>
                                            <option value="inactive" @selected($post->status == 'inactive')>InActive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" id="summernote" rows="10">
                                            {!! $post->description !!}
                                          </textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="seo_title" class="col-sm-2 col-form-label">SEO Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="seo_title" class="form-control" id="seo_title"
                                            placeholder="Enter SEO Title" value="{{ $post->seo_title }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="seo_description" class="col-sm-2 col-form-label">SEO Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="seo_description" id="seo_description" rows="3">{!! $post->seo_description !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Blog Post</button>
                                <a href="{{ route('admin.blog.post.index') }}"
                                    class="btn btn-default float-right">Back</a>
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
            $('#image').change(function(e) {
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

        $(function() {
            $('#summernote').summernote({
                height: 500,
            });
        })
    </script>
@endpush
