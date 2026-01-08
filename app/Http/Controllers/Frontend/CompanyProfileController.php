<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function index()
    {
        return view('frontend.company-dashboard.profile.index');
    }
}
