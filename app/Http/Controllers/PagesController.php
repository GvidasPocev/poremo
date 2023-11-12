<?php

namespace App\Http\Controllers;

use App\Actions\Customer\SendMessage;
use App\Helpers\PageFinder;
use App\Http\Controllers\Controller;
use App\Models\Navigation;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        try {
            $page = PageFinder::findCurrent();
        } catch (\Exception $e) {
            abort(404);
        }

        return view('pages.page', [
            'page' => $page,
        ]);
    }

    public function contactuUs(Request $request, SendMessage $sendMessage)
    {
        $sendMessage->send($request->all());

        return back()->with('success', __('content.cantactus.success'));
    }
}
