<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\EntityDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\EntityStoreRequest;
use App\Http\Requests\Backend\EntityUpdateRequest;
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
    public function store(EntityStoreRequest $request)
    {
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
        $categories = Category::all();
        $entity = Entity::findOrFail($id);
        return view('backend.entity.edit', compact('entity', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EntityUpdateRequest $request, string $id)
    {
        $entity = Entity::findOrFail($id);

        $img = $this->updateImage($request, 'thumbnail', '/upload/entities/thumbnails', $entity->thumbnail);
        $video = $this->uploadVideo($request, 'preview', '/upload/entities/previews', $entity->preview);

        $entity->thumbnail = !empty($img) ? $img : $entity->thumbnail;
        $entity->preview = !empty($video) ? $video : $entity->preview;
        $entity->name = $request->name;
        $entity->category_id = $request->category;
        $entity->status = $request->status;
        $entity->save();

        toastr()->success('Entity Updated Successfully!');

        return redirect()->route('admin.entity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $entity = Entity::findOrFail($id);
        $this->deleteImage($entity->thumbnail);
        $this->deleteVideo($entity->preview);
        $entity->delete();

        return response(['status' => 'success', 'message' => 'Category Deleted Successfuly']);
    }

    public function changeStatus(Request $request)
    {
        $entity = Entity::findOrFail($request->id);
        $entity->status = $request->status;
        $entity->save();

        return response()->json(['message' => 'Status Changed Successfully!']);
    }
}
