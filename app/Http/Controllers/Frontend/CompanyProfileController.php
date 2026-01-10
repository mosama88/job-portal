<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CompanyInfoUpdateRequest;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function index()
    {
        return view('frontend.company-dashboard.profile.index');
    }

    public function updateCompanyInfo(CompanyInfoUpdateRequest $request)
    {
        dd($request->all());
    }
}