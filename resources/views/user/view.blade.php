@extends('user.layouts.master')

@section('content')
<div class="mx-auto pt-6">
    <div class="avatar mx-20">
        <div class="w-16 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
            <img src="https://storage.googleapis.com/inditech-storage/hero.jpg" />
        </div>
        <span class="mx-5 my-auto">Created by <span class="text-primary">Prinafsika</span></span>
    </div>
</div>
<div class="pt-3 pb-3">
    <div class="text-center">
        <h1 class="text-3xl font-bold py-3 pb-6 capitalize">{{ Str::limit($article->title, 80) }}</h1>
    @if ($article->image)
        <img 
            class="object-cover rounded-3xl h-full w-1/2 mx-auto" 
            src="{{ asset('storage/images/' . $article->image) }}" 
            alt="{{ $article->image }}"
        />
    @else
        <img 
            src="https://storage.googleapis.com/inditech-storage/apple.jpg" 
            alt="Default Image" 
            class="object-cover rounded-3xl h-full w-1/2 mx-auto" 
        />
    @endif
    </div>
    <div class="mx-auto pt-6">
        <div class="mx-20">
            <p class="text-justify" style="white-space: pre-line;">{{ $article->content }}</p>
            <div class="py-6 text-primary">
                <p>Category : {{ $article->category->name }}</p>
                <p>
                    @foreach ($article->tags as $tag)
                        #{{ $tag->name }}
                    @endforeach
                </p>
            </div>
        </div>
    </div>
    <h2 class="font-bold text-xl text-center leading-tight pb-6">Related Articles</h2>
    <div class="flex flex-wrap gap-4 sm:grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($relatedArticles as $relatedArticle)
        <div class="card w-96 bg-base-100 shadow-xl">
            <figure>
                @if ($relatedArticle->image)
                    <img
                        src="{{ asset('storage/images/' . $relatedArticle->image) }}"
                        alt="{{ $relatedArticle->image }}"
                    />
                @else
                    <img
                        src="https://storage.googleapis.com/inditech-storage/apple.jpg"
                        alt="Default Image"
                    />
                @endif
            </figure>
            <div class="card-body">
                <h2 class="card-title">
                    <a href="{{ route('view', ['id' => $relatedArticle->id]) }}">{{ Str::limit($relatedArticle->title, 60) }}</a>
                    @if(now()->diffInHours($relatedArticle->created_at) < 24)
                        <div class="badge badge-info">NEW</div>
                    @endif
                </h2>
                <p class="text-justify">{{ Str::limit($relatedArticle->content, 280) }}</p>
                <div class="card-actions justify-end text-primary">
                    @foreach ($relatedArticle->tags as $tag)
                        <div class="badge badge-outline capitalize">
                            #{{ $tag->name }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="py-6 max-w-xl mx-auto">
        <div class="flex justify-between">
            @if ($previousArticle)
                <a class="btn btn-outline" href="{{ route('view', ['id' => $previousArticle->id]) }}">« Previous Article</a>
            @else
                <span class="btn btn-disabled" aria-disabled="true">« Previous Article</span>
            @endif
    
            @if ($nextArticle)
                <a class="btn btn-outline" href="{{ route('view', ['id' => $nextArticle->id]) }}">Next Article »</a>
            @else
                <span class="btn btn-disabled" aria-disabled="true">Next Article »</span>
            @endif
        </div>
    </div>
</div>
@endsection