<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Faq;
use App\Models\Review;
use App\Models\Teacher;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }
}
