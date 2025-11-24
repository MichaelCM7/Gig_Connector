<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gig Connector - Register</title>
    <!-- Load Tailwind CSS from CDN --><script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom Font: Inter (Tailwind default) */
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Style for the italic tagline */
        .font-serif {
            font-style: italic;
        }
        /* Custom height for the form side on desktop to allow scrolling */
        .form-container {
            max-height: 100vh;
            overflow-y: auto;
        }
    </style>
</head>
<body class="antialiased bg-white h-screen flex items-center justify-center overflow-hidden">
    <!-- Main Content Container --><div class="container mx-auto px-4 h-full flex flex-col md:flex-row items-center justify-center">

        <!-- Left Side: Illustration and Branding (Hidden on mobile) --><div class="hidden md:flex relative w-full md:w-1/2 h-full justify-center items-center p-8">
            <!-- Illustration positioned at the top-right of its container -->
            <div class="absolute top-8 right-24 max-w-[400px] h-auto object-contain">
                <img src="welcome_illustration.png" alt="Gig Connector Illustration" class="w-full h-full object-contain">
            </div>

            <!-- Branding Text positioned separately at the bottom-left --><div class="absolute bottom-10 left-10 text-left p-4">
                 <h1 class="text-5xl font-extrabold text-[#6B46C1] mb-2 tracking-tight">Gig Connector</h1>
                 <p class="text-xl text-gray-700 font-serif italic">Connect, Apply, Grow</p>
                 <p class="mt-4 text-[#6B46C1] font-semibold cursor-pointer hover:underline text-sm">Learn More about our platform</p>
            </div>
        </div>

        <!-- Right Side: Registration Form --><div class="w-full md:w-1/2 flex flex-col items-center p-8 form-container">
            <div class="w-full max-w-md">
                <!-- Title --><h2 class="text-5xl font-extrabold text-[#6B46C1] mb-10 tracking-tight text-center md:text-left">Welcome</h2>

                <!-- Form --><form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf
                    <!-- Full Name --><div>
                        <label for="name" class="block text-sm font-bold text-gray-900 mb-2">Full Name</label>
                        <div class="relative">
                            <input id="name" type="text" name="name" required autofocus autocomplete="name" placeholder="Jane Doe" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-[#6B46C1] focus:ring focus:ring-[#6B46C1] focus:ring-opacity-50 pl-10 text-gray-700 placeholder-gray-400 transition duration-150">
                            <!-- Icon for Name --><div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Email --><div>
                        <label for="email" class="block text-sm font-bold text-gray-900 mb-2">Email</label>
                        <div class="relative">
                            <input id="email" type="email" name="email" required autocomplete="username" placeholder="jane@gigconnector.com" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-[#6B46C1] focus:ring focus:ring-[#6B46C1] focus:ring-opacity-50 pl-10 text-gray-700 placeholder-gray-400 transition duration-150">
                            <!-- Icon for Email --><div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Password --><div>
                        <label for="password" class="block text-sm font-bold text-gray-900 mb-2">Password</label>
                        <div class="relative">
                            <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-[#6B46C1] focus:ring focus:ring-[#6B46C1] focus:ring-opacity-50 pl-10 pr-10 text-gray-700 placeholder-gray-400 transition duration-150">
                            <!-- Icon for Password --><div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <!-- Icon for Show/Hide Password --><div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" onclick="togglePasswordVisibility('password')">
                                <svg id="togglePasswordIcon" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">At least 8 characters.</p>
                    </div>

                    <!-- Confirm Password --><div>
                        <label for="password_confirmation" class="block text-sm font-bold text-gray-900 mb-2">Confirm Password</label>
                        <div class="relative">
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-[#6B46C1] focus:ring focus:ring-[#6B46C1] focus:ring-opacity-50 pl-10 pr-10 text-gray-700 placeholder-gray-400 transition duration-150">
                            <!-- Icon for Password --><div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <!-- Icon for Show/Hide Password --><div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" onclick="togglePasswordVisibility('password_confirmation')">
                                <svg id="togglePasswordConfirmationIcon" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">At least 8 characters.</p>
                    </div>
                    
                    <!-- University/College -->
                    <!-- <div>
                        <label for="university" class="block text-sm font-bold text-gray-900 mb-2">University/College</label>
                        <div class="relative">
                            <select id="university" name="university" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-[#6B46C1] focus:ring focus:ring-[#6B46C1] focus:ring-opacity-50 pl-10 appearance-none bg-white text-gray-700 transition duration-150">
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
                    </div> -->

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-[#6B46C1] hover:bg-[#5a3da3] text-white font-bold py-3 rounded-xl shadow-lg transition duration-300 mt-4 text-lg transform hover:scale-[1.01] focus:outline-none focus:ring-4 focus:ring-[#6B46C1]/50">
                        Create Account
                    </button>

                    <!-- Login Link --><div class="text-center pt-4">
                        <p class="text-gray-600">
                            Already have an account? <a href="{{ route('login') }}" class="text-[#6B46C1] hover:text-[#5a3da3] hover:underline font-bold transition duration-300">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // JavaScript function to toggle password visibility
        function togglePasswordVisibility(fieldId) {
            const field = document.getElementById(fieldId);
            const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
            field.setAttribute('type', type);
        }
    </script>
</body>
</html>