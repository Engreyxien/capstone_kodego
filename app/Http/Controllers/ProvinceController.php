<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Http\Resources\ProvinceResource;

class ProvinceController extends Controller
{
    public function getProvinces(Request $request)
    {
        $provinces = Province::all();
        return response()->json($provinces);
    }
}
