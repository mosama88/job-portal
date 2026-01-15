<?php

namespace App\Http\Controllers\Frontend;

use App\Models\State;
use App\Models\Candidate;
use App\Models\Country;
use App\Models\OrganizationType;
use App\Models\IndustryType;
use App\Models\TeamSize;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Frontend\CandidateBasicInfoUpdateRequest;
use App\Http\Requests\Frontend\CompanyFoundingUpdateRequest;
use App\Models\City;

class CandidateProfileController extends Controller
{
    public function index()
    {
        // $userId = Auth::user()->id;
        // $other['states']  = State::get();
        // $other['countries'] = Country::get();
        // $other['cities'] = City::get();
        // $other['organization_types'] = OrganizationType::get();
        // $other['industry_types'] = IndustryType::get();
        // $other['team_sizes'] = TeamSize::get();
        // $companyInfo  = Company::where('user_id', $userId)->first() ?? new Company();
        return view('frontend.candidate-dashboard.profile.index');
    }

    public function basicInfoUpdate(CandidateBasicInfoUpdateRequest $request)
    {
        $userId = Auth::user()->id;
        $data = $request->validated();
        $candidate = Candidate::updateOrCreate(
            [
                'user_id' => $userId
            ],
            $data,
        );

        //Image Fields
        $mediaFields = ['profile_picture', 'cv'];
        foreach ($mediaFields as $field) {
            if ($request->hasFile($field)) {
                // Delete old photo
                $candidate->clearMediaCollection($field);

                // Upload new photo
                $candidate->addMediaFromRequest($field)
                    ->toMediaCollection($field);
            }
        }


        return redirect()->back()->with('success', '⚡️ Updated Info Successfully!');
    }


    // public function updateCompanyFounding(CompanyFoundingUpdateRequest $request)
    // {
    //     $userId = Auth::user()->id;
    //     $data = $request->validated();
    //     $company = Company::updateOrCreate(
    //         [
    //             'user_id' => $userId
    //         ],
    //         $data,
    //     );


    //     if (isCompanyProfileComplete()) {
    //         $companyProfile = Company::where('user_id', $userId)->first();

    //         $companyProfile->profile_completion = 1;
    //         $companyProfile->visibility = 1;
    //         $companyProfile->save();
    //     }

    //     return redirect()->back()->with('success', '⚡️ Updated Founding Successfully!');
    // }


    // public function updateCompanyAccount(Request $request)
    // {
    //     /** @var \App\Models\User $user */
    //     $user = Auth::user();
    //     $validateData = $request->validate([
    //         'name' => ['required', 'string', 'max:100'],
    //         'email' => ['required', 'email'],
    //     ]);

    //     /** @var \App\Models\User $user */

    //     $user->update($validateData);

    //     return redirect()->back()->with('success', '⚡️ Updated Acount Successfully!');
    // }



    // public function updateCompanyPassword(Request $request)
    // {
    //     /** @var \App\Models\User $user */
    //     $user = Auth::user();
    //     $validateData = $request->validate([
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],

    //     ]);

    //     $user->update($validateData);

    //     return redirect()->back()->with('success', '⚡️ Updated Password Successfully!');
    // }
}
