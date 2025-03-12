<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
     public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'required|string|max:255',
            'blog_category_id' => 'required|exists:blog_categories,id',
            'published_at' => 'nullable|date',
        ];
    }
}
