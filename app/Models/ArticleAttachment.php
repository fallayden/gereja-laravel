<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArticleAttachment extends Model
{
    protected $fillable = ['article_id', 'file_name', 'file_path', 'file_size'];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}