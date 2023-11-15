<?php

namespace App\Helpers;

use App\Models\Page;
use Illuminate\Support\Facades\Route;

class PageFinder
{
    public static function findCurrent(): Page
    {
        $pageType = 0;
        switch (Route::currentRouteName()) {
            case 'contact':
                $pageType = 1;
                break;
            case 'terms-rules':
                $pageType = 2;
                break;
            case 'privacy-rules':
                $pageType = 3;
                break;
            case 'about':
                $pageType = 4;
                break;
            case 'kiti':
                $pageType = 5;
                break;
        }

        $page = Page::where('type_id', $pageType)->firstOrFail();

        return $page;
    }
}
