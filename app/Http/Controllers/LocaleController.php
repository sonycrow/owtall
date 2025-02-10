<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function setLanguage (Request $request)
    {
        // Save selected Locale to current "Session"
        $request->session()->put('locale', $request->locale ?? 'es');

        return redirect()->back();
     }
}