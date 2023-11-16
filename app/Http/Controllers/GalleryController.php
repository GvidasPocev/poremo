<?php

namespace App\Http\Controllers;

use App\Helpers\GalleryFinder;
use App\Models\Gallery;
use App\Models\GalleryType;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        try {
            $gallery = GalleryFinder::findCurrent();
        } catch (\Exception $e) {
            abort(404);
        }

        return view('pages.gallery', [
            'gallery' => $gallery,
        ]);
    }
}
