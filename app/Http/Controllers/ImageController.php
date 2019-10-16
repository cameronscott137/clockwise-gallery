<?php

namespace App\Http\Controllers;

use App\GalleryImage;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function index(Request $request)
    {
        $images = GalleryImage::withFilters($request->filters)
            ->get();
        return view('images.index', compact('images'));
    }

    public function show(GalleryImage $image)
    {
        return view('images.show', compact($image));
    }
}
