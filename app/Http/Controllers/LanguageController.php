<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    public function getLanguages(Request $request)
    {
        $languages = Language::all();
        return response()->json($languages);
    }
}
