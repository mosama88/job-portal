<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Frontend\CompanyInfoUpdateRequest;

class CompanyProfileController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $companyInfo  = Company::where('user_id', $userId)->first();
        return view('frontend.company-dashboard.profile.index', compact('companyInfo'));
    }

    public function updateCompanyInfo(CompanyInfoUpdateRequest $request)
    {

        $userId = Auth::user()->id;
        $data = $request->validated();
        $company = Company::updateOrCreate(
            [
                'user_id' => $userId
            ],
            $data,
        );

        //Image Fields
        $mediaFields = ['logo', 'banner'];
        foreach ($mediaFields as $field) {
            if ($request->hasFile($field)) {
                $company
                    ->addMediaFromRequest($field)
                    ->toMediaCollection($field);
            }
        }


        return redirect()->back()->with('success', 'Company Updated successfully');
    }
}
