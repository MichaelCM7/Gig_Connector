{{-- resources/views/layouts/partials/provider-table.blade.php --}}


<div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100/70">
    
    {{-- Sort by component (Pulled up next to the search bar in the new layout) --}}
    {{-- NOTE: This div is styled to make the sort text visible --}}
    
    <table class="min-w-full divide-y divide-gray-200">
        {{-- TABLE HEADERS (THEAD) --}}
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Posted Jobs</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Application Counts</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        
        {{-- TABLE BODY (TBODY) --}}
        <tbody class="divide-y divide-gray-200">
            
            @forelse ($posts as $post)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $post->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{-- STATUS FIX: Ensure styling is correct --}}
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $post->is_closed ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                            {{ $post->is_closed ? 'Closed' : 'Open' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $post->application_count }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $post->duration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('provider.applicants', $post->id) }}" class="text-gig-purple hover:text-purple-900 mr-3">Applicants</a>
                        <a href="{{ route('provider.edit_post', $post->id) }}" class="text-gig-purple hover:text-purple-900">Post</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-6 text-center text-gray-500">
                        You haven't posted any gigs yet. Click 'Create a New Post' to get started!
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>