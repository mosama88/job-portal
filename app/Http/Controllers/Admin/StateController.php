<?php

namespace App\Http\Controllers\Admin;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = State::filter(request()->all())->paginate(30);
        return view('admins.states.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.states.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:states,name'],
        ]);
        State::create($data);

        return redirect()->route('admin.states.index')->with('success', '⚡️ Created State Successfully!');
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
        $state  = State::findOrFail($id);
        return view('admins.states.edit', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $state  = State::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:states,name,' . $id],
        ]);
        $state->update($data);

        return redirect()->route('admin.states.index')->with('success', '⚡️ Updated State Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $state  = State::findOrFail($id);
        $state->delete();
        return response()->json([
            'success' => true,
            'message' => '⚡️ Deleted State Successfully!'
        ]);
    }
}
