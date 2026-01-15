<?php

namespace App\Http\Controllers\Admin;


use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Plan::filter(request()->all())->latest()->paginate(10);
        return view('admins.plans.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:plans,name'],
        ]);
        Plan::create($data);

        return redirect()->route('admin.plans.index')->with('success', '⚡️ Created Plan Successfully!');
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
        $plan  = Plan::findOrFail($id);
        return view('admins.plans.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $plan  = Plan::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:plans,name,' . $id],
        ]);
        $plan->update($data);

        return redirect()->route('admin.plans.index')->with('success', '⚡️ Updated Plan Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $plan  = Plan::findOrFail($id);
        $plan->delete();
        return response()->json([
            'success' => true,
            'message' => '⚡️ Deleted Plan Successfully!'
        ]);
    }
}
