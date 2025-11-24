<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $gig->title }} - Gig Connector</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        'gig-purple': '#6B46C1', 
                        'gig-purple-light': '#EDE9FE',
                        'gig-bg': '#f7f7fa',
                    },
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f7f7fa; }
        .sidebar-active { background-color: #EDE9FE; color: #6B46C1; font-weight: 600; border-radius: 12px; }
    </style>
</head>
<body class="min-h-screen bg-gig-bg flex">

    <!-- Sidebar Navigation (Left) -->
    <aside class="w-20 md:w-64 flex-shrink-0 bg-white border-r border-gray-100 p-4 sticky top-0 h-screen transition-all duration-300">
        <div class="flex flex-col h-full">

            <!-- User Profile / Avatar -->
            <div class="hidden md:flex items-center space-x-3 pb-8 border-b border-gray-100 mb-6">
                <img src="https://placehold.co/40x40/6B46C1/ffffff?text=S" alt="User Avatar" class="rounded-full w-10 h-10 object-cover border-2 border-gig-purple">
                <div>
                    <span class="block text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</span>
                    <span class="block text-xs text-gray-500">Student</span>
                </div>
            </div>
            
            <div class="flex md:hidden items-center justify-center pb-8 border-b border-gray-100 mb-6">
                    <img src="https://placehold.co/40x40/6B46C1/ffffff?text=S" alt="User Avatar" class="rounded-full w-10 h-10 object-cover border-2 border-gig-purple">
            </div>

            <!-- Main Menu Links -->
            <nav class="space-y-2 flex-grow">
                
                <!-- Dashboard -->
                <a href="{{ route('student.dashboard') }}" class="flex items-center p-3 text-gray-600 hover:bg-gig-purple-light hover:text-gig-purple rounded-xl transition duration-150 group">
                    <svg class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-7v7m-4-6v6m4-5v5m4-4v4" />
                    </svg>
                    <span class="hidden md:block">Dashboard</span>
                </a>

                <!-- Recommendations -->
                <a href="#" class="flex items-center p-3 text-gray-600 hover:bg-gig-purple-light hover:text-gig-purple rounded-xl transition duration-150 group">
                    <svg class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span class="hidden md:block">Recommendations</span>
                </a>

                <!-- My Applications -->
                <a href="#" class="flex items-center p-3 text-gray-600 hover:bg-gig-purple-light hover:text-gig-purple rounded-xl transition duration-150 group">
                    <svg class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-3-3v6M17 16l4-4-4-4M7 8l-4 4 4 4" />
                    </svg>
                    <span class="hidden md:block">My Applications</span>
                </a>
                
                <!-- Saved Jobs -->
                <a href="#" class="flex items-center p-3 text-gray-600 hover:bg-gig-purple-light hover:text-gig-purple rounded-xl transition duration-150 group">
                    <svg class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                    </svg>
                    <span class="hidden md:block">Saved Jobs</span>
                </a>
                
                <!-- My Profile -->
                <a href="#" class="flex items-center p-3 text-gray-600 hover:bg-gig-purple-light hover:text-gig-purple rounded-xl transition duration-150 group">
                    <svg class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="hidden md:block">My Profile</span>
                </a>

                <!-- Settings -->
                <a href="#" class="flex items-center p-3 text-gray-600 hover:bg-gig-purple-light hover:text-gig-purple rounded-xl transition duration-150 group">
                    <svg class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="hidden md:block">Settings</span>
                </a>

                <!-- Notifications -->
                <a href="#" class="flex items-center p-3 text-gray-600 hover:bg-gig-purple-light hover:text-gig-purple rounded-xl transition duration-150 group">
                    <svg class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="hidden md:block">Notifications</span>
                    <span class="hidden md:block ml-auto bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">4</span>
                </a>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="flex items-center p-3 text-gray-600 hover:bg-red-50 hover:text-red-600 rounded-xl transition duration-150 group w-full">
                        <svg class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="hidden md:block">Logout</span>
                    </button>
                </form>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-grow p-6 md:p-10 min-w-0 overflow-y-auto h-screen">
        <!-- Back Button -->
        <a href="{{ route('student.dashboard') }}" class="inline-flex items-center text-gray-500 hover:text-gig-purple mb-6 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Back to Dashboard
        </a>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <!-- Header -->
            <div class="p-8 border-b border-gray-100">
                <div class="flex flex-col md:flex-row justify-between items-start gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $gig->title }}</h1>
                        <p class="text-sm text-gray-500 mb-3">{{ $gig->provider->organization_name ?? 'Provider' }}</p>
                        <div class="flex items-center text-gray-500 text-sm space-x-4">
                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg> {{ $gig->location }}</span>
                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> {{ $gig->duration }}</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="block text-2xl font-bold text-gig-purple">${{ number_format($gig->payment_amount, 0) }}</span>
                        <span class="text-sm text-gray-500">Fixed Price</span>
                    </div>
                </div>
            </div>

            <div class="p-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Info -->
                <div class="lg:col-span-2 space-y-8">
                    <section>
                        <h2 class="text-lg font-bold text-gray-900 mb-4">Description</h2>
                        <div class="prose text-gray-600 max-w-none whitespace-pre-line">
                            {{ $gig->description }}
                        </div>
                    </section>

                    <section>
                        <h2 class="text-lg font-bold text-gray-900 mb-4">Requirements</h2>
                        <div class="flex flex-wrap gap-2">
                            @if($gig->required_skills)
                                @foreach(explode(',', $gig->required_skills) as $skill)
                                    <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm font-medium">#{{ trim($skill) }}</span>
                                @endforeach
                            @endif
                        </div>
                    </section>
                </div>

                <!-- Sidebar Info -->
                <div class="space-y-6">
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4">Job Overview</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Duration</span>
                                <span class="font-medium text-gray-900">{{ $gig->duration }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Deadline</span>
                                <span class="font-medium text-gray-900">{{ $gig->application_deadline->format('M d, Y') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Status</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    {{ ucfirst($gig->status) }}
                                </span>
                            </div>
                        </div>
                        
                        <button class="w-full mt-6 bg-gig-purple hover:bg-purple-700 text-white font-bold py-3 px-4 rounded-xl transition shadow-lg shadow-purple-200">
                            Apply Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>