@extends('layouts.provider-layout')

@section('title', 'Provider Dashboard')

@section('main-content')
    
    {{-- Main Content Header --}}
    <header class="py-6">
        <h1 class="text-3xl font-bold text-gray-800">Hi, {{ Auth::user()->name }} 👋</h1> 
        <p class="text-gray-600 mt-2">Please use the search bar to look up your posts.</p>
    </header>

    {{-- Search Bar and Create Button (This block remains full width) --}}
    <div class="flex items-center justify-between mb-8">
        
        {{-- Search and Filter Combined Bar --}}
        <div class="relative flex-grow mr-4">
            <div class="flex items-center border border-gray-300 rounded-lg p-2 bg-gray-50/70">
                
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
        
        {{-- Create New Post Button --}}
        <button class="bg-gig-purple hover:bg-gig-purple-dark text-white rounded-lg py-3 px-6 font-semibold whitespace-nowrap">
            Create a New Post
        </button>
    </div>
    
    {{-- FILTERS AND TABLE CONTAINER (DYNAMNIC GRID LAYOUT) --}}
    <div class="grid gap-8" :class="{ 'grid-cols-12': $showFilters }">

        @if ($showFilters)
            {{-- 1. LEFT COLUMN: Filters (col-span-3) --}}
            <div class="col-span-12 lg:col-span-3">
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100/70">
                    
                    {{-- Status Filter --}}
                    <div class="mb-6 border-b border-gray-100 pb-4">
                        <h4 class="font-semibold text-gray-800 mb-3">Status</h4>
                        <div class="space-y-2">
                            <label class="flex items-center justify-between text-sm text-gray-700 cursor-pointer">
                                <span class="flex items-center"><input type="checkbox" checked class="form-checkbox text-gig-purple rounded-sm mr-2 focus:ring-gig-purple"> Open</span>
                                <span class="text-xs text-gray-500">38</span>
                            </label>
                            <label class="flex items-center justify-between text-sm text-gray-700 cursor-pointer">
                                <span class="flex items-center"><input type="checkbox" checked class="form-checkbox text-gig-purple rounded-sm mr-2 focus:ring-gig-purple"> Closed</span>
                                <span class="text-xs text-gray-500">50</span>
                            </label>
                        </div>
                    </div>

                    {{-- Application Count Range Filter --}}
                    <div class="mb-6 border-b border-gray-100 pb-4">
                        <h4 class="font-semibold text-gray-800 mb-3">Application Count Range</h4>
                        <div class="flex space-x-2">
                            <input type="number" placeholder="Min" class="w-1/2 border border-gray-300 rounded-lg px-2 py-1 text-sm">
                            <input type="number" placeholder="Max" class="w-1/2 border border-gray-300 rounded-lg px-2 py-1 text-sm">
                        </div>
                    </div>

                    {{-- Duration Filter --}}
                    <div class="mb-6 border-b border-gray-100 pb-4">
                        <h4 class="font-semibold text-gray-800 mb-3">Duration</h4>
                        <div class="flex space-x-2">
                            <input type="date" placeholder="Start" class="w-1/2 border border-gray-300 rounded-lg px-2 py-1 text-sm">
                            <input type="date" placeholder="End" class="w-1/2 border border-gray-300 rounded-lg px-2 py-1 text-sm">
                        </div>
                    </div>

                    {{-- Apply/Reset Buttons --}}
                    <div class="flex justify-between space-x-3">
                        <button class="bg-gig-purple text-white py-2 px-4 rounded-lg text-sm font-medium w-1/2 hover:bg-gig-purple-dark transition">Apply</button>
                        <button class="bg-gray-200 text-gray-700 py-2 px-4 rounded-lg text-sm font-medium w-1/2 hover:bg-gray-300 transition">Reset</button>
                    </div>

                </div>
            </div>
            
            {{-- 2. RIGHT COLUMN: Table (col-span-9) --}}
            <div class="col-span-12 lg:col-span-9">
                @include('layouts.partials.provider-table')
            </div>
            
        @else
            {{-- Layout 2: Table Only (Full Width) --}}
            <div class="col-span-12"> {{-- Use col-span-12 to make it full width when no filters are shown --}}
                @include('layouts.partials.provider-table')
            </div>
        @endif
        
    </div>

@endsection