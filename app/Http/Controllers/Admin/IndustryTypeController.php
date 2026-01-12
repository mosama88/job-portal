<?php

namespace App\Http\Controllers\Admin;

use App\Models\IndustryType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndustryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = IndustryType::paginate(20);
        return view('admins.industry-types.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.industry-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
        ]);
        IndustryType::create($data);

        return redirect()->route('admin.industry-types.index')->with('success', '⚡️ Updated Industry Types Successfully!');
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
    public function edit($id)
    {
        $industryType  = IndustryType::findOrFail($id);
        return view('admins.industry-types.edit', compact($industryType));
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
    public function destroy(string $id)
    {
        //
    }
}