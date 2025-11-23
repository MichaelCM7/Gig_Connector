@extends('layouts.student-layout')

@section('title', 'Job Details')

{{-- Assume $gig variable is passed from controller, else use safe defaults --}}
@section('main-content')
    
    {{-- Job Title and Actions --}}
    <div class="py-6 border-b border-gray-200 mb-6">
        <h1 class="text-3xl font-bold text-gig-purple mb-3">Job Details</h1>
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Opening For Relationship Associate - Bancassurance</h2>
        
        <div class="flex space-x-3">
            <button class="bg-gig-purple hover:bg-gig-purple-dark text-white rounded-lg py-2 px-6 font-semibold transition">
                Apply
            </button>
            <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg py-2 px-6 font-semibold transition">
                Save for Later
            </button>
        </div>
    </div>

    {{-- Main Details Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
        
        {{-- LEFT COLUMN: General Details --}}
        <div>
            <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">General Details</h3>
            <dl class="text-sm space-y-3">
                <dt class="font-medium text-gray-600">Job Title: <span class="text-gig-purple font-normal">Relationship Associate - Bancassurance</span></dt>
                <dt class="font-medium text-gray-600">Provider Name: <span class="text-gray-800 font-normal">Company X</span></dt>
                <dt class="font-medium text-gray-600">Pay Rate: <span class="text-gray-800 font-normal">500ksh per hour</span></dt>
                <dt class="font-medium text-gray-600">Duration: <span class="text-gray-800 font-normal">2 months</span></dt>
                <dt class="font-medium text-gray-600">Working Hours: <span class="text-gray-800 font-normal">2 months</span></dt>
                <dt class="font-medium text-gray-600">Type: <span class="text-gray-800 font-normal">Remote</span></dt>
                <dt class="font-medium text-gray-600">Location: <span class="text-gray-800 font-normal">To be Communicated</span></dt>
            </dl>
        </div>

        {{-- RIGHT COLUMN: Required Skills --}}
        <div>
            <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">Required Skills</h3>
            <ul class="list-disc list-inside text-sm space-y-1 text-gray-700 pl-4">
                <li>Communication</li>
                <li>Computer Literacy</li>
                <li>R programming language</li>
                <li>Microsoft Office Suite</li>
            </ul>
        </div>
    </div>
    
    {{-- Job Description --}}
    <div class="mt-8">
        <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">Job Description</h3>
        <p class="text-sm text-gray-700 leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent faucibus, arcu sed dictum pharetra, enim lorem egestas risus, sit amet luctus dui lorem vitae justo. Vestibulum porttitor, tellus lobortis aliquam gravida, leo sapien dictum quam, quis pellentesque elit libero eu justo. Sed dictum, tortor a malesuada placerat, nibh velit auctor nisl, vel imperdiet ipsum neque et neque...
        </p>
    </div>
    
    {{-- Contact Details --}}
    <div class="mt-8 pt-4 border-t border-gray-200">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Contact Details</h3>
        <p class="text-sm text-gray-700">
            <span class="text-gig-purple mr-4">companyx@gmail.com</span>
            <span class="text-gig-purple">+254111111111</span>
        </p>
    </div>

@endsection