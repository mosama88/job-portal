<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id)
    {
        $price = Plan::where('id', $id)->first();
        return view('frontend.pages.checkout-index', compact('price'));
    }
}