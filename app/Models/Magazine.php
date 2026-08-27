<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    protected $fillable = [
        'title', 'edition_number', 'publish_date', 'cover_image', 'pdf_file', 'description'
    ];

    protected $casts = [
        'publish_date' => 'date',
    ];
}