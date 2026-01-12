<?php

namespace App\Http\Controllers\Admin;

use App\Models\OrganizationType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrganizationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = OrganizationType::filter(request()->all())->paginate(30);
        return view('admins.organization-types.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.organization-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:organization_types,name'],
        ]);
        OrganizationType::create($data);

        return redirect()->route('admin.organization-types.index')->with('success', '⚡️ Created Organization Type Successfully!');
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
        $organizationType  = OrganizationType::findOrFail($id);
        return view('admins.organization-types.edit', compact('organizationType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $organizationType  = OrganizationType::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:organization_types,name,' . $id],
        ]);
        $organizationType->update($data);

        return redirect()->route('admin.organization-types.index')->with('success', '⚡️ Updated Organization Type Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $organizationType  = OrganizationType::findOrFail($id);
        $organizationType->delete();
        return response()->json([
            'success' => true,
            'message' => '⚡️ Deleted Organization Type Successfully!'
        ]);
    }
}
