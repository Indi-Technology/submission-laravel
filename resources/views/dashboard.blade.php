<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">My Personal Blog</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">Life is an adventure, make every step count</p>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($posts->reverse() as $post)
            <div class="p-8 bg-white flex max-w items-start justify-between shadow-sm sm:rounded-lg mb-8">
                <article class="flex-grow">
                    <div class="flex items-center gap-x-4 text-xs">
                        <time datetime="{{ $post->created_at }}" class="text-gray-500">{{ $post->created_at->format('d M Y') }}</time>
                        <span class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $post->category->name }}</span>
                    </div>
                    <div class="group relative mb-3">
                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                            <a href="{{ route('pages.detail', $post) }}">
                                <span class="absolute inset-0"></span>
                                {{ $post->title }}
                            </a>
                        </h3>
                        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ $post->post }}</p>
                    </div>
                    <hr>
                    <div class="relative mt-3 flex items-center gap-x-4">
                        @foreach ($post->tags as $tag)
                        <p class="text-gray-600">#{{ $tag->name }}</p>
                    @endforeach
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
