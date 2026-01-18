<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Skill;
use App\Models\Language;
use App\Models\Candidate;
use App\Models\Experience;
use App\Models\Profession;
use Illuminate\Http\Request;
use App\Models\CandidateExperience;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Frontend\CandidateBasicInfoUpdateRequest;
use App\Http\Requests\Frontend\CandidateProfileInfoUpdateRequest;

class CandidateProfileController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $other['experiences']  = Experience::get();
        $other['professions'] = Profession::get();
        $other['languages'] = Language::get();
        $other['skills'] = Skill::get();
        $candidate  = Candidate::with('skills', 'languages')->where('user_id', $userId)->first() ?? new Candidate();
        $candidateSkill = $candidate->skills->pluck('id')->toArray();
        $candidateLang = $candidate->languages->pluck('id')->toArray();
        $experiences  = CandidateExperience::with('candidate')->where('candidate_id', $candidate->id)->get();
        return view('frontend.candidate-dashboard.profile.index', compact('candidate', 'other', 'candidateSkill', 'candidateLang', 'experiences'));
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

    public function profileInfoUpdate(CandidateProfileInfoUpdateRequest $request)
    {
        $userId = Auth::user()->id;
        $data = $request->validated();
        $candidate = Candidate::updateOrCreate(
            [
                'user_id' => $userId
            ],
            $data,
        );

        foreach ($request->language_you_know as $language) {
            $pivotLanguageData[$language] = [];
        }


        foreach ($request->skill_you_have as $skill) {
            $pivotSkillData[$skill] = [];
        }
        $candidate->skills()->sync($request->skill_you_have ?? []);
        $candidate->languages()->sync($request->language_you_know ?? []);


        return redirect()->back()->with('success', '⚡️ Updated Info Successfully!');
    }
}