<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyPageController extends Controller
{
    public function index()
    {
        return view('frontend.pages.company-index');
    }
}
