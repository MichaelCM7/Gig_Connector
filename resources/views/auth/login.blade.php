<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gig Connector - Login</title>
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
        /* Style for the custom checkbox */
        .custom-checkbox:checked {
            background-color: #6B46C1;
            border-color: #6B46C1;
        }
    </style>
</head>
<body class="antialiased bg-white h-screen flex items-center justify-center overflow-hidden">
    <!-- Main Content Container --><div class="container mx-auto px-4 h-full flex flex-col md:flex-row items-center justify-center">

        <!-- Left Side: Illustration and Branding (Hidden on mobile) -->
        <!-- Note: This structure exactly matches the registration page for consistent branding layout -->
        <div class="hidden md:flex relative w-full md:w-1/2 h-full justify-center items-center p-8">
            <!-- Illustration positioned at the top-right of its container -->
            <div class="absolute top-8 right-24 max-w-[400px] h-auto object-contain">
                <img src="welcome_illustration.png" alt="Gig Connector Illustration" class="w-full h-full object-contain">
            </div>

            <!-- Branding Text positioned separately at the bottom-left -->
            <div class="absolute bottom-10 left-10 text-left p-4">
                 <h1 class="text-5xl font-extrabold text-[#6B46C1] mb-2 tracking-tight">Gig Connector</h1>
                 <p class="text-xl text-gray-700 font-serif italic">Connect, Apply, Grow</p>
                 <p class="mt-4 text-[#6B46C1] font-semibold cursor-pointer hover:underline text-sm">Learn More about our platform</p>
            </div>
        </div>

        <!-- Right Side: Login Form --><div class="w-full md:w-1/2 flex flex-col items-center p-8 form-container">
            <div class="w-full max-w-md">
                <!-- Title --><h2 class="text-5xl font-extrabold text-[#6B46C1] mb-10 tracking-tight text-center md:text-left">Welcome Back</h2>

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Email --><div>
                        <label for="email" class="block text-sm font-bold text-gray-900 mb-2">Email</label>
                        <div class="relative">
                            <input id="email" type="email" name="email" required autofocus autocomplete="username" placeholder="jane@gigconnector.com" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-[#6B46C1] focus:ring focus:ring-[#6B46C1] focus:ring-opacity-50 pl-10 text-gray-700 placeholder-gray-400 transition duration-150">
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
                            <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-[#6B46C1] focus:ring focus:ring-[#6B46C1] focus:ring-opacity-50 pl-10 pr-10 text-gray-700 placeholder-gray-400 transition duration-150">
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
                    </div>
                    
                    <!-- Remember Me and Forgot Password -->
                    <div class="flex items-center justify-between pt-2">
                        <!-- Remember Me -->
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox" class="custom-checkbox h-4 w-4 text-[#6B46C1] rounded border-gray-300 focus:ring-[#6B46C1] focus:ring-opacity-50 transition duration-150">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-600 select-none">
                                Remember me
                            </label>
                        </div>

                        <!-- Forgot Password Link -->
                        <a href="{{ route('password.request') }}" class="text-sm font-semibold text-[#6B46C1] hover:text-[#5a3da3] hover:underline transition duration-300">
                            Forgot your password?
                        </a>
                    </div>
                    
                    <!-- Login Button -->
                    <button href="{{ route('login') }}" type="submit" class="w-full bg-[#6B46C1] hover:bg-[#5a3da3] text-white font-bold py-3 rounded-xl shadow-lg transition duration-300 mt-4 text-lg transform hover:scale-[1.01] focus:outline-none focus:ring-4 focus:ring-[#6B46C1]/50">
                        Log In
                    </button>

                    <!-- Register Link -->
                    <div class="text-center pt-4">
                        <p class="text-gray-600">
                            Don't have an account? <a href="{{ route('register') }}" class="text-[#6B46C1] hover:text-[#5a3da3] hover:underline font-bold transition duration-300">Register</a>
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
            const iconId = fieldId === 'password' ? 'togglePasswordIcon' : 'togglePasswordConfirmationIcon';
            const icon = document.getElementById(iconId);

            const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
            field.setAttribute('type', type);

            // Update the icon to reflect visibility state (optional, but good UX)
            // Note: Since we only have one password field now, we just use togglePasswordIcon
            if (fieldId === 'password') {
                icon.innerHTML = type === 'text' ? 
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7 1.274-4.057 5.064-7 9.542-7 1.76 0 3.447.375 5.006 1.05M12 17a5 5 0 100-10 5 5 0 000 10zM17 17l-4-4"/>' :
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />\n<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
            }
        }
    </script>
</body>
</html>