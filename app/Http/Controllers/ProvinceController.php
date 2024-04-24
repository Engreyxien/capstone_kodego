<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinces;
use App\Http\Resources\ProvinceResource;

class ProvinceController extends Controller
{
    public function getProvinces(Request $request)
    {
        $provinces = Provinces::all();
        return response()->json($provinces);
    }
}
