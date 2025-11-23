@extends('layouts.guest')

@section('content')
@php
    $logoColor = 'text-gig-purple'; 
    $primaryColor = 'bg-gig-purple hover:bg-gig-purple-dark';
@endphp

<div class="w-full"> 
    {{-- Outer Card Container --}}
    <div class="min-h-screen flex items-center justify-center p-4 sm:p-6 bg-gray-50 w-full">
        <div class="bg-white w-full max-w-6xl min-h-[580px] shadow-xl rounded-lg flex overflow-hidden">

            {{-- ----------------------------------------------------- --}}
            {{-- LEFT SECTION (Branding - CLEAN, VERTICALLY CENTERED) --}}
            {{-- ----------------------------------------------------- --}}
            <div class="hidden md:flex md:w-1/2 p-10 relative bg-white">

                {{-- Branding (Vertically Centered Block) --}}
                <div class="absolute top-1/2 left-0 w-full px-10 transform -translate-y-1/2 text-center">
                    
                    <h1 class="text-4xl font-extrabold {{ $logoColor }}">Gig Connector</h1>
                    <p class="text-gray-600 text-lg mt-1">Connect. Apply. Grow</p>

                    <a href="#" class="text-sm mt-6 inline-block {{ $logoColor }} hover:underline">
                        Learn More about our platform
                    </a>
                </div>
            </div>

            {{-- ----------------------------------------------------- --}}
            {{-- RIGHT SECTION (LOGIN FORM) --}}
            {{-- ----------------------------------------------------- --}}
            <div class="w-full md:w-1/2 flex flex-col justify-center items-center p-6 md:p-12">

                <div class="w-full max-w-sm"> 

                    <h2 class="text-4xl font-extrabold mb-8 text-center {{ $logoColor }}">
                        Welcome Back
                    </h2>
                    
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="w-full">
                        @csrf
                        <div class="space-y-4">

                            {{-- 1. EMAIL FIELD --}}
                            <div class="mb-4">
                                <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                                       class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-gig-purple focus:border-gig-purple"
                                       placeholder="jane@gmail.com">
                            </div>

                            {{-- 2. PASSWORD --}}
                            <div class="mb-4">
                                <label for="password" class="text-sm font-medium text-gray-700">Password</label>
                                <input id="password" type="password" name="password" required autocomplete="current-password"
                                       class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-gig-purple focus:border-gig-purple"
                                       placeholder="••••••••">
                            </div>

                            {{-- Remember Me & Forgot Password --}}
                            <div class="flex items-center justify-between">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-gig-purple shadow-sm focus:ring-gig-purple" name="remember">
                                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                                </label>
                                
                                @if (Route::has('password.request'))
                                    <a class="text-sm text-gig-purple hover:underline" href="{{ route('password.request') }}">
                                        Forgot your password?
                                    </a>
                                @endif
                            </div>

                            {{-- LOGIN BUTTON --}}
                            <button type="submit"
                                class="w-full py-3 rounded-lg text-white font-semibold {{ $primaryColor }} mt-4">
                                Log In
                            </button>
                        </div>
                    </form>

                    {{-- REGISTER LINK --}}
                    <p class="mt-4 text-sm text-gray-500 text-center">
                        Don't have an account? 
                        <a href="{{ route('register') }}" class="font-semibold {{ $logoColor }} hover:underline">
                            Sign Up
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection