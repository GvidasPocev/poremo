<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Helpers\Nav;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Vite;

class Header extends Component
{
    public $logo;
    public $publicNavigation;
    public $authNavigation;
    public $user;

    public function __construct()
    {
        $this->logo = Vite::asset('resources/assets/logo.png');
        $this->publicNavigation = Nav::getPublic();
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('components.header');
    }
}
