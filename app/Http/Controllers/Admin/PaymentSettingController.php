<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Models\PaymentSetting;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaymentSettingRequest;

class PaymentSettingController extends Controller
{
    public function index()
    {
        // $data = OrganizationType::filter(request()->all())->latest()->paginate(10);
        $countries = Country::get();
        $currencies = Currency::get();
        return view('admins.payment-settings.index', compact('countries', 'currencies'));
    }
    public function updatePaypalSettings(PaymentSettingRequest $request)
    {
        $data = $request->validated();

        foreach ($data as $key => $value) {
            PaymentSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }

        return redirect()->back()->with('success', '⚡️ Updated Paypal Setting Successfully!');
    }
}
