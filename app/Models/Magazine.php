<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    protected $fillable = [
        'title', 'edition_number', 'publish_date', 'cover_image', 'pdf_file',
    ];

    protected $casts = [
        'publish_date' => 'date',
    ];

    protected function editionLabel(): Attribute
    {
        return Attribute::get(function (): string {
            $number = preg_replace('/^edisi\s*/i', '', $this->edition_number) ?? $this->edition_number;

            return 'Edisi '.trim($number);
        });
    }
}
