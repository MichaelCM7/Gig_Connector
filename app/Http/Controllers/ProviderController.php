<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function dashboard()
    {
        return view('provider.dashboard');
    }
}
