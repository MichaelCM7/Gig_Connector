<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gig Connector</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Configure Tailwind for Inter font and custom colors -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        // Matching the theme color: #6B46C1
                        'gig-purple': '#6B46C1', 
                        'gig-purple-light': '#EDE9FE', // Equivalent to Violet-100 or Purple-100
                        'gig-bg': '#f7f7fa',
                    },
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f7fa;
        }
        /* Custom scrollbar for the job list */
        .job-list {
            scrollbar-width: thin;
            scrollbar-color: #6B46C1 #f7f7fa;
        }
        .job-list::-webkit-scrollbar {
            width: 8px;
        }
        .job-list::-webkit-scrollbar-thumb {
            background-color: #6B46C1;
            border-radius: 4px;
        }
        .job-list::-webkit-scrollbar-track {
            background-color: #f7f7fa;
        }

        /* Active sidebar link style */
        .sidebar-active {
            background-color: #EDE9FE; /* gig-purple-light */
            color: #6B46C1; /* gig-purple */
            font-weight: 600;
            border-radius: 12px;
        }

        /* Job Card Icon Styling */
        .icon-container {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }

        /* Specific class for the filter sidebar transition */
        .filter-open {
            width: 320px !important;
            min-width: 320px !important;
            padding: 24px 16px; /* p-6 md:p-4 equivalent */
        }
        .filter-closed {
             width: 0px !important;
             min-width: 0px !important;
             padding: 0;
        }

        /* Ensure the main content uses the full viewport height */
        #content-wrapper {
            display: flex;
            flex-grow: 1;
            min-height: 100vh;
        }
    </style>
