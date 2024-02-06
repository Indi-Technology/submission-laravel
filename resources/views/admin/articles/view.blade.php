<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
            {{ __('Article') }} {{ $article->title }}
        </h2>
    </x-slot>

    <div class="bg-gray-300">
        <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight capitalize text-center py-3">
                {{ $article->title }}
            </h2>
            <div class="pt-3 pb-3">
                @if ($article->image)
                    <img 
                        class="object-cover rounded-3xl w-full h-100 mx-auto" 
                        src="{{ asset('storage/images/' . $article->image) }}" 
                        alt="{{ $article->image }}"
                    />
                @else
                    <img 
                        src="https://storage.googleapis.com/inditech-storage/apple.jpg" 
                        alt="Default Image" 
                        class="object-cover rounded-3xl w-full h-100 mx-auto" 
                    />
                @endif
            </div>
            <div class="px-3">
                <div class="text-center">
                    <p class="text-gray-700 pt-3 text-justify" style="white-space: pre-line;">
                        {{ $article->content }}
                    </p>
                </div>
            </div>
            <div class="py-6">
                <hr class="border border-gray-400">
                <div class="text-center py-6">
                    <a 
                        class="btn text-white" 
                        href="{{ route('articles.edit', $article) }}">Edit
                    </a>
                    <a 
                        class="btn text-white" 
                        href="{{ route('articles.index') }}">Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
