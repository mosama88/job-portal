<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Models\CandidateEducation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Frontend\CandidateEducationRequest;

class CandidateEducationController extends Controller
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
    public function store(CandidateEducationRequest $request)
    {
        if ($request->ajax()) {
            $data = $request->validated();

            CandidateEducation::create($data);

            return response()->json([
                'status' => true,
                'message' => '⚡️ Created Education Successfully!'
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
        $experience = CandidateEducation::findOrFail($id);
        $userId = Auth::user()->id;

        // التحقق من أن المستخدم يملك هذه الخبرة
        if ($experience->candidate_id !==  $userId) {
            abort(403);
        }

        if (request()->ajax()) {
            return response()->json([
                'status' => true,
                'data' => $experience
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandidateEducationRequest $request, string $id)
    {
        $education = CandidateEducation::findOrFail($id);
        $userId = Auth::user()->id;

        // التحقق من أن المستخدم يملك هذه الخبرة
        if ($education->candidate_id !==  $userId) {
            return response()->json([
                'status' => false,
                'message' => 'You are not authorized to modify this education.'
            ], 403);
        }

        if ($request->ajax()) {
            $data = $request->validated();

            $education->update($data);

            return response()->json([
                'status' => true,
                'message' => '✅ The Education was successfully updated!'
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $education  = CandidateEducation::findOrFail($id);
        $education->delete();
        return response()->json([
            'success' => true,
            'message' => '⚡️ Deleted Education Successfully!'
        ]);
    }
}