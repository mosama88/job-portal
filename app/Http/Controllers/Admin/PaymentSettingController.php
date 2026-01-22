<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    public function index()
    {
        // $data = OrganizationType::filter(request()->all())->latest()->paginate(10);
        return view('admins.payment-settings.index');
    }
}
