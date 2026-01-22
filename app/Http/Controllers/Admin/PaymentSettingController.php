<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    public function index()
    {
        // $data = OrganizationType::filter(request()->all())->latest()->paginate(10);
        $countries = Country::get();
        return view('admins.payment-settings.index', compact('countries'));
    }
    public function updatePaypalSettings(Request $request)
    {
        dd($request->all());
        // $language  = Language::findOrFail($id);

        // $data = $request->validate([
        //     'name' => ['required', 'string', 'max:100', 'unique:languages,name,' . $id],
        // ]);
        // $language->update($data);

        return redirect()->back()->with('success', '⚡️ Updated Paypal Setting Successfully!');
    }
}