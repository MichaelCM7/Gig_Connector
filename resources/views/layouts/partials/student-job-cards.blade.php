{{-- resources/views/layouts/partials/student-job-cards.blade.php --}}

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    {{-- INTEGRATION POINT: The Controller must pass a variable named $jobs (a collection) --}}
    @forelse ($jobs as $job)
        <div class="bg-white p-5 rounded-xl shadow-lg border border-gray-100/70 relative transition hover:shadow-xl">
            <div class="flex justify-between items-start mb-3">
                <div class="flex items-center space-x-3">
                    {{-- Company Logo Placeholder --}}
                    <div class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center text-sm font-bold text-purple-700">
                        {{-- INTEGRATION: Use actual initials/logo here --}}
                        {{ strtoupper(substr($job->company_name ?? 'PS', 0, 2)) }}
                    </div>
                    <div>
                        <h4 class="font-semibold text-lg text-gray-800 line-clamp-1">{{ $job->title ?? 'Senior Product Designer' }}</h4>
                        <p class="text-sm text-gray-500">@organisation</p>
                    </div>
                </div>
                {{-- Options Menu --}}
                <button class="text-gray-400 hover:text-gray-600">...</button>
            </div>

            {{-- Location and Details --}}
            <div class="flex items-center space-x-4 mb-3 text-sm">
                <span class="text-gray-700">{{ $job->location ?? 'Kabul, New, Afghanistan' }}</span>
                <span class="text-gray-500">|</span>
                <span class="bg-blue-100 text-blue-800 px-2 py-0.5 rounded-full text-xs font-medium">{{ $job->type ?? 'Full-Time' }}</span>
                <span class="text-green-600 font-bold">{{ $job->salary ?? '$105,620 PA' }}</span>
            </div>
            
            {{-- Description --}}
            <p class="text-xs text-gray-600 mb-4 line-clamp-3">
                {{ $job->description ?? 'It is a long established fact that a reader will be distracted by the readable content of a page...' }}
            </p>

            {{-- Tags and Footer --}}
            <div class="flex justify-between items-center border-t border-gray-100 pt-4">
                <div class="flex flex-wrap space-x-2 text-xs text-gig-purple">
                    <span>#Design</span>
                    <span>#Senior</span>
                    <span>#UX</span>
                </div>
                <span class="text-xs text-gray-400">{{ $job->posted_date ?? '28 March 2021' }}</span>
                {{-- Save and Apply Icons --}}
                <div class="flex space-x-3 text-gray-400">
                    <button class="hover:text-gig-purple"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg></button>
                    <button class="hover:text-gig-purple"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2m-2 2h-4m4 0h-1m2 0V9m0 0v2m0 0v2m0 0v2m0-8h1m-1 0h-4m4 0h-1m2 0V9m0 0v2m0 0v2m0 0v2m0-8h1m-1 0h-4m4 0h-1m2 0V9m0 0v2m0 0v2m0 0v2"></path></svg></button>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full bg-blue-50 p-6 rounded-lg text-center border border-blue-200">
            <h4 class="font-semibold text-gray-800">No Gig Listings Available Yet</h4>
            <p class="text-sm text-gray-600 mt-2">Try broadening your search criteria or check back later for new gig listings!</p>
        </div>
    @endforelse
</div>