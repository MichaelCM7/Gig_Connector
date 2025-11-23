@props(['role']) 

@php
    $logoColor = 'text-gig-purple'; 
    $primaryColor = 'bg-gig-purple hover:bg-gig-purple-dark';
    $isStudent = ($role === 'student');
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gig Connector | {{ $isStudent ? 'Student Sign Up' : 'Provider Sign Up' }}</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-gray-50">

    <div class="min-h-screen flex items-center justify-center p-4 sm:p-6 bg-gray-50">
        {{-- Reduced min-height --}}
        <div class="bg-white w-full max-w-6xl min-h-[580px] shadow-xl rounded-lg flex overflow-hidden">

            {{-- ----------------------------------------------------- --}}
            {{-- LEFT SECTION (Branding & Illustration) --}}
            {{-- ----------------------------------------------------- --}}
            <div class="hidden md:flex md:w-1/2 p-10 relative bg-white">

                {{-- Illustration (Small and High) - Reduced top position --}}
                <div class="absolute top-8 left-1/2 transform -translate-x-1/2 w-full max-w-[200px]"> 
                    <img src="{{ asset('images/IAP_Gig_Connector.png') }}" 
                         alt="Gig Connector Illustration"
                         class="w-full h-auto">
                </div>

                {{-- Branding (Vertically Centered Block) --}}
                <div class="absolute top-1/2 left-0 w-full px-10 transform -translate-y-1/2 text-center">
                    <h1 class="text-4xl font-extrabold {{ $logoColor }}">Gig Connector</h1>
                    <p class="text-gray-600 text-lg mt-1">Connect, Apply, Grow</p>

                    <a href="#" class="text-sm mt-6 inline-block {{ $logoColor }} hover:underline">
                        Learn More about our platform
                    </a>
                </div>
            </div>

            {{-- ----------------------------------------------------- --}}
            {{-- RIGHT SECTION (FORM) --}}
            {{-- ----------------------------------------------------- --}}
            {{-- Reduced padding --}}
            <div class="w-full md:w-1/2 flex flex-col justify-center items-center p-6 md:p-12">

                <div class="w-full max-w-md">

                    {{-- Title --}}
                    <h2 class="text-4xl font-extrabold mb-8 text-center {{ $logoColor }}">
                        Welcome
                    </h2>

                    {{-- FORM --}}
                    <form method="POST" action="{{ route('register') }}" class="w-full">
                        @csrf
                        <input type="hidden" name="role" value="{{ $role ?? 'student' }}">
                        <div class="space-y-3"> {{-- Reduced space between fields --}}

                            {{-- 1. NAME FIELD --}}
                            <div class="mb-3">
                                <label class="text-sm font-medium text-gray-700">
                                    {{ $isStudent ? 'Full Name' : 'Full Name / Organization Name' }}
                                </label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                       class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-gig-purple focus:border-gig-purple"
                                       placeholder="{{ $isStudent ? 'Jane' : 'Jane' }}" required>
                            </div>

                            {{-- 2. EMAIL FIELD --}}
                            <div class="mb-3">
                                <label class="text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                       class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-gig-purple focus:border-gig-purple"
                                       placeholder="jane@gmail.com" required>
                            </div>

                            {{-- 3. PASSWORD --}}
                            <div class="mb-3">
                                <label class="text-sm font-medium text-gray-600">Password</label>
                                <input type="password" name="password"
                                       class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-gig-purple focus:border-gig-purple"
                                       placeholder="••••••••" required>
                                <p class="text-xs text-gray-500 mt-1">At least 8 characters.</p>
                            </div>

                            {{-- 4. CONFIRM PASSWORD --}}
                            <div class="mb-3">
                                <label class="text-sm font-medium text-gray-600">Confirm Password</label>
                                <input type="password" name="password_confirmation"
                                       class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-gig-purple focus:border-gig-purple"
                                       placeholder="••••••••" required>
                                <p class="text-xs text-gray-500 mt-1">At least 8 characters.</p>
                            </div>

                            {{-- 5. CONDITIONAL ROLE FIELD --}}
                            <div class="mb-4">
                                @if ($isStudent)
                                    <label class="text-sm font-medium text-gray-700">University/College</label>
                                    <select name="university"
                                            class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-gig-purple focus:border-gig-purple">
                                        <option value="">Select here...</option>
                                        <option value="uni-a">University A</option>
                                        <option value="uni-b">University B</option>
                                    </select>
                                @else
                                    <label class="text-sm font-medium text-gray-700">Provider Type</label>
                                    <select name="provider_type"
                                            class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-gig-purple focus:border-gig-purple">
                                        <option value="">Select here...</option>
                                        <option value="individual">Individual Provider</option>
                                        <option value="business">Business / Company</option>
                                        <option value="agency">Agency</option>
                                    </select>
                                @endif
                            </div>

                            {{-- CREATE ACCOUNT BUTTON --}}
                            <button type="submit"
                                class="w-full py-3 rounded-lg text-white font-semibold {{ $primaryColor }}">
                                Create Account
                            </button>
                        </div>
                    </form>

                    {{-- LOGIN LINK --}}
                    <p class="mt-3 text-sm text-gray-500 text-center">
                        Already have an account?
                        <a href="{{ route('login') }}" class="font-semibold {{ $logoColor }} hover:underline">
                            Login
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>