<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gig Connector</title>
    <!-- Load Tailwind CSS from CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom Font: Inter (Tailwind default) */
        body {
            font-family: 'Inter', sans-serif;
            /* Ensure the body takes full viewport height for centering */
        }
        /* Style for the italic tagline */
        .font-serif {
            font-style: italic;
        }
    </style>
</head>
<body class="antialiased bg-white h-screen flex items-center justify-center overflow-hidden">
    <!-- Main Content Container -->
    <div class="container mx-auto px-6 lg:px-12 xl:px-24 h-full flex flex-col md:flex-row items-center justify-center">


        <!-- Left Side: Illustration -->
        <div class="w-full md:w-1/2 flex justify-center md:justify-end p-8">
            <img src="welcome_illustration.png" alt="Gig Connector Illustration" class="max-w-full h-auto object-contain max-h-[80vh]">
        </div>

        <!-- Right Side: Content -->
        <div class="w-full md:w-1/2 flex flex-col items-center md:items-start p-8 space-y-10">
            <div class="text-center md:text-left">
                <h1 class="text-7xl font-bold text-[#6B46C1] mb-4 tracking-tight">Gig Connector</h1>
                <p class="text-3xl text-gray-800 font-serif italic">Connect, Apply, Grow</p>
            </div>

            <div class="w-full max-w-md space-y-5">
                <a href="{{ route('register') }}" class="block w-full bg-[#6B46C1] hover:bg-[#5a3da3] text-white text-center font-bold py-4 rounded-lg shadow-lg transition duration-300 text-xl">
                    Sign Up
                </a>
                <a href="{{ route('login') }}" class="block w-full bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-700 text-center font-bold py-4 rounded-lg shadow-sm transition duration-300 text-xl">
                    Log In
                </a>
            </div>
        </div>
    </div>
</body>