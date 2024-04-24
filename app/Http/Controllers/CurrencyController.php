<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
    public function getCurrencies(Request $request)
    {
        $currencies = Currency::all();
        return response()->json($currencies);
    }
}
