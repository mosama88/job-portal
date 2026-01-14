<?php

namespace App\Http\Controllers\Admin;


use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Skill::filter(request()->all())->latest()->paginate(10);
        return view('admins.skills.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:skills,name'],
        ]);
        Skill::create($data);

        return redirect()->route('admin.skills.index')->with('success', '⚡️ Created Skill Successfully!');
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
        $skill  = Skill::findOrFail($id);
        return view('admins.skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $skill  = Skill::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:skills,name,' . $id],
        ]);
        $skill->update($data);

        return redirect()->route('admin.skills.index')->with('success', '⚡️ Updated Skill Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $skill  = Skill::findOrFail($id);
        $skill->delete();
        return response()->json([
            'success' => true,
            'message' => '⚡️ Deleted Skill Successfully!'
        ]);
    }
}
