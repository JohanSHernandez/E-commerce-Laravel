<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'image', 'author', 'blog_category_id', 'published_at'];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function blogCategory(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
