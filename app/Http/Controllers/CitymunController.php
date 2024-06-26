<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citymun;
use App\Http\Resources\CitymunResource;

class CitymunController extends Controller
{
    public function getCitymuns(Request $request)
    {
        $citymuns = Citymun::all();
        return response()->json($citymuns);
    }

    public function show(Citymun $citymun)
    {
        return response()->json($citymun);
    }

}
