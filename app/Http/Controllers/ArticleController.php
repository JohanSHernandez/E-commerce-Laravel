<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('blogCategory')
            ->orderBy('published_at', 'desc')
            ->paginate(10);
            
        return view('blog.articles.index', compact('articles'));
    }

    public function create()
    {
        $blogCategories = BlogCategory::all();
        return view('blog.articles.create', compact('blogCategories'));
    }

    public function store(ArticleRequest $request)
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }
        
        Article::create($data);
        
        return redirect()->route('articles.index')
            ->with('success', __('Article created successfully'));
    }

    public function show(Article $article)
    {
        $article->load(['comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);
        
        return view('blog.articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $blogCategories = BlogCategory::all();
        return view('blog.articles.edit', compact('article', 'blogCategories'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            
            $data['image'] = $request->file('image')->store('articles', 'public');
        }
        
        $article->update($data);
        
        return redirect()->route('articles.index')
            ->with('success', __('Article updated successfully'));
    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        
        $article->delete();
        
        return redirect()->route('articles.index')
            ->with('success', __('Article deleted successfully'));
    }
}
