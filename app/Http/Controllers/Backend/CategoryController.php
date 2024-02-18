<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('backend.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:categories,name',
            'status' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);

        toastr()->success('Category Created Successfully!');

        return redirect()->route('admin.category.index');
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
        $category = Category::findOrFail($id);
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:categories,name,' . $id,
            'status' => 'required',
        ]);

        Category::findOrFail($id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);

        toastr()->success('Category Updated Successfully!');

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();

        toastr()->success('Category Deleted Successfully!');

        return redirect()->back();
    }
}
