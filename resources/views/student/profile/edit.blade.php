@extends('layouts.student-layout')

@section('title', 'Edit Profile')

@section('main-content')
    
    {{-- Assume $profile variable is passed from controller, else use safe defaults --}}
    @php 
        $profile = $profile ?? (object)[
            'university' => '', 
            'year_of_study' => '', 
            'field_of_study' => '',
            'phone' => '', 
            'skills' => '', 
            'interests' => '',
            'experience' => '', 
            'bio' => '',
            'availability_remote' => 0, 
            'availability_physical' => 0, 
            'preferred_hours' => 'weekdays',
            'cv_path' => '',
            // Placeholder for user's phone/location if not on profile model
            'location' => '' 
        ]; 
    @endphp

    <header class="py-6 border-b border-gray-200 mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Edit Personal Profile</h1>
        <p class="text-gray-600 mt-2 text-sm">
            Update your information below. Changes will be visible to job providers immediately.
        </p>
    </header>

    {{-- Main Form --}}
    <form method="POST" action="{{ route('student.profile.update') }}" enctype="multipart/form-data" class="space-y-8 max-w-4xl">
        @csrf
        @method('PUT')
        
        {{-- Top Save Button --}}
        <div class="flex justify-end">
            <button type="submit" class="bg-gig-purple hover:bg-gig-purple-dark text-white rounded-lg py-2 px-6 font-semibold transition">
                Save Profile
            </button>
        </div>

        {{-- Section 1: Personal Information --}}
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100/70 space-y-4">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">1. Personal Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                
                {{-- University --}}
                <div>
                    <label for="university" class="block text-sm font-medium text-gray-700">University</label>
                    <input type="text" id="university" name="university" value="{{ $profile->university ?? '' }}" required
                           class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-gig-purple focus:border-gig-purple">
                </div>

                {{-- Year of Study --}}
                <div>
                    <label for="year_of_study" class="block text-sm font-medium text-gray-700">Year of Study</label>
                    <input type="text" id="year_of_study" name="year_of_study" value="{{ $profile->year_of_study ?? '' }}" required
                           class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-gig-purple focus:border-gig-purple">
                </div>

                {{-- Field of Study --}}
                <div>
                    <label for="field_of_study" class="block text-sm font-medium text-gray-700">Field of Study</label>
                    <input type="text" id="field_of_study" name="field_of_study" value="{{ $profile->field_of_study ?? '' }}" required
                           class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-gig-purple focus:border-gig-purple">
                </div>
                
                {{-- Phone Number --}}
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" id="phone" name="phone" value="{{ $profile->phone ?? Auth::user()->phone ?? '' }}"
                           class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-gig-purple focus:border-gig-purple">
                </div>
                
                {{-- Location --}}
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700">Location (City, Country)</label>
                    <input type="text" id="location" name="location" value="{{ $profile->location ?? '' }}"
                           class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-gig-purple focus:border-gig-purple">
                </div>
                
            </div>
        </div>

        {{-- Section 2: Skills and Interests --}}
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100/70 space-y-4">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">2. Skills and Interests</h3>
            
            <div>
                <label for="skills" class="block text-sm font-medium text-gray-700">Skills (e.g., Tutoring, Graphic Design - Comma separated)</label>
                <textarea id="skills" name="skills" rows="2" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-gig-purple focus:border-gig-purple">{{ $profile->skills ?? '' }}</textarea>
            </div>

            <div>
                <label for="interests" class="block text-sm font-medium text-gray-700">Interests (e.g., Creative gigs, Tech jobs - Comma separated)</label>
                <textarea id="interests" name="interests" rows="2" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-gig-purple focus:border-gig-purple">{{ $profile->interests ?? '' }}</textarea>
            </div>
        </div>

        {{-- Section 3: Experience --}}
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100/70 space-y-4">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">3. Experience</h3>
            
            <div>
                <label for="experience" class="block text-sm font-medium text-gray-700">Description of Experience</label>
                <textarea id="experience" name="experience" rows="4" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-gig-purple focus:border-gig-purple">{{ $profile->experience ?? '' }}</textarea>
            </div>
        </div>
        
        {{-- Section 4: Availability --}}
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100/70 space-y-4">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">4. Availability</h3>
            
            <div class="space-y-3">
                
                {{-- Remote Availability Checkbox --}}
                <label class="inline-flex items-center text-sm font-medium text-gray-600">
                    <input type="hidden" name="availability_remote" value="0">
                    <input type="checkbox" name="availability_remote" value="1" {{ ($profile->availability_remote ?? 0) ? 'checked' : '' }}
                           class="form-checkbox text-gig-purple rounded-sm focus:ring-gig-purple mr-2">
                    Remote work available
                </label>
                
                {{-- Physical Availability Checkbox --}}
                <label class="inline-flex items-center text-sm font-medium text-gray-600 ml-6">
                    <input type="hidden" name="availability_physical" value="0">
                    <input type="checkbox" name="availability_physical" value="1" {{ ($profile->availability_physical ?? 0) ? 'checked' : '' }}
                           class="form-checkbox text-gig-purple rounded-sm focus:ring-gig-purple mr-2">
                    Physical jobs available
                </label>
                
                {{-- Preferred Hours Select --}}
                <div class="max-w-xs pt-2">
                    <label for="preferred_hours" class="block text-sm font-medium text-gray-700">Preferred work times</label>
                    <select id="preferred_hours" name="preferred_hours" required
                           class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-gig-purple focus:border-gig-purple">
                        <option value="weekdays" {{ ($profile->preferred_hours ?? '') == 'weekdays' ? 'selected' : '' }}>Weekdays</option>
                        <option value="weekends" {{ ($profile->preferred_hours ?? '') == 'weekends' ? 'selected' : '' }}>Weekends</option>
                        <option value="evenings" {{ ($profile->preferred_hours ?? '') == 'evenings' ? 'selected' : '' }}>Evenings</option>
                    </select>
                </div>
            </div>
        </div>
        
        {{-- Section 5: About You (Bio) --}}
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100/70 space-y-4">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">5. About You (Bio)</h3>
            <textarea name="bio" rows="4" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-gig-purple focus:border-gig-purple">{{ $profile->bio ?? '' }}</textarea>
        </div>
        
        {{-- Section 6: CV Upload --}}
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100/70 space-y-4">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">6. CV Upload (optional)</h3>
            
            <input type="file" name="cv_file" id="cv_file" class="block w-full text-sm text-gray-500
                   file:mr-4 file:py-2 file:px-4
                   file:rounded-full file:border-0
                   file:text-sm file:font-semibold
                   file:bg-purple-50 file:text-gig-purple
                   hover:file:bg-purple-100">
            
            @if(isset($profile->cv_path))
                <p class="text-sm text-gray-600 mt-2">Current CV: <a href="{{ asset($profile->cv_path) }}" class="text-gig-purple hover:underline">View Document</a></p>
            @endif
        </div>

        {{-- Final Save Button --}}
        <div class="flex justify-end pt-4">
            <button type="submit" class="bg-gig-purple hover:bg-gig-purple-dark text-white rounded-lg py-3 px-8 font-semibold transition">
                Save All Changes
            </button>
        </div>

    </form>

@endsection