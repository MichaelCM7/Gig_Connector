@extends('layouts.student-layout') {{-- Or provider-layout, depending on user --}}

@section('title', 'Account Settings')

@section('main-content')

    <header class="py-6 border-b border-gray-200 mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Account Settings</h1>
        <p class="text-gray-600 mt-2">Manage your login credentials, notifications, and privacy preferences.</p>
    </header>

    <div class="space-y-10 max-w-3xl">

        {{-- 1. Security Section --}}
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100/70">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Security</h3>
            <form method="POST" action="/settings/password">
                @csrf
                @method('PUT')
                <label>Current Password</label>
                {{-- ... password fields ... --}}
                <button class="bg-gig-purple ...">Change Password</button>
            </form>
        </div>

        {{-- 2. Notifications Section --}}
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100/70">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Notifications</h3>
            <div class="space-y-3">
                <label class="flex items-center space-x-2 text-sm">
                    <input type="checkbox" checked class="form-checkbox text-gig-purple rounded-sm">
                    <span>Email me when my application status changes.</span>
                </label>
                {{-- ... other notification toggles ... --}}
            </div>
        </div>
        
        {{-- 3. Profile Preferences (Student specific) --}}
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100/70">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Profile Visibility</h3>
            <label class="flex items-center space-x-2 text-sm">
                <input type="checkbox" checked class="form-checkbox text-gig-purple rounded-sm">
                <span>Allow my public profile to be seen by providers.</span>
            </label>
        </div>
        
    </div>

@endsection