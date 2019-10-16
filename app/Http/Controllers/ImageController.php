<?php

namespace App\Http\Controllers;

use App\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{

    public function index(Request $request)
    {
        $images = GalleryImage::withPrintMethod($request->print_method)
            ->withColorCount($request->color_count)
            ->withCategory($request->category)
            ->get();

        return view('images.index', compact('images'));
    }

    public function search(Request $request)
    {
        $images = GalleryImage::withPrintMethod($request->print_method)
            ->withColorCount($request->color_count)
            ->withCategory($request->category)
            ->get();

        return response($images, 200);
    }



    public function show(GalleryImage $image)
    {
        return view('images.show', compact($image));
    }
}
