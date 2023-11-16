<?php

namespace App\Http\Controllers;

use App\Models\CompletedWork;
use Illuminate\Http\Request;

class CompletedWorkController extends Controller
{
    public function index()
    {
        try {
            $completed_works = CompletedWork::get();
        } catch (\Exception $e) {
            abort(404);
        }

        return view('pages.completed_works', [
            'works' => $completed_works,
        ]);
    }
}
