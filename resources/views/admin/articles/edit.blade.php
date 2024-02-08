<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('articles.update', $article->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                value="{{$article->title}}" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="image_path" :value="__('Cover')" />
                            <x-input-file id="image_path" name="image_path" />
                            <x-input-error :messages="$errors->get('image_path')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="tags" :value="__('Tags')" />
                            <x-text-input id="tags" class="block mt-1 w-full" type="text" name="tags"
                                value="{{ old('tags', $tags) }}" required autofocus autocomplete="tags" />
                            <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="category" :value="__('Category')" />
                            <select name="category" id="category"
                                class="block w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="0">--- SELECT CATEGORY ---</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id==old('category_id', $article->
                                    category_id))
                                    selected="selected"
                                    @endif>{{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="full_text" :value="__('Content')" />
                            <x-input-textarea placeholder="" name="full_text" id="full_text"
                                :value="old('full_text', $article->full_text)">
                            </x-input-textarea>
                            <x-input-error :messages="$errors->get('full_text')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>