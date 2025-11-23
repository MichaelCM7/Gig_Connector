{{--resources/views/layouts/dashboard.blade.php--}} 

@extends('layouts.app') 

@section('content')
@php
    $logoColor = 'text-gig-purple';
@endphp

<div class="flex min-h-screen">
    
    {{-- LEFT SIDEBAR (Fixed Structure) --}}
    {{-- w-64 sets the width to 256px --}}
    <aside class="w-64 bg-white flex flex-col justify-between p-4 fixed left-0 top-0 bottom-0 z-30 shadow-xl">
        
        <div>
            @include('layouts.partials.sidebar-header') 
            <h3 class="text-xs font-semibold text-gray-500 uppercase mb-2">Main</h3>

            {{-- Navigation Links (Role-specific content injected here) --}}
            @yield('sidebar-navigation')
        </div>
{{-- Bottom Section: Log Out & Branding --}}
        {{-- We reduce pt-4 and pb-4 to pt-2 and pb-2 to compress the whole footer vertically --}}
        <div class="pb-2 text-center border-t border-gray-100 pt-2">
            
            {{-- LOG OUT LINK --}}
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
               class="text-sm text-gray-700 hover:text-red-500 mb-1 block flex items-center justify-center space-x-2">
                {{-- Reduced mb-2 to mb-1 --}}
                
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <span>Log out</span>
            </a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            {{-- Branding --}}
            <div class="mt-1">
                <p class="text-lg font-extrabold {{ $logoColor }} leading-none">Gig Connector</p>
                <p class="text-xs text-gray-500">Connect. Apply. Grow</p>
            </div>
        </div>
    </aside>
    {{-- MAIN CONTENT AREA --}}
    {{-- CRITICAL FIX: ml-64 must be applied to main to push it away from the fixed sidebar --}}
    <main class="flex-grow ml-64 p-6 lg:p-10 w-full"> 
        @yield('main-content')
    </main>

</div>
@endsection