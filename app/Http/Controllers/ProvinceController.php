<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
    public function getProvinces(Request $request)
    {
        $provinces = Province::all();
        return response()->json($provinces);
    }
}
