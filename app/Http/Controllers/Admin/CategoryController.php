<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $this->authorize('view', Category::class);

        $categories = Category::all();   
        $categories = $categories->map(function ($category) {
            $category->title = ucwords($category->title);
            return $category;
        });
        return view('admin.categories', compact('categories'));
    }

    public function create()
    {
        //
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        return redirect('admin/categories')->with('success', __('success.create_category') . ' ' . $request->title);
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        $this->authorize('update', $category);

        return view('admin.categories', compact('category'));
    }

    public function update(Category $category, CategoryRequest $request)
    {
        $this->authorize('update', $category);

        $category->update($request->all());
        return redirect('admin/categories')->with('success', __('success.update_category') . ' ' . $request['title']); 
    }

    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);

        $category->delete();
        return redirect('admin/categories')->with('success', __('success.delete_category'));
    }
}
