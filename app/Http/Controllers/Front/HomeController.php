<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Back\BackController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends BackController
{
    public function showHome()
    {
        return view('front.home');
    }
}
