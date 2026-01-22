<?php

namespace App\Http\Controllers\Admin;

use App\Models\Currency;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Currency::filter(request()->all())->latest()->paginate(10);
        return view('admins.currencies.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:currencies,name'],
            'code' => ['required', 'string', 'max:100', 'unique:currencies,code'],
        ]);
        Currency::create($data);

        return redirect()->route('admin.currencies.index')->with('success', '⚡️ Created Currency Successfully!');
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
        $currency  = Currency::findOrFail($id);
        return view('admins.currencies.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $currency  = Currency::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:currencies,name,' . $id],
            'code' => ['required', 'string', 'max:100', 'unique:currencies,code,' . $id],
        ]);
        $currency->update($data);

        return redirect()->route('admin.currencies.index')->with('success', '⚡️ Updated Currency Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $currency  = Currency::findOrFail($id);
        $currency->delete();
        return response()->json([
            'success' => true,
            'message' => '⚡️ Deleted Currency Successfully!'
        ]);
    }
}
