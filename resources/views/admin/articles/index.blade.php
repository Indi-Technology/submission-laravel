@php
    $categoryId = request('category_id');
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="py-3 flex items-center justify-between px-4">
            <div class="flex items-center mr-4">
                <form action="{{ route('articles.index') }}" method="GET">
                    <select 
                        name="category_id" 
                        class="select bg-white border-gray-300 text-black" 
                        onchange="this.form.submit()"
                    >
                        <option value="" {{ request('category_id') ? '' : 'selected' }}>All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                        @endforeach
                    </select>
                </form>
            </div>

            <div class="flex items-center space-x-2">
            <form action="{{ route('articles.index') }}" method="GET" class="flex items-center space-x-2">
                <input 
                    type="text" 
                    name="search"
                    placeholder="Type here" 
                    class="input input-bordered input-info bg-white border-gray-300 text-black" 
                />
                <button type="submit" class="btn btn-ghost btn-outline">Search 🔍</button>
            </form>
            </div>

            <div class="ml-4">
                <a href="{{ route('articles.create') }}" class="btn btn-ghost btn-outline">Add Article</a>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div 
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 5000)"
            x-show="show"
            class="alert alert-success max-w-3xl mx-auto sm:px-6 lg:px-8"
        >
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div 
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 5000)"
            x-show="show"
            class="alert alert-error max-w-3xl mx-auto sm:px-6 lg:px-8"
        >
            {{ session('error') }}
        </div>
    @endif
    @if($message)
<div class="flex items-center justify-center h-[70vh] text-center text-gray-500">
    <div class="my-auto">
        <p>{{ $message }}</p>
    </div>
</div>
@else
    <div class="py-5 px-5 mx-auto grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($articles as $article)
            <div class="card w-full bg-gray-200 shadow-xl">
                <figure>
                    @if ($article->image)
                        <img 
                            src="{{ asset('storage/images/' . $article->image) }}" 
                            alt="{{ $article->image }}" 
                            class="object-cover w-full h-60" 
                        />
                    @else
                        <img 
                            src="https://storage.googleapis.com/inditech-storage/apple.jpg" 
                            alt="Default Image" 
                            class="object-cover w-full h-60" 
                        />
                    @endif
                </figure>

                <div class="card-body flex flex-col justify-between">
                    <div class="min-h-[60px]">
                        <h2 class="card-title text-black capitalize overflow-hidden mb-2">
                            <span class="inline-block">
                                {{ Str::limit($article->title, 60) }}
                            </span>
                        </h2>
                    </div>
                    <div class="h-full">
                        <div class="badge badge-primary text-white mb-2">
                            <p>{{ $article->category->name }}</p>    
                        </div>
                    </div>
                    <p class="text-gray-700 text-justify">{{ Str::limit($article->content, 270) }}</p>
                    <div class="text-sky-500 font-semibold">
                        <div class="flex space-x-2">
                            @foreach ($article->tags as $tag)
                                <div class="badge badge-outline capitalize">
                                    #{{ $tag->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="flex space-x-2 py-3">
                        <form action="{{ route('articles.destroy', $article) }}" method="post">
                            @csrf
                            @method('delete')
                            <button 
                                type="submit" 
                                class="btn btn-error text-white" 
                                onclick="return confirm('Are you sure?')">Delete
                            </button>
                        </form>
                        <a 
                            href="{{ route('articles.edit', $article) }}" 
                            class="btn btn-primary text-white">Edit
                        </a>
                        <a 
                            href="{{ route('articles.view', $article) }}" 
                            class="btn btn-primary text-white">View
                        </a>
                    </div>
                    <span>
                        {{ $article->created_at->diffForHumans() }}
                    </span>
                </div>
            </div>
        @endforeach
    </div>
    <div class="container mx-auto">
        <div class="py-6">
            {{ $articles->appends(['category_id' => $categoryId])->links() }}
        </div>
    </div>
@endif
</x-app-layout>
