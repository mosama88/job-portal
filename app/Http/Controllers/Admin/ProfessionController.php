<?php

namespace App\Http\Controllers\Admin;


use App\Models\Profession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Profession::filter(request()->all())->latest()->paginate(10);
        return view('admins.professions.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.professions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:professions,name'],
        ]);
        Profession::create($data);

        return redirect()->route('admin.professions.index')->with('success', '⚡️ Created Profession Successfully!');
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
        $profession  = Profession::findOrFail($id);
        return view('admins.professions.edit', compact('profession'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $profession  = Profession::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:professions,name,' . $id],
        ]);
        $profession->update($data);

        return redirect()->route('admin.professions.index')->with('success', '⚡️ Updated Profession Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $profession  = Profession::findOrFail($id);
        $profession->delete();
        return response()->json([
            'success' => true,
            'message' => '⚡️ Deleted Profession Successfully!'
        ]);
    }
}
