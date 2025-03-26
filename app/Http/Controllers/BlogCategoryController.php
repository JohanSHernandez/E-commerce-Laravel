<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCategoryRequest;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $blogCategories = BlogCategory::paginate(10);
        return view('blog.categories.index', compact('blogCategories'));
    }

    public function create()
    {
        return view('blog.categories.create');
    }

    public function store(BlogCategoryRequest $request)
    {
        BlogCategory::create($request->validated());
        
        return redirect()->route('blog-categories.index')
            ->with('success', __('Blog category created successfully'));
    }

    public function show(BlogCategory $blogCategory)
    {
        return view('blog.categories.show', compact('blogCategory'));
    }

    public function edit(BlogCategory $blogCategory)
    {
        return view('blog.categories.edit', compact('blogCategory'));
    }

    public function update(BlogCategoryRequest $request, BlogCategory $blogCategory)
    {
        $blogCategory->update($request->validated());
        
        return redirect()->route('blog-categories.index')
            ->with('success', __('Blog category updated successfully'));
    }

    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();
        
        return redirect()->route('blog-categories.index')
            ->with('success', __('Blog category deleted successfully'));
    }
}