<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Article List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($articles as $article)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-3 flex flex-wrap"
                onclick="window.location='{{ route('public.show', $article->id) }}';" style="cursor:pointer;">
                <div class="ml-6 mt-6 mb-6 pt-3">
                    @if($article->image_path)
                    <img src="{{ asset('storage/uploads/' . $article->image_path) }}" width="100" height="100">
                    @else
                    <img src="{{asset('storage/uploads/no_image.png')}}" width="100" height="100">
                    @endif
                    <span class="mt-1 text-sm text-white">{{ $article->created_at->format('d F Y') }}</span>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 max-w-5xl">
                    <div class="text-xl mb-2 font-semibold">
                        {{$article->title}}
                    </div>
                    <div class="mb-2 font-thin">
                        @php
                        $text = $article->full_text;
                        $words = explode(' ', $text);
                        if (count($words) > 40) {
                        $shortened_text = implode(' ', array_slice($words, 0, 40)) . '...';
                        echo $shortened_text;
                        } else {
                        echo $text;
                        }
                        @endphp
                    </div>
                    <div>
                        <a href="{{route('public.show', $article->id) }}" class="text-gray-500 dark:text-gray-500">Read
                            More...</a>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</x-app-layout>