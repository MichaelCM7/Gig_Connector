<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gig;

class StudentController extends Controller
{
    public function dashboard()
    {
        $gigs = Gig::where('status', 'open')->latest()->get();
        return view('pages.studentDashboard', compact('gigs'));
    }

    public function showJob($id)
    {
        $gig = Gig::findOrFail($id);
        return view('pages.studentJobDetails', compact('gig'));
    }
}
