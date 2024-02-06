<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
            {{ __('Edit Article') }} {{ $article->title }}
        </h2>
    </x-slot>

    <div class="bg-gray-300">
        <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="text-center">
                    <input 
                        type="text" 
                        id="title" 
                        name="title" 
                        placeholder="{{ $article->title }}" 
                        class="input w-full max-w-xs bg-transparent capitalize text-center py-3 text-2xl font-semibold text-gray-800 hover:input-primary" 
                        maxlength="80"
                        value="{{ $article->title }}" 
                    />
                </div>

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
                    <div class="text-center py-3">
                        <input 
                            type="file" 
                            id="image" 
                            name="image" 
                            class="file-input file-input-bordered w-full max-w-xs bg-white border-gray-300 text-black" 
                        />
                    </div>
                </div>
                
                <div class="text-center">
                    <div class="py-3">
                        <p class="text-black pb-1">Category</p>
                        <select 
                            name="category_id" 
                            id="category_id" 
                            class="select bg-white border-gray-300 text-black" 
                        >
                            <option selected value="{{ $article->category->id }}">{{ $article->category->name }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="py-3">
                        <p class="text-black pb-1">Tags</p>
                        <input 
                            type="text" 
                            name="tags[]" 
                            class="input input-bordered w-full max-w-xs bg-white border-gray-300 text-black"
                            @if(count($article->tags) == 0)
                                placeholder="Tag kosong"
                            @else
                                value="{{ $article->tags[0]->name }}"
                            @endif 
                        />
                        <input 
                            type="text" 
                            name="tags[]" 
                            class="input input-bordered w-full max-w-xs bg-white border-gray-300 text-black"
                            @if(count($article->tags) > 1)
                                value="{{ $article->tags[1]->name }}"
                            @else
                                placeholder="Tag kosong"
                            @endif 
                        />
                    </div>
                    <div>
                        <textarea 
                            name="content" 
                            id="content" 
                            class="text-gray-700 pt-3 text-justify w-full mx-auto" 
                            style="white-space: pre-line; max-height: 400px; "
                        >
                            {{ $article->content }}
                        </textarea>
                    </div>
                </div>
                
                <div class="py-6">
                    <div class="text-center py-6">
                        <button type="submit" class="btn text-white">Save</button>
                        <a class="btn text-white" href="{{ route('articles.index') }}">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    window.onload = function() {
        var textarea = document.getElementById("content");
        textarea.style.height = "auto";
        textarea.style.height = (textarea.scrollHeight > 400) ? "400px" : textarea.scrollHeight + "px";
    };
</script>
