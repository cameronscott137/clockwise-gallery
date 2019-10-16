<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryImage extends Model
{
    use SoftDeletes;

    public function scopeWithFilters($query, $filters)
    {
        return $query;
    }
}
