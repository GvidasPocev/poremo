<?php

namespace App\Helpers;

use App\Models\Gallery;
use App\Models\Page;
use Illuminate\Support\Facades\Route;

class GalleryFinder
{
    public static function findCurrent(): Gallery
    {
        $galleryType = 0;
        switch (Route::currentRouteName()) {
            case 'gallery':
                $galleryType = 1;
                break;
            case 'certificates':
                $galleryType = 2;
                break;
        }

        $gallery = Gallery::where('type_id', $galleryType)->firstOrFail();

        return $gallery;
    }
}
