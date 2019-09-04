<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();   
        return view('admin.categories', compact('categories'));
    }

    public function create()
    {
        //
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all());

        return redirect('admin/categories');
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('admin.categories', compact('category'));
    }

    public function update(Category $category, CategoryRequest $request)
    {
        $category->update($request->all());
        return redirect('admin/categories'); 
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('admin/categories');
    }
}