</head>
<body class="min-h-screen bg-gig-bg flex">

    <!-- 1. Sidebar Navigation (Left) -->
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
                <!-- <p class="hidden md:block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">MAIN</p> -->
                
                <!-- Dashboard (Active) -->
                <a href="#" class="sidebar-active flex items-center p-3 transition duration-150 group">
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
                
                <!-- <p class="hidden md:block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 pt-6">MESSAGES</p> -->

                <!-- Notifications -->
                <a href="#" class="flex items-center p-3 text-gray-600 hover:bg-gig-purple-light hover:text-gig-purple rounded-xl transition duration-150 group">
                    <svg class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="hidden md:block">Notifications</span>
                    <span class="hidden md:block ml-auto bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">4</span>
                </a>

                <!-- Logout -->
                <!-- Logout -->
                <a href="#" class="flex items-center p-3 text-gray-600 hover:bg-gig-purple-light hover:text-gig-purple rounded-xl transition duration-150 group">
                    <!-- SVG for Logout Icon (path for a door with an exit arrow) -->
                    <svg class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            stroke-width="2" 
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H7a3 3 0 01-3-3V7a3 3 0 013-3h3a3 3 0 013 3v1" 
                        />
                    </svg>
                    <span class="hidden md:block">Logout</span>
                </a>
              </nav>
            </div>
          </div>
        </div>
    </aside>

    <!-- Content Wrapper: Handles Main Content and Filter Sidebar -->
    <div id="content-wrapper">
        
        <!-- 2. Main Content Area -->
        <main id="main-content" class="flex-grow p-6 md:p-10 job-list min-w-0">
            <!-- Top Header -->
            <header class="mb-8">
                <h1 class="text-4xl font-extrabold text-gray-900 mb-1">Hi, {{ Auth::user()->name }}</h1>
                <p class="text-gray-500">All the best in your search!</p>
            </header>

            <!-- Search Bar and Filters -->
            <div class="bg-white p-4 rounded-xl shadow-lg mb-8 border border-gray-100/50">
                <div class="flex items-center space-x-3">
                    
                    <!-- Filter Button (Toggle function added) -->
                    <button id="filter-toggle-button" onclick="toggleFilterSidebar()" class="text-gray-500 hover:text-gig-purple p-2 transition duration-150 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gig-purple">
                        <!-- Filter Icon -->
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-4.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                    </button>

                    <!-- Search Input -->
                    <input type="text" value="Design" class="flex-grow p-2 text-lg font-medium text-gray-700 focus:outline-none" placeholder="Use the search bar to look up suitable gigs and jobs that might interest you.">

                    <!-- Search Button/Icon -->
                    <button class="text-gray-500 hover:text-gig-purple p-2 transition duration-150">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Results Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                <h2 class="text-xl font-bold text-gray-800 mb-2 sm:mb-0">80 Jobs Found</h2>
                <div class="flex items-center space-x-2 text-sm text-gray-600">
                    <label for="sort-by">Sort by:</label>
                    <select id="sort-by" class="p-2 border border-gray-300 rounded-lg focus:ring-gig-purple focus:border-gig-purple">
                        <option>Newest Post</option>
                        <option>Salary (High to Low)</option>
                        <option>Salary (Low to High)</option>
                    </select>
                </div>
            </div>

            <!-- Job Card Grid -->
            <div id="job-card-grid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                <!-- Job Card 1 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition duration-200 cursor-pointer">
                    <div class="flex justify-between items-start mb-4">
                        <div class="icon-container bg-blue-100 text-blue-800">
                            <span class="text-xl font-bold">Ps</span>
                        </div>
                        <button class="text-gray-400 hover:text-gig-purple">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" /></svg>
                        </button>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 leading-tight">Senior Product Designer - Growth</h3>
                    <p class="text-sm text-gray-500 mb-3">Afghanistan</p>
                    
                    <div class="flex space-x-4 text-xs text-gray-600 mb-4">
                        <span>Kabul, New</span>
                        <span>Full-Time</span>
                        <span class="font-semibold text-gray-800">$105,20 PA</span>
                    </div>
                    
                    <p class="text-xs text-gray-500 mb-4 h-10 overflow-hidden">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                    </p>

                    <!-- Tags -->
                    <div class="flex flex-wrap gap-2 text-[10px] font-medium mb-4">
                        <span class="px-2 py-0.5 bg-indigo-100 text-indigo-700 rounded-full">#Design</span>
                        <span class="px-2 py-0.5 bg-indigo-100 text-indigo-700 rounded-full">#Senior</span>
                        <span class="px-2 py-0.5 bg-indigo-100 text-indigo-700 rounded-full">#User Experience</span>
                    </div>
                    
                    <div class="text-xs text-gray-400 text-right">28 March 2021</div>
                </div>

                <!-- Job Card 2 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition duration-200 cursor-pointer">
                    <div class="flex justify-between items-start mb-4">
                        <div class="icon-container bg-purple-100 text-purple-800">
                            <span class="text-xl font-bold">Xd</span>
                        </div>
                        <button class="text-gray-400 hover:text-gig-purple">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" /></svg>
                        </button>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 leading-tight">Experienced Market Research Analyst</h3>
                    <p class="text-sm text-gray-500 mb-3">Ethiopia</p>
                    
                    <div class="flex space-x-4 text-xs text-gray-600 mb-4">
                        <span>Addis Ababa</span>
                        <span>Full-Time</span>
                        <span class="font-semibold text-gray-800">$100,00 PA</span>
                    </div>
                    
                    <p class="text-xs text-gray-500 mb-4 h-10 overflow-hidden">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                    </p>

                    <!-- Tags -->
                    <div class="flex flex-wrap gap-2 text-[10px] font-medium mb-4">
                        <span class="px-2 py-0.5 bg-pink-100 text-pink-700 rounded-full">#Design</span>
                        <span class="px-2 py-0.5 bg-pink-100 text-pink-700 rounded-full">#Market</span>
                        <span class="px-2 py-0.5 bg-pink-100 text-pink-700 rounded-full">#Research</span>
                    </div>
                    
                    <div class="text-xs text-gray-400 text-right">28 March 2021</div>
                </div>

                <!-- Job Card 3 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition duration-200 cursor-pointer">
                    <div class="flex justify-between items-start mb-4">
                        <div class="icon-container bg-red-100 text-red-800">
                            <span class="text-xl font-bold">Ai</span>
                        </div>
                        <button class="text-gray-400 hover:text-gig-purple">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" /></svg>
                        </button>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 leading-tight">Pega Decisioning/Marketing Developer</h3>
                    <p class="text-sm text-gray-500 mb-3">Mozambique</p>
                    
                    <div class="flex space-x-4 text-xs text-gray-600 mb-4">
                        <span>Maputo</span>
                        <span>Full-Time</span>
                        <span class="font-semibold text-gray-800">$5,200 PA</span>
                    </div>
                    
                    <p class="text-xs text-gray-500 mb-4 h-10 overflow-hidden">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                    </p>

                    <!-- Tags -->
                    <div class="flex flex-wrap gap-2 text-[10px] font-medium mb-4">
                        <span class="px-2 py-0.5 bg-red-100 text-red-700 rounded-full">#Design</span>
                        <span class="px-2 py-0.5 bg-red-100 text-red-700 rounded-full">#Senior</span>
                        <span class="px-2 py-0.5 bg-red-100 text-red-700 rounded-full">#User Experience</span>
                    </div>
                    
                    <div class="text-xs text-gray-400 text-right">28 March 2021</div>
                </div>

                <!-- Job Card 4 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition duration-200 cursor-pointer">
                    <div class="flex justify-between items-start mb-4">
                        <div class="icon-container bg-green-100 text-green-800">
                            <span class="text-xl font-bold">Ae</span>
                        </div>
                        <button class="text-gray-400 hover:text-gig-purple">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" /></svg>
                        </button>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 leading-tight">Relationship Manager</h3>
                    <p class="text-sm text-gray-500 mb-3">Afghanistan</p>
                    
                    <div class="flex space-x-4 text-xs text-gray-600 mb-4">
                        <span>Kabul, Senior</span>
                        <span>Full-Time</span>
                        <span class="font-semibold text-gray-800">$105,20 PA</span>
                    </div>
                    
                    <p class="text-xs text-gray-500 mb-4 h-10 overflow-hidden">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                    </p>

                    <!-- Tags -->
                    <div class="flex flex-wrap gap-2 text-[10px] font-medium mb-4">
                        <span class="px-2 py-0.5 bg-indigo-100 text-indigo-700 rounded-full">#Design</span>
                        <span class="px-2 py-0.5 bg-indigo-100 text-indigo-700 rounded-full">#Senior</span>
                        <span class="px-2 py-0.5 bg-indigo-100 text-indigo-700 rounded-full">#User Experience</span>
                    </div>
                    
                    <div class="text-xs text-gray-400 text-right">28 March 2021</div>
                </div>

                <!-- Job Card 5 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition duration-200 cursor-pointer">
                    <div class="flex justify-between items-start mb-4">
                        <div class="icon-container bg-orange-100 text-orange-800">
                            <!-- Placeholder for Logo/Icon -->
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.764 23.764 0 0112 15c-1.396 0-2.759-.28-4-.79V10a2 2 0 00-2-2h4a2 2 0 012 2v2M21 13.255V17a2 2 0 01-2 2H5a2 2 0 01-2-2v-3.745M21 13.255L12 10l-9 3.255" />
                            </svg>
                        </div>
                        <button class="text-gray-400 hover:text-gig-purple">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" /></svg>
                        </button>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 leading-tight">Opening For Relationship Associate - Bancassurance</h3>
                    <p class="text-sm text-gray-500 mb-3">Ethiopia - Virtual</p>
                    
                    <div class="flex space-x-4 text-xs text-gray-600 mb-4">
                        <span>Addis Ababa</span>
                        <span>Full-Time</span>
                        <span class="font-semibold text-gray-800">$100,00 PA</span>
                    </div>
                    
                    <p class="text-xs text-gray-500 mb-4 h-10 overflow-hidden">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                    </p>

                    <!-- Tags -->
                    <div class="flex flex-wrap gap-2 text-[10px] font-medium mb-4">
                        <span class="px-2 py-0.5 bg-yellow-100 text-yellow-700 rounded-full">#Design</span>
                        <span class="px-2 py-0.5 bg-yellow-100 text-yellow-700 rounded-full">#Senior</span>
                        <span class="px-2 py-0.5 bg-yellow-100 text-yellow-700 rounded-full">#User Experience</span>
                    </div>
                    
                    <div class="text-xs text-gray-400 text-right">28 March 2021</div>
                </div>

                <!-- Job Card 6 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition duration-200 cursor-pointer">
                    <div class="flex justify-between items-start mb-4">
                        <div class="icon-container bg-teal-100 text-teal-800">
                            <span class="text-xl font-bold">3MAX</span>
                        </div>
                        <button class="text-gray-400 hover:text-gig-purple">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" /></svg>
                        </button>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 leading-tight">Job Opportunity For Sales Professionals...</h3>
                    <p class="text-sm text-gray-500 mb-3">Mozambique</p>
                    
                    <div class="flex space-x-4 text-xs text-gray-600 mb-4">
                        <span>Maputo</span>
                        <span>Full-Time</span>
                        <span class="font-semibold text-gray-800">$5,200 PA</span>
                    </div>
                    
                    <p class="text-xs text-gray-500 mb-4 h-10 overflow-hidden">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                    </p>

                    <!-- Tags -->
                    <div class="flex flex-wrap gap-2 text-[10px] font-medium mb-4">
                        <span class="px-2 py-0.5 bg-teal-100 text-teal-700 rounded-full">#Design</span>
                        <span class="px-2 py-0.5 bg-teal-100 text-teal-700 rounded-full">#Senior</span>
                        <span class="px-2 py-0.5 bg-teal-100 text-teal-700 rounded-full">#User Experience</span>
                    </div>
                    
                    <div class="text-xs text-gray-400 text-right">28 March 2021</div>
                </div>
            </div>

        </main>

        <!-- 3. Filter Sidebar (Right) -->
        <aside id="filter-sidebar" class="filter-closed bg-white border-l border-gray-100 flex-shrink-0 transition-all duration-300 overflow-y-auto sticky top-0 h-screen max-h-screen">
            <div class="flex flex-col space-y-8 h-full">
                <h2 class="text-xl font-bold text-gray-900 border-b pb-4">Job Filters</h2>

                <!-- Filter Section 1: Job Type -->
                <div>
                    <h3 class="font-semibold text-gray-800 mb-3">Job Type</h3>
                    <div class="space-y-2">
                        <label class="flex items-center text-sm text-gray-700">
                            <input type="checkbox" checked class="form-checkbox h-4 w-4 text-gig-purple rounded border-gray-300 focus:ring-gig-purple">
                            <span class="ml-2">Full-Time (45)</span>
                        </label>
                        <label class="flex items-center text-sm text-gray-700">
                            <input type="checkbox" class="form-checkbox h-4 w-4 text-gig-purple rounded border-gray-300 focus:ring-gig-purple">
                            <span class="ml-2">Part-Time (12)</span>
                        </label>
                        <label class="flex items-center text-sm text-gray-700">
                            <input type="checkbox" class="form-checkbox h-4 w-4 text-gig-purple rounded border-gray-300 focus:ring-gig-purple">
                            <span class="ml-2">Contract (18)</span>
                        </label>
                        <label class="flex items-center text-sm text-gray-700">
                            <input type="checkbox" class="form-checkbox h-4 w-4 text-gig-purple rounded border-gray-300 focus:ring-gig-purple">
                            <span class="ml-2">Internship (5)</span>
                        </label>
                    </div>
                </div>

                <!-- Filter Section 2: Salary Range (Slider/Input Placeholder) -->
                <div>
                    <h3 class="font-semibold text-gray-800 mb-3">Salary Range (PA)</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between text-sm text-gray-500">
                            <span>$10k</span>
                            <span>$200k+</span>
                        </div>
                        <!-- Simple Range Slider Placeholder -->
                        <input type="range" min="10" max="200" value="50" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer range-lg focus:outline-none focus:ring-2 focus:ring-gig-purple">
                        <div class="text-center text-sm font-medium">
                            Current: $50,000 - $150,000
                        </div>
                    </div>
                </div>

                <!-- Filter Section 3: Experience Level -->
                <div>
                    <h3 class="font-semibold text-gray-800 mb-3">Experience Level</h3>
                    <div class="space-y-2">
                        <label class="flex items-center text-sm text-gray-700">
                            <input type="radio" name="experience" value="entry" checked class="form-radio h-4 w-4 text-gig-purple border-gray-300 focus:ring-gig-purple">
                            <span class="ml-2">Entry Level</span>
                        </label>
                        <label class="flex items-center text-sm text-gray-700">
                            <input type="radio" name="experience" value="mid" class="form-radio h-4 w-4 text-gig-purple border-gray-300 focus:ring-gig-purple">
                            <span class="ml-2">Mid Level</span>
                        </label>
                        <label class="flex items-center text-sm text-gray-700">
                            <input type="radio" name="experience" value="senior" class="form-radio h-4 w-4 text-gig-purple border-gray-300 focus:ring-gig-purple">
                            <span class="ml-2">Senior Level</span>
                        </label>
                    </div>
                </div>

                <!-- Filter Buttons -->
                <div class="pt-4 border-t border-gray-100 space-y-3">
                    <button class="w-full py-2 bg-gig-purple text-white font-semibold rounded-xl hover:bg-gig-purple/90 transition duration-150 shadow-md">
                        Apply Filters
                    </button>
                    <button class="w-full py-2 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition duration-150">
                        Clear Filters
                    </button>
                </div>
            </div>
        </aside>

    </div>

    <script>
        // Placeholder for PHP user name, used for display purposes
        // Note: In a real environment, this data would be fetched dynamically.
        const USER_NAME = "{{ Auth::user()->name }}";
        const USER_ROLE = 'Student';

        // Function to toggle the filter sidebar visibility
        function toggleFilterSidebar() {
            const sidebar = document.getElementById('filter-sidebar');
            const button = document.getElementById('filter-toggle-button');

            // Check if the sidebar is currently "closed" (using the custom class for smooth transition)
            const isClosed = sidebar.classList.contains('filter-closed');

            if (isClosed) {
                // Open the sidebar
                sidebar.classList.remove('filter-closed');
                sidebar.classList.add('filter-open');
                button.classList.add('text-gig-purple');
                button.classList.remove('text-gray-500');
            } else {
                // Close the sidebar
                sidebar.classList.remove('filter-open');
                sidebar.classList.add('filter-closed');
                button.classList.remove('text-gig-purple');
                button.classList.add('text-gray-500');
            }
        }

        // Adjust the grid columns when the filter sidebar is active
        // This function dynamically adjusts the grid based on available space
        function updateGridColumns() {
            const grid = document.getElementById('job-card-grid');
            const sidebar = document.getElementById('filter-sidebar');
            const isFilterOpen = sidebar.classList.contains('filter-open');
            
            // Remove all existing responsive grid classes
            grid.classList.remove('xl:grid-cols-3', 'xl:grid-cols-2');

            // On large screens, adjust based on filter state
            if (window.innerWidth >= 1280) { // xl breakpoint
                if (isFilterOpen) {
                    // If filter is open, shrink to 2 columns on large screens
                    grid.classList.add('xl:grid-cols-2');
                } else {
                    // If filter is closed, use 3 columns on large screens
                    grid.classList.add('xl:grid-cols-3');
                }
            } else if (window.innerWidth >= 768) { // md breakpoint (always 2 columns or less on tablet/mobile)
                 grid.classList.add('md:grid-cols-2');
            }
        }

        // Initial setup and listener for resizing
        window.addEventListener('resize', updateGridColumns);
        
        // Listen to the filter button click event to update the grid immediately after toggle
        document.getElementById('filter-toggle-button').addEventListener('click', () => {
             // Use a timeout to wait for the next frame after class change
            setTimeout(updateGridColumns, 350); 
        });

        // Set initial grid columns on load
        window.onload = updateGridColumns;

    </script>
</body>
</html>