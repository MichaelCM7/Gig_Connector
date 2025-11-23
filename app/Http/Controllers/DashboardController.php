<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Redirects the authenticated user to their specific dashboard based on role.
     */
    public function index(Request $request): View
    {
        // This assumes the 'auth' middleware is applied, so Auth::user() is safe.
        $userRole = Auth::user()->role;
        $showFilters = $request->query('show_filters') === 'true';

        if ($userRole === 'student') {
            // INTEGRATION POINT: The student view also needs a $jobs variable.
            $jobs = collect([]); // Placeholder for now, replace with actual fetch

            return view('student.dashboard', compact('jobs', 'showFilters'));

        } elseif ($userRole === 'provider') {
            $showFilters = $request->query('show_filters') === 'true';

            $posts = collect([
                // Dummy data array to satisfy the Blade loop structure
                (object) ['id' => 1, 'title' => 'Tutor Math', 'is_closed' => false, 'application_count' => 100, 'duration' => '12/08 - 21/09/2025'],
                (object) ['id' => 2, 'title' => 'Web Dev Gig', 'is_closed' => true, 'application_count' => 50, 'duration' => '01/01 - 30/01/2026'],
            ]);

            return view('provider.dashboard', compact('posts', 'showFilters'));
        }

        return view('dashboard');
    }
}
