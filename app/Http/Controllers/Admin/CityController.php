<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = City::filter(request()->all())->latest()->paginate(10);
        return view('admins.cities.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states  = State::get();
        $countries = Country::get();
        return view('admins.cities.create', compact('states', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:cities,name'],
            'country_id' => ['required', 'exists:countries,id'],
            'state_id' => ['required', 'exists:states,id'],
        ]);
        City::create($data);

        return redirect()->route('admin.cities.index')->with('success', '⚡️ Created City Successfully!');
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
        $city  = City::findOrFail($id);
        $states  = State::get();
        $countries = Country::get();
        return view('admins.cities.edit', compact('city', 'states', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $city  = City::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:cities,name,' . $id],
            'country_id' => ['required', 'exists:countries,id'],
            'state_id' => ['required', 'exists:states,id'],
        ]);
        $city->update($data);

        return redirect()->route('admin.cities.index')->with('success', '⚡️ Updated City Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $city  = City::findOrFail($id);
        $city->delete();
        return response()->json([
            'success' => true,
            'message' => '⚡️ Deleted City Successfully!'
        ]);
    }
}
