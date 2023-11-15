<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.services', [
            'services' => Service::query()
                ->get()
                ->map(function ($item) use ($request) {
                    return [
                        'label'  => $item['title'],
                        'image'  => $item->imageLinkAttribute,
                        'short_description'  => $item['short_description'],
                        'active' => ($request->level) == ($item['id'] ?? null) ? true : false,
                        'url'    => $item['slug'],
                    ];
                }),
        ]);
    }

    public function show($slug)
    {
        $service = Service::query()
            ->filterSlug($slug)
            ->first();

        if (!isset($service->id)) {
            abort(404);
        }

        return view('pages.service', [
            'service' => $service
        ]);
    }
}
