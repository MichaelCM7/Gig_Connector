@extends('layouts.student-layout')

@section('title', 'Personal Profile')

@section('main-content')
    
    {{-- Assume $profile variable is passed from controller, else use safe defaults --}}
    @php 
        $profile = $profile ?? (object)[
            'university' => 'Strathemore University', 
            'year_of_study' => '2nd year', 
            'field_of_study' => 'Computer Science',
            'phone' => '+254111111123',
            'location' => 'Nairobi, Kenya',
            'skills' => 'Tutoring, Graphic Design, Data Entry', 
            'interests' => 'Creative gigs, Tech gigs, Academic Help',
            'experience' => 'Worked as an assistant at ...', 
            'availability_remote' => true, 
            'availability_physical' => true,
            'preferred_hours' => 'Weekdays, Weekends, Evenings',
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent faucibus, arcu sed dictum pharetra...',
            'cv_path' => 'uploads/cv.pdf'
        ]; 
    @endphp

    <header class="py-6 border-b border-gray-200 mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Personal Profile</h1>
        <p class="text-gray-600 mt-2 text-sm">
            This is what job providers see when you apply for positions. You will, however, be allowed to upload your CV as you apply for the job...
        </p>
        
        {{-- Link to the actual EDIT FORM --}}
        <a href="{{ route('student.profile.edit') }}" class="mt-4 inline-block text-gig-purple font-medium hover:underline">
            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.536L15.232 5.232z"></path></svg>
            Edit Profile
        </a>
    </header>

    {{-- Main Profile Sections Container (View Only) --}}
    <div class="space-y-8 max-w-4xl">
        
        {{-- Section 1: Personal Information --}}
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100/70">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">1. Personal Information</h3>
            <dl class="text-sm space-y-2">
                <dt class="font-medium text-gray-600">Full name: <span class="font-normal text-gray-800">Angela Chepngeno Kosgei</span></dt>
                <dt class="font-medium text-gray-600">University: <span class="font-normal text-gray-800">{{ $profile->university }}</span></dt>
                <dt class="font-medium text-gray-600">Year of Study: <span class="font-normal text-gray-800">{{ $profile->year_of_study }}</span></dt>
                <dt class="font-medium text-gray-600">Field of Study: <span class="font-normal text-gray-800">{{ $profile->field_of_study }}</span></dt>
                <dt class="font-medium text-gray-600">Phone Number: <span class="font-normal text-gray-800 text-gig-purple">{{ $profile->phone }}</span></dt>
                <dt class="font-medium text-gray-600">Location: <span class="font-normal text-gray-800">{{ $profile->location }}</span></dt>
            </dl>
        </div>

        {{-- Section 2: Skills and Interests --}}
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100/70">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">2. Skills and Interests</h3>
            <dl class="text-sm space-y-2">
                <dt class="font-medium text-gray-600">Skills: <span class="font-normal text-gray-800">{{ $profile->skills }}</span></dt>
                <dt class="font-medium text-gray-600">Interests: <span class="font-normal text-gray-800">{{ $profile->interests }}</span></dt>
                <dt class="font-medium text-gray-600">Uploads and links: <a href="#" class="text-gig-purple hover:underline font-normal">github.com</a></dt>
            </dl>
        </div>

        {{-- Section 3: Experience (THE MISSING SECTION) --}}
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100/70">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">3. Experience</h3>
            <dl class="text-sm space-y-2">
                <dt class="font-medium text-gray-600">Experience: <span class="font-normal text-gray-800">Present</span></dt>
                <dt class="font-medium text-gray-600">Description: <span class="font-normal text-gray-800">{{ $profile->experience }}</span></dt>
                <dt class="font-medium text-gray-600">Uploads and links: <a href="#" class="text-gig-purple hover:underline font-normal">uploads.docx</a></dt>
            </dl>
        </div>
        
        {{-- Section 4: Availability (THE MISSING SECTION) --}}
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100/70">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">4. Availability</h3>
            <dl class="text-sm space-y-2">
                <dt class="font-medium text-gray-600">Remote work: <span class="font-normal text-gray-800">{{ $profile->availability_remote ? 'Yes' : 'No' }}</span></dt>
                <dt class="font-medium text-gray-600">Physical jobs: <span class="font-normal text-gray-800">{{ $profile->availability_physical ? 'Yes' : 'No' }}</span></dt>
                <dt class="font-medium text-gray-600">Preferred work times: <span class="font-normal text-gray-800">{{ $profile->preferred_hours }}</span></dt>
            </dl>
        </div>
        
        {{-- Section 5: About You (Bio) (THE MISSING SECTION) --}}
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100/70">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">5. About You</h3>
            <p class="text-sm text-gray-700">
                Description: {{ $profile->bio ?? 'Not yet provided.' }}
            </p>
        </div>
        
        {{-- Section 6: CV Upload --}}
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100/70">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">6. CV Upload (optional)</h3>
            <dl class="text-sm">
                <dt class="font-medium text-gray-600">Uploads and links: 
                    <a href="{{ asset($profile->cv_path ?? '#') }}" class="text-gig-purple hover:underline font-normal">
                        {{ $profile->cv_path ? 'View Document' : 'No document uploaded' }}
                    </a>
                </dt>
            </dl>
        </div>

    </div>

@endsection