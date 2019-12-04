<?php

namespace App\Http\Controllers;

use App\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{

    public function index(Request $request)
    {
        $images = GalleryImage::withSearch($request->search)
            ->skip($request->offset)
            ->orderBy('created_at', 'desc')
            ->take(30)
            ->get();

        return view('images.index', compact('images'));
    }

    public function paginate(Request $request)
    {

        $images = GalleryImage::withSearch($request->search)
            ->offset($request->offset)
            ->orderBy('created_at', 'desc')
            ->take(30)
            ->get();
        Log::info($images->count());
        return response([
            'images' => $images,
            'load_more' => ($images->count() == 30 ? true : false)
        ], 200);
    }

    public function search(Request $request)
    {

        $images = GalleryImage::withSearch($request->search)
            ->orderBy('created_at', 'desc')
            ->get();

        return response([
            'images' => $images,
            'load_more' =>  false
        ], 200);
    }

    public function show(GalleryImage $image, Request $request)
    {
        $images = GalleryImage::excluding($image)
            ->skip($request->offset)
            ->orderBy('created_at', 'desc')
            ->take(30)
            ->get();

        return view('images.show', compact('image', 'images'));
    }
}
