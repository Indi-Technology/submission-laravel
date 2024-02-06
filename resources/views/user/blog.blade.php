@extends('user.layouts.master')

@php
    $categoryId = request('category_id');
@endphp

@section('content')
<div class="py-3">
    <div class="py-3 flex items-center justify-between px-4">
        <div class="flex items-center mr-4">
            <form action="{{ route('blog') }}" method="GET">
                <select 
                    name="category_id" 
                    class="select bg-ghost border-gray-300 text-white" 
                    onchange="this.form.submit()"
                >
                    <option value="" {{ request('category_id') ? '' : 'selected' }}>All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>
</div>
@if($message)
<div class="flex items-center justify-center h-[70vh] text-center text-gray-500">
    <div class="my-auto">
        <p>{{ $message }}</p>
    </div>
</div>
@else
<div class="py-5 px-5 mx-auto grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3">
    @foreach ($articles as $article)
        <div class="card w-full bg-base-200 shadow-xl">
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
                <div class="min-h-[90px]">
                    <h2 class="card-title">
                        {{ Str::limit($article->title, 60) }}
                        @if(now()->diffInHours($article->created_at) < 24)
                            <div class="badge badge-info">NEW</div>
                        @endif
                    </h2>
                </div>
                <div class="h-full">
                    <div class="badge badge-primary text-white mb-2">
                        <p>{{ $article->category->name }}</p>    
                    </div>
                </div>
                <p class="text-gray-400 text-justify">{{ Str::limit($article->content, 280) }}</p>
                <div class="text-sky-500 font-semibold">
                    <div class="flex space-x-2 pt-1">
                        @foreach ($article->tags as $tag)
                            <div class="badge badge-outline capitalize">
                                #{{ $tag->name }}
                            </div>
                        @endforeach
                    </div>
                </div>
                <a class="py-3 text-primary" href="{{ route('view', $article) }}">Read More</a>
                <span>
                    Published on {{ $article->created_at->diffForHumans() }}
                </span>
            </div>
        </div>
    @endforeach
</div>
<div class="py-6">
    {{ $articles->appends(['category_id' => $categoryId])->links() }}
</div>
@endif
@endsection