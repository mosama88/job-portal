<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Candidate;

class CandidatePageController extends Controller
{
    public function index()
    {
        $candidates = Candidate::with('skills', 'languages')->paginate(21);
        return view('frontend.pages.candidate-index', compact('candidates'));
    }


    public function show($slug)
    {
        $data = Candidate::where('slug', $slug)->firstOrFail();
        return view('frontend.pages.candidate-details', compact('data'));
    }
}
