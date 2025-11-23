{{-- resources/views/layouts/partials/sidebar-header.blade.php --}}

@php
    $user = Auth::user();
    $role = $user->role ?? 'guest';
    $roleDisplay = ucfirst($role);
@endphp

<div class="py-4 border-b border-gray-100 mb-6">
    <p class="text-xs text-gray-500 uppercase">{{ $roleDisplay }}</p>
    <div class="flex items-center mt-2">
        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center mr-3 text-sm font-semibold text-gray-700">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>
        <div>
            <p class="font-semibold text-gray-800">{{ $user->name }}</p>
            <p class="text-xs text-gray-500">@ {{ $user->email }}</p>
        </div>
    </div>
</div>