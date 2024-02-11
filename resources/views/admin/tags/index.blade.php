<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <div class="max-w-2xl lg:mx-0">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-3">Manage Tag</h2>
            <span class="flex justify-between items-center">
                <div class="hidden space-x-8 sm:-my-px sm:flex">
                    <x-nav-link :href="route('admin.posts.index')" :active="request()->routeIs('admin.posts.index')">
                        Post
                    </x-nav-link>
                    <x-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.index')">
                        Category
                    </x-nav-link>
                    <x-nav-link :href="route('admin.tags.index')" :active="request()->routeIs('admin.tags.index')">
                        Tag
                    </x-nav-link>
                </div>
                <a href="{{ route('admin.tags.add') }}" class="bg-blue font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                    Add Tag
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" id="add"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M18 13h-5v5c0 .55-.45 1-1 1s-1-.45-1-1v-5H6c-.55 0-1-.45-1-1s.45-1 1-1h5V6c0-.55.45-1 1-1s1 .45 1 1v5h5c.55 0 1 .45 1 1s-.45 1-1 1z"></path></svg>
                </a>
            </span>
        </div>
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-x-auto">
            <div class="shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action</th>
                        </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 text-gray-600 text-sm">
                 @foreach ($tags as $index => $tag)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $tag->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('admin.tags.edit', $tag->id) }}"
                            class="text-blue-600 hover:text-blue-900 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v.01M12 8v.01M12 16v.01" />
                            </svg>
                        </a>

                        <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <button type="submit" class="text-red-600 hover:text-red-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $tags->links() }}
    </div>
</div>
</x-app-layout>
