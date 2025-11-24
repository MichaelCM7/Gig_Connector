<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gig Connector - Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-white h-screen flex items-center justify-center overflow-hidden">
    <div class="container mx-auto px-4 h-full flex flex-col md:flex-row items-center justify-center">
        <!-- Left Side: Illustration -->
        <div class="hidden md:flex w-full md:w-1/2 justify-center md:justify-end p-8">
            <img src="{{ asset('images/welcome_illustration.png') }}" alt="Gig Connector Illustration" class="max-w-full h-auto object-contain max-h-[80vh]">
            <div class="absolute bottom-10 left-10 text-center md:text-left">
                 <h1 class="text-5xl font-bold text-[#6B46C1] mb-2">Gig Connector</h1>
                 <p class="text-xl text-gray-700 font-serif italic">Connect, Apply, Grow</p>
                 <p class="mt-4 text-[#6B46C1] font-semibold cursor-pointer hover:underline">Learn More about our platform</p>
            </div>
        </div>

        <!-- Right Side: Form -->
        <div class="w-full md:w-1/2 flex flex-col items-center md:items-start p-8 overflow-y-auto max-h-screen">
            <div class="w-full max-w-md">
                <h2 class="text-5xl font-bold text-[#6B46C1] mb-8 tracking-tight">Welcome</h2>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Full Name -->
                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-900 mb-1">Full Name</label>
                        <div class="relative">
                            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Jane" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-[#6B46C1] focus:ring focus:ring-[#6B46C1] focus:ring-opacity-50 pl-10 text-gray-700 placeholder-gray-400">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-900 mb-1">Email</label>
                        <div class="relative">
                            <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="jane@gmail.com" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-[#6B46C1] focus:ring focus:ring-[#6B46C1] focus:ring-opacity-50 pl-10 text-gray-700 placeholder-gray-400">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-bold text-gray-900 mb-1">Password</label>
                        <div class="relative">
                            <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="xxxxxxxx" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-[#6B46C1] focus:ring focus:ring-[#6B46C1] focus:ring-opacity-50 pl-10 pr-10 text-gray-700 placeholder-gray-400">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">At least 8 characters.</p>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-bold text-gray-900 mb-1">Confirm Password</label>
                        <div class="relative">
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="xxxxxxxx" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-[#6B46C1] focus:ring focus:ring-[#6B46C1] focus:ring-opacity-50 pl-10 pr-10 text-gray-700 placeholder-gray-400">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">At least 8 characters.</p>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- University/College -->
                    <div>
                        <label for="university" class="block text-sm font-bold text-gray-900 mb-1">University/College</label>
                        <div class="relative">
                            <select id="university" name="university" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-[#6B46C1] focus:ring focus:ring-[#6B46C1] focus:ring-opacity-50 pl-10 appearance-none bg-white text-gray-700">
                                <option value="" disabled selected>Select here...</option>
                                <option value="University of Nairobi">University of Nairobi</option>
                                <option value="Kenyatta University">Kenyatta University</option>
                                <option value="Strathmore University">Strathmore University</option>
                                <option value="JKUAT">JKUAT</option>
                                <option value="Other">Other</option>
                            </select>
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-[#6B46C1] hover:bg-[#5a3da3] text-white font-bold py-3 rounded-lg shadow-md transition duration-300 mt-4 text-lg">
                        Create Account
                    </button>

                    <div class="text-center mt-4">
                        <p class="text-gray-600">
                            Already have an account? <a href="{{ route('login') }}" class="text-[#6B46C1] hover:underline font-bold">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
