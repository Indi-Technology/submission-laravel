<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Edit Tag</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">Edit Tag Here
                </p>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-8 bg-white shadow-sm sm:rounded-lg mb-8">
                <form method="POST" action="{{ route('admin.tags.update', $tag->id) }}">
                    @method('PUT')
                    @csrf
                            <div class="col-span-1">
                                <label for="name" class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" name="name" id="title" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $tag->name }}" required>
                                @error('name')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                            </div>

                        <x-primary-button class="mt-3">
                            Submit
                        </x-primary-button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
