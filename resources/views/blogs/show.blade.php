<x-app-layout>
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <div class="flex justify-between items-center mb-5 text-gray-500">
                        <span
                            class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                            <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                    clip-rule="evenodd"></path>
                                <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                            </svg>
                            {{ $article->category->name }}
                        </span>
                        <span class="text-sm">{{ $article->created_at->format('j F Y') }}</span>
                    </div>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $article->title }}</h1>
                </header>
                @if ($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                @endif
                <p class="my-5 font-light text-gray-500 dark:text-gray-400 text-justify">{{ $article->full_text }}</p>
                <span class="font-medium dark:text-white">
                    @foreach ($article->tags as $tag)
                        #{{ $tag->name }}@if (!$loop->last)
                            ;
                        @endif
                    @endforeach
                </span>
            </article>
        </div>
    </main>
</x-app-layout>
