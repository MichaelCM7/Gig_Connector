@extends('layouts.student-layout')

@section('title', 'Application Tracking')

@section('main-content')
    
    <header class="py-6 border-b border-gray-200 mb-6">
        <h1 class="text-3xl font-bold text-gig-purple">Application Tracking Page</h1>
        <p class="text-gray-600 mt-2">You can track all the applications made so far here. All the best in your search!</p>
    </header>

    {{-- Search and Filters --}}
    <div class="flex items-center justify-between mb-6">
        
        {{-- Search Bar --}}
        <div class="relative flex-grow mr-4">
            <input type="text" placeholder="Design" class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-gig-purple focus:border-gig-purple text-lg bg-gray-50/70">
            <svg class="w-5 h-5 absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        
        {{-- Category Dropdown --}}
        <select class="border border-gray-300 rounded-lg py-3 px-4 text-sm focus:ring-gig-purple focus:border-gig-purple">
            <option>All Categories</option>
            <option>Design</option>
            <option>Tutoring</option>
        </select>
    </div>

    {{-- Applications Table --}}
    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100/70">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Job Title</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Provider</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Applied</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                
                {{-- Placeholder Loop for Applications --}}
                @for ($i = 0; $i < 7; $i++)
                    @php $status = ($i % 3 == 0 || $i % 3 == 2) ? 'Shortlisted' : 'Pending'; @endphp
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Social Media Assistant</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Scholar Hub</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $status == 'Shortlisted' ? 'bg-orange-100 text-orange-600' : 'bg-gray-100 text-gray-600' }}">
                                {{ $status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Oct 22</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('gigs.show', 1) }}" class="text-gig-purple hover:text-purple-900">View Details</a>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>

@endsection