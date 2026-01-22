<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $prices = Plan::where(['frontend_show' => 1, 'show_home' => 1])->get();
        return view('frontend.home.index', compact('prices'));
    }
}