<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\EntityDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Entity;
use App\Traits\ImageUploadTrait;
use App\Traits\VideoUploadTrait;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    use ImageUploadTrait, VideoUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(EntityDataTable $dataTable)
    {
        return $dataTable->render('backend.entity.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.entity.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|string',
            'category' => 'required',
            'thumbnail' => 'required|image|max:4096',
            'preview' => 'required|mimetypes:video/avi,video/mpeg,video/mp4,video/quicktime|max:102400',
            'status' => 'required',
        ]);

        $entity = new Entity();

        $img = $this->uploadImage($request, 'thumbnail', '/upload/entities/thumbnails');
        $video = $this->uploadVideo($request, 'preview', '/upload/entities/previews');

        $entity->name = $request->name;
        $entity->category_id = $request->category;
        $entity->status = $request->status;
        $entity->thumbnail = $img;
        $entity->preview = $video;
        $entity->save();

        toastr()->success('Entity Created Successfully');

        return redirect()->route('admin.entity.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
