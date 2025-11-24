<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Gig Connector</title>
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
                        'gig-purple-dark': '#5a3da3',
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
        /* Custom styling for the primary button */
        .primary-button {
            transition: all 0.2s ease-in-out;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .primary-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 10px rgba(107, 70, 193, 0.4);
        }
        /* Style input focus */
        input:focus {
            border-color: #6B46C1;
            box-shadow: 0 0 0 2px rgba(107, 70, 193, 0.5);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 overflow-hidden relative">

    <!-- Background Decoration Shapes -->
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute top-0 left-0 w-[400px] h-[400px] sm:w-[500px] sm:h-[500px] md:w-[600px] md:h-[600px] bg-gig-purple rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>
        <div class="absolute bottom-0 right-0 w-[300px] h-[300px] sm:w-[400px] sm:h-[400px] bg-gig-purple-dark rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    </div>

    <!-- Centered Form Card -->
    <div class="relative z-10 w-full max-w-md">
        <div class="bg-white p-6 sm:p-8 rounded-xl shadow-2xl border border-gray-100/50 hover:shadow-lg hover:shadow-gig-purple/20 transition duration-300">

            <!-- Title and Description -->
            <h1 class="text-3xl font-extrabold text-gig-purple mb-3 tracking-tight text-center">Password Reset</h1>
            
            <div class="mb-4 text-sm text-gray-600">
                Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
            </div>

            <!-- Session Status Message Placeholder -->
            <div id="status-message" class="mb-4 hidden">
                <!-- Success/Error message will be injected here -->
            </div>

            <form method="POST" action="{{ route('password.email') }}" id="forgot-password-form">
                <!-- @csrf is removed for static HTML -->

                <!-- Email Address -->
                <div class="space-y-1">
                    <!-- Label -->
                    <label for="email" class="block text-sm font-bold text-gray-900 mb-2">
                        Email
                    </label>
                    
                    <!-- Input -->
                    <input id="email" 
                           class="block w-full px-4 py-3 mt-1 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none placeholder-gray-400 text-gray-700 transition duration-150" 
                           type="email" 
                           name="email" 
                           value=""
                           required 
                           autofocus 
                           placeholder="Enter your email"
                    />
                    
                    <!-- Input Error Placeholder -->
                    <p id="email-error" class="mt-2 text-sm text-red-600 hidden">
                        <!-- Validation error will be injected here -->
                    </p>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <!-- Primary Button -->
                    <button type="submit" class="primary-button inline-flex items-center px-4 py-3 bg-gig-purple border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-wider hover:bg-gig-purple-dark focus:bg-gig-purple-dark active:bg-gig-purple-dark focus:outline-none focus:ring-4 focus:ring-gig-purple/50 transition ease-in-out duration-150 w-full justify-center">
                        Email Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('forgot-password-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const emailInput = document.getElementById('email');
            const emailError = document.getElementById('email-error');
            const statusMessage = document.getElementById('status-message');

            // Reset messages and styles
            emailError.classList.add('hidden');
            emailInput.classList.remove('border-red-500');
            statusMessage.classList.add('hidden');
            
            // Simple client-side validation check
            if (emailInput.value === "" || !emailInput.value.includes('@')) {
                emailError.textContent = "Please enter a valid email address to proceed.";
                emailError.classList.remove('hidden');
                emailInput.classList.add('border-red-500');
                return;
            }

            // Simulate successful form submission
            statusMessage.innerHTML = `
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative font-semibold" role="alert">
                    <span class="block">Success! A password reset link has been sent to ${emailInput.value}.</span>
                </div>
            `;
            statusMessage.classList.remove('hidden');
            
            // Clear input after simulated success
            emailInput.value = '';
        });
    </script>
</body>
</html>