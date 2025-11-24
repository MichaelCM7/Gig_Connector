<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - Gig Connector</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>body{font-family:Inter, sans-serif;background:#f7f7fa}</style>
</head>
<body class="min-h-screen bg-gig-bg">
    <div class="min-h-screen flex">
        <!-- Sidebar (self-contained) -->
        <aside class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-[#FBFBFB] border-r border-gray-100 flex flex-col justify-between overflow-y-auto">
            
    <div class="px-6 py-6">
        <div class="flex items-center gap-3 mb-10">
            <div class="relative">
                <img class="w-10 h-10 rounded-full object-cover" src="https://ui-avatars.com/api/?name=Scholar+Hub&background=random" alt="User avatar">
                <div class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 rounded-full border-2 border-white"></div>
            </div>
            <div class="flex flex-col">
                <span class="text-[10px] uppercase text-gray-400 font-bold tracking-wider">Student</span>
                <span class="text-sm font-bold text-gray-800">Scholar's Hub</span>
            </div>
            <button class="ml-auto text-gray-400 hover:text-gray-600">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>
        </div>

        <div class="mb-2">
            <p class="px-2 text-[10px] font-semibold text-gray-400 uppercase tracking-wider mb-4">Main</p>
            
            <ul class="space-y-2">
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg bg-purple-100 group">
                        <svg class="w-5 h-5 text-purple-700 transition duration-75" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        <span class="ml-3 font-medium text-sm text-purple-900">Dashboard</span>
                        <svg class="w-4 h-4 ml-auto text-purple-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                    </a>

                    <div class="relative ml-4 pl-4 mt-2 border-l border-gray-300 space-y-2">
                        <a href="#" class="flex items-center pl-2 text-sm font-medium text-gray-500 hover:text-gray-900 relative group">
                            <span class="absolute -left-4 top-1/2 w-3 h-[1px] bg-gray-300"></span>
                            Filters
                        </a>
                        <a href="#" class="flex items-center pl-2 py-1 pr-4 text-sm font-bold text-gray-800 bg-[#EAE0E6] rounded-md relative">
                            <span class="absolute -left-4 top-1/2 w-3 h-[1px] bg-gray-300"></span>
                            Posts
                        </a>
                    </div>
                </li>

                <li>
                    <a href="#" class="flex items-center p-2 text-gray-500 rounded-lg hover:bg-gray-100 group transition-colors">
                        <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span class="ml-3 font-medium text-sm">Applicants</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="flex items-center p-2 text-gray-500 rounded-lg hover:bg-gray-100 group transition-colors">
                        <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                        </svg>
                        <span class="ml-3 font-medium text-sm">Saved Job Drafts</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="flex items-center p-2 text-gray-500 rounded-lg hover:bg-gray-100 group transition-colors">
                        <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="ml-3 font-medium text-sm">My Profile</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="flex items-center p-2 text-gray-500 rounded-lg hover:bg-gray-100 group transition-colors">
                        <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="ml-3 font-medium text-sm">Settings</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="mt-6">
            <div class="flex items-center justify-between px-2 mb-4">
                <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Messages</p>
                <button class="text-gray-400 hover:text-gray-600 text-lg font-light">+</button>
            </div>
            <ul class="space-y-2">
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-500 rounded-lg hover:bg-gray-100 group transition-colors">
                        <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span class="ml-3 font-medium text-sm">Notifications</span>
                        <span class="inline-flex items-center justify-center w-2 h-2 p-2 ml-3 text-xs font-medium text-white bg-red-500 rounded-full"> </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="px-6 py-6 border-t border-gray-50 bg-[#FBFBFB]">
        <a href="#" class="flex items-center p-2 text-gray-500 rounded-lg hover:bg-gray-100 group transition-colors mb-6">
            <svg class="w-5 h-5 text-gray-400 transition duration-75 group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <span class="ml-3 font-medium text-sm">Log out</span>
        </a>

        <div class="mt-4">
            <h1 class="text-lg font-bold text-purple-900 leading-none">Gig Connector</h1>
            <p class="text-[10px] text-gray-500">Connect. Apply. Grow</p>
        </div>
    </div>
</aside>

        <!-- Main content area -->
        <main class="flex-1 p-6 lg:p-10">
            <div class="p-8 bg-white min-h-screen sm:ml-64 font-sans">

    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            Hi, {{ auth()->user()?->name ?? 'Scholar\'s Hub' }} <span class="text-2xl">👋</span>
        </h1>
        <p class="text-gray-500 text-sm mt-1">Please use the search bar to look up your posts.</p>
    </div>

    <div class="flex items-center gap-4 mb-8 max-w-3xl">
        
        <button class="flex-shrink-0 w-10 h-10 bg-white border border-gray-300 rounded-lg flex items-center justify-center text-gray-500 hover:bg-gray-50 hover:border-gray-400 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
            </svg>
        </button>

        <div class="relative flex-grow">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                </svg>
            </div>
            
            <input type="text" 
                   class="w-full bg-[#F3F0F5] text-gray-700 text-sm rounded-full py-3 pl-12 pr-10 focus:outline-none focus:ring-2 focus:ring-purple-200 border-none placeholder-gray-500" 
                   placeholder="Design" 
                   value="Design">
            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="border border-blue-300 rounded-lg p-1 relative"> <div class="flex justify-between items-center mb-6 pt-2 px-2">
            <button class="bg-[#6B46C1] hover:bg-[#553C9A] text-white font-medium py-2 px-6 rounded-lg shadow-sm transition text-sm">
                Create a New Post
            </button>
            
            <div class="flex items-center text-sm font-bold text-gray-700">
                Sort by: Newest Post
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="pb-3 pl-2 text-sm font-bold text-gray-600">Posted Jobs</th>
                        <th class="pb-3 text-sm font-bold text-gray-600">Status</th>
                        <th class="pb-3 text-sm font-bold text-gray-600">Application Counts</th>
                        <th class="pb-3 text-sm font-bold text-gray-600">Duration</th>
                        <th class="pb-3 text-sm font-bold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    @forelse ($jobs ?? [] as $job)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="py-4 pl-2 font-medium">{{ $job->title ?? 'Untitled' }}</td>
                        <td class="py-4 text-gray-600">{{ $job->status ?? 'Open' }}</td>
                        <td class="py-4">{{ $job->application_count ?? 0 }}</td>
                        <td class="py-4 text-gray-500">
                            @php
                                $start = $job->start_date ?? null;
                                $end = $job->end_date ?? null;
                            @endphp
                            {{ (is_object($start) && method_exists($start, 'format')) ? $start->format('d/m/Y') : ($start ?? '-') }} - {{ (is_object($end) && method_exists($end, 'format')) ? $end->format('d/m/Y') : ($end ?? '-') }}
                        </td>
                        <td class="py-4">
                            <a href="{{ Route::has('posts.applicants') ? route('posts.applicants', $job->id) : '#' }}" class="text-purple-700 font-semibold">Applicants</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="p-6 text-center text-gray-500" colspan="5">No posts found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

            </div>
        </main>
    </div>
</body>
</html>
