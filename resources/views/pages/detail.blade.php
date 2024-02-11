<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-2">{{ $post->title }}</h2>

                <div class="flex items-center gap-x-4 text-xs">
                    <time datetime="{{ $post->created_at }}" class="text-gray-500">{{ $post->created_at->format('d M Y') }}</time>
                    <span
                    class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $post->category->name }}</span>
                </div>
            </div>
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-0 lg:px-8">
            <div class="flex max-w items-start justify-between bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    @foreach ($post->tags as $tag)
                        <span class="text-sm font-extrabold">#{{ $tag->name }}</span>
                    @endforeach
                    <hr class="my-4 border-t border-gray-300" style="width: 100px">
                    <p class="text-gray-600"> {{ $post->post }}</p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
