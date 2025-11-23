@extends('layouts.student-layout')

@section('title', 'Dashboard')

@section('main-content')

@php
    // Get filter state directly from URL query parameters
    $showFilters = request()->query('show_filters') === 'true'; 
    $logoColor = 'text-gig-purple';

    // --- Placeholder Data for Frontend Design (CRITICAL FOR RENDERING CARDS) ---
    $jobs = collect([ 
        (object)['id' => 1, 'title' => 'Senior Product Designer - Growth', 'company_name' => 'Ps', 'location' => 'Kabul, New, Afghanistan', 'type' => 'Full-Time', 'salary' => '$105,620 PA', 'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout...', 'posted_date' => '28 March 2021'],
        (object)['id' => 2, 'title' => 'Experienced Market Research Analyst', 'company_name' => 'Xd', 'location' => 'Addis Ababa, Ethiopia', 'type' => 'Full-Time', 'salary' => '$100,000 PA', 'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout...', 'posted_date' => '28 March 2021'],
        (object)['id' => 3, 'title' => 'Pega Decisioning/Marketing Developer', 'company_name' => 'Ai', 'location' => 'Maputo, Mozambique', 'type' => 'Full-Time', 'salary' => '$52,000 PA', 'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout...', 'posted_date' => '28 March 2021'],
        (object)['id' => 4, 'title' => 'Relationship Manager', 'company_name' => 'Ae', 'location' => 'Kabul, New, Afghanistan', 'type' => 'Mid-Senior', 'salary' => '$105,620 PA', 'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout...', 'posted_date' => '28 March 2021'],
        (object)['id' => 5, 'title' => 'Opening for Relationship Associate - Bancassurance', 'company_name' => 'Xi', 'location' => 'Addis Ababa, Virtual', 'type' => 'Part-Time', 'salary' => '$10,000 PA', 'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout...', 'posted_date' => '28 March 2021'],
        (object)['id' => 6, 'title' => 'Job Opportunity for Sales Professionals', 'company_name' => '3M', 'location' => 'Maputo, Mozambique', 'type' => 'Full-Time', 'salary' => '$62,000 PA', 'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout...', 'posted_date' => '28 March 2021'],
        (object)['id' => 7, 'title' => 'Freelance Web Designer', 'company_name' => 'Wd', 'location' => 'Remote / Online', 'type' => 'Freelance', 'salary' => '$35 / Hour', 'description' => 'Seeking a skilled web designer for short-term client projects. Must be proficient in Tailwind CSS and modern JavaScript frameworks.', 'posted_date' => '15 Nov 2025'],
        (object)['id' => 8, 'title' => 'Junior Accountant', 'company_name' => 'Crm', 'location' => 'Nairobi, Kenya', 'type' => 'Internship', 'salary' => '$1,200 Monthly', 'description' => 'Entry-level position supporting the finance department with data entry and reconciliations.', 'posted_date' => '01 Nov 2025'],
    ]);
@endphp

    {{-- Main Content Header --}}
    <header class="py-6">
        <h1 class="text-3xl font-bold text-gray-800">Hi, Angela 👋</h1>
        <p class="text-gray-600 mt-2">Please use the search bar to look up suitable gigs and jobs that might interest you. Once you find a gig, contact the business for shortlisting and further details. All the best in your search!</p>
    </header>

    {{-- Search Bar (Remains full width above the filters/job grid area) --}}
    <div class="flex items-center justify-between mb-8">
        
        {{-- Search and Filter Combined Bar --}}
        <div class="relative flex-grow mr-4">
            <div class="flex items-center border border-gray-300 rounded-xl p-2 bg-gray-50/70">
                
                {{-- Filter Icon (Link that toggles the state: /dashboard?show_filters=true/false) --}}
                <a href="?show_filters={{ $showFilters ? 'false' : 'true' }}" class="text-gray-500 hover:text-gig-purple p-1 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h16a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6z"></path></svg>
                </a>

                {{-- Search Input --}}
                <input type="text" placeholder="Design" class="w-full pl-2 pr-4 py-1.5 border-none rounded-lg focus:ring-0 text-lg bg-transparent">
                
                {{-- Search Icon --}}
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
        </div>
        
        {{-- Sort By (Remains outside the search bar, next to Job Count) --}}
        <div class="flex items-center space-x-2">
            <span class="text-gray-600 text-sm whitespace-nowrap">Sort by:</span>
            <select class="border border-gray-300 rounded-lg py-1.5 px-3 text-sm focus:ring-gig-purple focus:border-gig-purple">
                <option>Newest Post</option>
                <option>Salary (High to Low)</option>
            </select>
        </div>
    </div>

    {{-- Job Count --}}
    <h3 class="text-xl font-semibold text-gray-700 mb-6">80 Jobs Found</h3>

    {{-- JOB GRID CONTAINER: Dynamic Grid Layout --}}
    {{-- Grid columns change dynamically based on $showFilters --}}
    <div class="grid gap-6" :class="{ 'grid-cols-12': $showFilters }">

        @if ($showFilters)
            {{-- LAYOUT 1: Filters Panel + Job Cards (Active) --}}
            
            {{-- 1. LEFT COLUMN: Filters Panel (col-span-3) --}}
            <div class="col-span-12 lg:col-span-3">
                @include('layouts.partials.student-filters') 
            </div>
            
            {{-- 2. RIGHT COLUMN: Job Cards (col-span-9) --}}
            <div class="col-span-12 lg:col-span-9">
                @include('layouts.partials.student-job-cards')
            </div>
            
        @else
            {{-- LAYOUT 2: Job Cards Only (Full Width) --}}
            <div class="col-span-12"> 
                @include('layouts.partials.student-job-cards')
            </div>
        @endif
        
    </div>
    
@endsection