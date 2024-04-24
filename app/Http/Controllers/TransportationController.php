<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transportation;
use App\Http\Resources\TransportationResource;

class TransportationController extends Controller
{
    public function getTransportations(Request $request)
    {
        $transportations = Transportation::all();
        return response()->json($transportations);
    }
}
