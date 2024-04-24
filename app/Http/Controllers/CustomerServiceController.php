<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerService;
use App\Http\Resources\CustomerServiceResource;

class CustomerServiceController extends Controller
{
    public function getCustomerServices(Request $request)
    {
        $customerServices = CustomerService::all();
        return response()->json($customerServices);
    }

    public function show(CustomerService $customerService)
    {
        return response()->json($customerService);
    }

}
