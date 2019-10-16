<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryImage extends Model
{
    use SoftDeletes;

    public function scopeWithPrintMethod($query, $printMethod)
    {
        if (is_null($printMethod)) {
            return $query;
        }
        $query->where('print_method', ucfirst($printMethod));
    }

    public function scopeWithColorCount($query, $colorCount)
    {
        if (is_null($colorCount)) {
            return $query;
        }
        $query->where('num_colors', $colorCount);
    }

    public function scopeWithCategory($query, $category)
    {
        // dd($category);
        if (is_null($category)) {
            return $query;
        }
        $query->where('category', ucfirst($category));
    }
}
