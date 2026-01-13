<?php

namespace App\Http\Controllers\Admin;

use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = State::filter(request()->all())->latest()->paginate(10);
        return view('admins.states.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::get();
        return view('admins.states.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:states,name'],
            'country_id' => ['required', 'exists:countries,id'],
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
        $countries = Country::get();
        return view('admins.states.edit', compact('state', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $state  = State::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:states,name,' . $id],
            'country_id' => ['required', 'exists:countries,id'],
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
