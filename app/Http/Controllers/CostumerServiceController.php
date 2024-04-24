<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CostumerService;

class CostumerServiceController extends Controller
{
    public function getCostumerServices(Request $request)
    {
        $costumerServices = CostumerService::all();
        return response()->json($costumerServices);
    }

    public function show(CostumerService $costumerService)
    {
        return response()->json($costumerService);
    }
    
}
