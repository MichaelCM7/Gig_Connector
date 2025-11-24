<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Registration - Gig Connector</title>
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

    <!-- Sidebar (simplified, matching student dashboard) -->
    <aside class="w-20 md:w-64 flex-shrink-0 bg-white border-r border-gray-100 p-4 sticky top-0 h-screen">
        <div class="flex flex-col h-full">
            <div class="hidden md:flex items-center space-x-3 pb-8 border-b border-gray-100 mb-6">
                <img src="https://placehold.co/40x40/6B46C1/ffffff?text=PC" alt="Avatar" class="rounded-full w-10 h-10 object-cover border-2 border-gig-purple">
                <div>
                    <span class="block text-sm font-semibold text-gray-900">Provider</span>
                    <span class="block text-xs text-gray-500">Create account</span>
                </div>
            </div>

            <nav class="space-y-2 flex-grow">
                <p class="hidden md:block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">MAIN</p>
                <a href="#" class="sidebar-active flex items-center p-3 transition duration-150 group">
                    <svg class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18M3 6h18M3 18h18" />
                    </svg>
                    <span class="hidden md:block">Register</span>
                </a>
            </nav>

            <div class="mt-auto pt-6 border-t border-gray-100 space-y-4">
                <div class="hidden md:block text-center text-xs text-gray-400 pt-2">
                    <h3 class="font-extrabold text-lg text-gig-purple mb-1">Gig Connector</h3>
                    <p>Connect. Apply. Grow</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-grow p-6 md:p-10">
        <header class="mb-8">
            <h1 class="text-5xl md:text-6xl font-extrabold text-gig-purple mb-1">Welcome</h1>
        </header>

        <div class="max-w-3xl mx-auto">
            <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100">
                <form method="POST" action="{{ Route::has('provider.register.submit') ? route('provider.register.submit') : '#' }}" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Full Name / Organization Name</label>
                        <input type="text" name="name" required class="mt-2 block w-full rounded-lg border-gray-200 shadow-sm focus:ring-gig-purple focus:border-gig-purple" />
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Email</label>
                        <input type="email" name="email" required class="mt-2 block w-full rounded-lg border-gray-200 shadow-sm focus:ring-gig-purple focus:border-gig-purple" />
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Password</label>
                        <input type="password" name="password" required class="mt-2 block w-full rounded-lg border-gray-200 shadow-sm focus:ring-gig-purple focus:border-gig-purple" />
                        <p class="text-xs text-gray-500 mt-1">At least 8 characters.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Confirm Password</label>
                        <input type="password" name="password_confirmation" required class="mt-2 block w-full rounded-lg border-gray-200 shadow-sm focus:ring-gig-purple focus:border-gig-purple" />
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Provider Type</label>
                        <select name="provider_type" required class="mt-2 block w-full rounded-lg border-gray-200 shadow-sm focus:ring-gig-purple focus:border-gig-purple">
                            <option value="">Select here...</option>
                            <option value="training">Training Institution</option>
                            <option value="gig">Gig Provider</option>
                            <option value="agency">Recruitment Agency</option>
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="w-full inline-flex justify-center items-center px-6 py-3 bg-gig-purple text-white font-semibold rounded-lg hover:bg-indigo-600 transition">
                            Create Account
                        </button>
                    </div>

                    <p class="text-center text-sm text-gray-500">Already have an account? <a href="/login" class="text-gig-purple font-medium">Login</a></p>
                </form>
            </div>
        </div>
    </main>

</body>
</html>
