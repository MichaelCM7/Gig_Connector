<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request)
    {
        $role = $request->query('role', 'student'); // default to 'student' if missing

        return view('auth.register', compact('role'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // App\Http\Controllers\Auth\RegisteredUserController.php

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'in:student,provider'],

            // Validation for Student
            'name' => ['required_if:role,student', 'nullable', 'string', 'max:255'],
            'email' => ['required_if:role,student', 'nullable', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class.',email'],
            'university' => ['required_if:role,student', 'nullable', 'string', 'max:255'],

            // Validation for Provider
            'provider_type' => ['required_if:role,provider', 'nullable', 'string', 'max:255'],
        ]);

        // --- FIX: Define the name and email fields for the USERS table based on role ---
        $userName = $request->input('name'); // Since 'name' is the unified field in the form
        $userEmail = $request->input('email');

        // Check if the provider field was used (you should unify the input fields to 'name' and 'email' in the form)
        // If you used different names like 'business_name' or 'business_email' in the form,
        // you must adjust the $userName and $userEmail fields accordingly here.

        $user = User::create([
            'name' => $userName, // <-- FIX: Ensure this is correctly set
            'email' => $userEmail, // <-- FIX: Ensure this is correctly set
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Logic to create the specific profile record (remains correct)
        if ($user->role === 'student') {
            $user->studentProfile()->create(['university_name' => $request->university]);
        } elseif ($user->role === 'provider') {
            $user->providerProfile()->create(['provider_type' => $request->provider_type]);
        }

        event(new Registered($user));
        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
