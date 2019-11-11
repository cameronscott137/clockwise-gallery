<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class GalleryImage extends Model
{
    use SoftDeletes;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeWithPrintMethod($query, $printMethod)
    {
        if (is_null($printMethod) || $printMethod == "all print methods") {
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
        if (is_null($category) || $category == "all styles") {
            return $query;
        }
        $query->where('category', ucfirst($category));
    }

    public function scopeWithSearch($query, $search)
    {
        foreach (explode(' ', $search) as $term) {
            $query->where(function ($query) use ($term) {
                $query->where('name', 'LIKE', '%' . $term . '%')
                    ->orWhere('description', 'LIKE', '%' . $term . '%')
                    ->orWhere('print_method', 'LIKE', '%' . $term . '%')
                    ->orWhere('category', 'LIKE', '%' . $term . '%')
                    ->orWhere('num_colors', 'LIKE', '%' . $term . '%');
            });
        }
    }

    public function scopeExcluding($query, $image)
    {
        $query->where('id', '!=', $image->id);
    }
}
