<?php

namespace App\Http\Controllers\Admin;


use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Language::filter(request()->all())->latest()->paginate(10);
        return view('admins.languages.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.languages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:languages,name'],
        ]);
        Language::create($data);

        return redirect()->route('admin.languages.index')->with('success', '⚡️ Created Language Successfully!');
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
        $language  = Language::findOrFail($id);
        return view('admins.languages.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $language  = Language::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:languages,name,' . $id],
        ]);
        $language->update($data);

        return redirect()->route('admin.languages.index')->with('success', '⚡️ Updated Language Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $language  = Language::findOrFail($id);
        $language->delete();
        return response()->json([
            'success' => true,
            'message' => '⚡️ Deleted Language Successfully!'
        ]);
    }
}
