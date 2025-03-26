<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewCommentNotification;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $comment = Comment::create($request->validated());
        
        $article = Article::find($request->article_id);
        Mail::to('author@example.com')->send(new NewCommentNotification($article, $comment));
        
        return redirect()->route('articles.show', $comment->article_id)
            ->with('success', __('Comment added successfully'));
    }

    public function edit(Comment $comment)
    {
        return view('blog.comments.edit', compact('comment'));
    }

    public function update(CommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated());
        
        return redirect()->route('articles.show', $comment->article_id)
            ->with('success', __('Comment updated successfully'));
    }

    public function destroy(Comment $comment)
    {
        $articleId = $comment->article_id;
        $comment->delete();
        
        return redirect()->route('articles.show', $articleId)
            ->with('success', __('Comment deleted successfully'));
    }
}