@php
    // Define custom Tailwind classes and routes
    $logoColor = 'text-gig-purple'; 
    $primaryColor = 'bg-gig-purple hover:bg-gig-purple-dark';
    $secondaryColor = 'border-gray-300 hover:border-gig-purple hover:text-gig-purple';
    
    // Routes pass a 'role' query parameter to the registration page
    $studentRegisterRoute = route('register', ['role' => 'student']);
    $providerRegisterRoute = route('register', ['role' => 'provider']);
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gig Connector | Welcome</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head>
<body class="antialiased font-sans bg-gray-50">

    <div class="min-h-screen flex flex-col">

        <main class="flex-grow flex items-center justify-center p-6">
            <div class="bg-white shadow-xl w-full max-w-6xl flex overflow-hidden min-h-[550px] rounded-lg">
                
                {{-- Left Side: Illustration Area (Hidden on small screens, shown from md breakpoint) --}}
                <div class="hidden md:flex md:w-1/2 items-center justify-center p-6 lg:p-12 relative bg-gray-50/50">
                    {{-- Container for illustrations to maintain aspect ratio and control overall size --}}
                    <div class="relative w-full h-full max-w-[450px] md:max-w-[500px] md:max-h-[500px]"> 
                        
                        {{-- Main illustration (Megaphone, Envelope, People) --}}
                        <img src="{{ asset('images/IAP_Gig_Connector.png') }}" 
                             alt="Megaphone, Envelope, and People illustration" 
                             class="absolute w-10/12 h-auto illustration-filter" 
                             style="bottom: 0; left: -8%;"> 

                        {{-- Top illustration (Woman with Bell and Plant) --}}
                        <img src="{{ asset('images/IAP_Gig_Connector_1.png') }}" 
                             alt="Woman with Bell and Plant illustration" 
                             class="absolute w-1/2 h-auto illustration-filter"
                             style="top: 0; right: -15%;"> {{-- Adjusted top for less overlap --}}
                    </div>
                </div>

                {{-- Right Side: Branding and CTA Area --}}
                <div class="w-full md:w-1/2 flex flex-col justify-center items-start p-8 md:p-16">
                    <h1 class="text-4xl sm:text-5xl font-extrabold mb-2 {{ $logoColor }}" style="font-family: 'Poppins', sans-serif;">
                        Gig Connector
                    </h1>
                    <p class="text-lg sm:text-xl text-gray-600 mb-10 md:mb-12">
                        Connect. Apply. Grow
                    </p>

                    <div class="w-full max-w-xs space-y-4">
                        <a href="{{ $studentRegisterRoute }}" class="block">
                            <button class="w-full py-3 px-6 rounded-lg text-white font-semibold transition duration-150 ease-in-out {{ $primaryColor }}">
                                I'm a Student
                            </button>
                        </a>
                        
                        <a href="{{ $providerRegisterRoute }}" class="block">
                            <button class="w-full py-3 px-6 rounded-lg text-gray-700 font-semibold border transition duration-150 ease-in-out bg-white {{ $secondaryColor }}">
                                I'm a Provider
                            </button>
                        </a>
                    </div>

                    
                </div>

            </div>
        </main>
    </div>
</body>
</html>