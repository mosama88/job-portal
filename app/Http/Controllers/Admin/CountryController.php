<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Country::filter(request()->all())->latest()->paginate(10);
        return view('admins.countries.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:countries,name'],
        ]);
        Country::create($data);

        return redirect()->route('admin.countries.index')->with('success', '⚡️ Created Country Successfully!');
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
        $country  = Country::findOrFail($id);
        return view('admins.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $country  = Country::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:countries,name,' . $id],
        ]);
        $country->update($data);

        return redirect()->route('admin.countries.index')->with('success', '⚡️ Updated Country Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $country  = Country::findOrFail($id);
        $country->delete();
        return response()->json([
            'success' => true,
            'message' => '⚡️ Deleted Country Successfully!'
        ]);
    }

    public function getStates($country_id)
    {
        $states = State::where('country_id', $country_id)->get();
        return response()->json($states);
    }

    public function getCities($state_id)
    {
        $cities = City::where('state_id', $state_id)->get();
        return response()->json($cities);
    }
}
