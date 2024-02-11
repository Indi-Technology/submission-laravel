<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Edit Story</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">Edit My Story Here
                </p>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-8 bg-white shadow-sm sm:rounded-lg mb-8">
                <form action="{{ route('admin.posts.update', $post) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2">
                        <div class="grid grid-cols-2 gap-y-6">
                            <div class="col-span-1">
                                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" name="title" id="title" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required value="{{ old('title', $post->title) }}">
                                @error('title')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="col-span-1 ml-2">
                                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                <select name="category" id="category" class="mt-1 block w-full border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    <option value="#">---choose category---</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if ($category->id == $post->category_id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="tags" class="block text-sm font-medium text-gray-700">Tag</label>
                            <input type="text" name="tags" id="tags" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('tags', $tags) }}">
                            <small class="block text-xs text-gray-500">Separated with comma</small>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="body" class="block text-sm font-medium text-gray-700">Story</label>
                            <textarea id="post" name="post"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Enter the Description">{{ old('post', $post->post) }}</textarea>
                            @error('post')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <x-primary-button class="mt-3">
                        Submit
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
        console.error( error );
        });
    </script>

</x-app-layout>


