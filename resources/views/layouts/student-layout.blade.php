@extends('layouts.dashboard')

@section('title', 'Student Dashboard')

@section('sidebar-navigation')
    {{-- Student-specific Navigation --}}
    <nav class="space-y-1">
        
        {{-- 1. Dashboard Link with Dropdown Structure (Active state applied to the parent) --}}
        <div class="bg-purple-100 rounded-lg shadow-sm">
            <a href="{{ route('dashboard', ['show_filters' => 'false']) }}" class="flex items-center p-3 rounded-lg text-gig-purple font-semibold">
                {{-- Dashboard Icon --}}
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l-7-7m7 7v10a1 1 0 01-1 1h-3m-3 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-10 0h6"></path></svg>
                Dashboard
                <svg class="w-4 h-4 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
            </a>
            
            {{-- Nested Filters and Recommendations Menu --}}
            <div class="space-y-1 pl-6 pb-2">
                <a href="{{ route('dashboard', ['show_filters' => 'true']) }}" class="flex items-center py-2 px-3 text-sm text-gray-700 hover:text-gig-purple">Filters</a>
                <a href="{{ route('dashboard', ['show_filters' => 'false']) }}" class="flex items-center py-2 px-3 bg-purple-200 rounded-md text-gig-purple font-medium text-sm">Recommendations</a>
            </div>
        </div>
        
        {{-- 2. My Applications Link --}}
        <a href="{{ route('student.applications') }}" class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-purple-50 hover:text-gig-purple">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            My Applications
        </a>
        
        {{-- 3. Saved Jobs Link --}}
        <a href="{{ route('student.saved_jobs') }}" class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-purple-50 hover:text-gig-purple">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
            Saved Jobs
        </a>
        
        {{-- 4. My Profile Link --}}
        <a href="{{ route('student.profile.view') }}" class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-purple-50 hover:text-gig-purple">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            My Profile
        </a>
        
        {{-- 5. Settings Link --}}
        <a href="{{ route('settings') }}" class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-purple-50 hover:text-gig-purple">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            Settings
        </a>

        <h3 class="text-xs font-semibold text-gray-500 uppercase mt-4 mb-2">Messages</h3>
        <a href="#" class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-purple-50 hover:text-gig-purple">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-2.81C18.59 13.91 18 12.92 18 12V6a4 4 0 00-8 0v6c0 .92-.59 1.91-1.595 2.81L4 17h5v2a3 3 0 006 0v-2z"></path></svg>
            Notifications
        </a>
    </nav>
@endsection