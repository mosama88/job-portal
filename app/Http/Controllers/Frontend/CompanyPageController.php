<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyPageController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(21);
        return view('frontend.pages.company-index', compact('companies'));
    }


    public function show($slug)
    {
        $data = Company::where('slug', $slug)->firstOrFail();
        return view('frontend.pages.company-details', compact('data'));
    }
}