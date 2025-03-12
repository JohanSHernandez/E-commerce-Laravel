<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'content' => 'required|string',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'article_id' => 'required|exists:articles,id',
        ];
    }
}
