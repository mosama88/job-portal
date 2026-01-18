<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Models\CandidateExperience;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Frontend\CandidateExperienceRequest;

class CandidateExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CandidateExperienceRequest $request)
    {
        if ($request->ajax()) {
            $data = $request->validated();
            $data['currently_working'] = $request->has('currently_working') ? 1 : 0;

            CandidateExperience::create($data);

            return response()->json([
                'status' => true,
                'message' => '⚡️ Created Experience Successfully!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $experience  = CandidateExperience::findOrFail($id);
        $experience->delete();
        return response()->json([
            'success' => true,
            'message' => '⚡️ Deleted Experience Successfully!'
        ]);
    }
}
