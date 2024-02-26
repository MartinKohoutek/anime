<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BlogPostDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\BlogPostCreateRequest;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(BlogPostDataTable $dataTable)
    {
        return $dataTable->render('backend.blog.post.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::orderBy('name')->get();
        return view('backend.blog.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPostCreateRequest $request)
    {
        $post = new BlogPost();

        $img = $this->uploadImage($request, 'image', 'upload/blog');

        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category;
        $post->image = $img;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->status = $request->status;
        $post->seo_title = $request->seo_title;
        $post->seo_description = $request->seo_description;
        $post->created_at = Carbon::now();

        $post->save();

        toastr()->success('Blog Post Created Successfully!');

        return redirect()->route('admin.blog.post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = BlogCategory::orderBy('name')->get();
        $post = BlogPost::findOrFail($id);
        return view('backend.blog.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = BlogPost::findOrFail($id);

        $img = $this->updateImage($request, 'image', 'upload/blog', $post->image);

        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category;
        $post->image = !empty($img) ? $img : $post->image;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->status = $request->status;
        $post->seo_title = $request->seo_title;
        $post->seo_description = $request->seo_description;
        $post->updated_at = Carbon::now();

        $post->save();

        toastr()->success('Blog Post Updated Successfully!');

        return redirect()->route('admin.blog.post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $post = BlogPost::findOrFail($id);

            $this->deleteImage($post->image);
            $post->delete();

            return response(['status' => 'success', 'message' => 'Blog Post Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something went wrong!']);
        }
    }

    public function changeStatus(Request $request)
    {
        $post = BlogPost::findOrFail($request->id);
        $post->status = $request->status;
        $post->save();

        return response()->json(['status' => 'success', 'message' => 'Blog Category Changed Successfully!']);
    }
}
