<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-3 text-center">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight py-3 pb-5">Create Article</h2>
            <div class="mx-auto">
                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <p class="text-gray-500 font-semibold"><span class="text-rose-500">*</span>Title</p>
                        <input 
                            type="text" 
                            id="title" 
                            name="title" 
                            placeholder="Article Title" 
                            class="input input-bordered input-info w-full max-w-xs bg-white border-gray-300 text-black" 
                            maxlength="80"
                            required 
                        />
                        <div class="text-center">
                            <span class="label-text text-center">Max 80 words</span>
                        </div>
                    </div>
                    
                    <div class="pt-3">
                        <p class="text-gray-500 font-semibold"><span class="text-rose-500">*</span>Content</p>
                        <textarea 
                            type="text" 
                            id="content" 
                            name="content" 
                            class="textarea textarea-bordered max-w-xs w-80 h-40 bg-white border-gray-300 text-black" 
                            placeholder="Content Description" 
                            required
                        >
                        </textarea>
                    </div>
                    
                    <div class="pt-3">
                        <p class="text-gray-500 font-semibold">
                            <span class="text-rose-500">*</span>Category
                        </p>
                        <select 
                            name="category_id" 
                            id="category_id" 
                            class="select select-bordered w-full max-w-xs bg-white border-gray-300 text-black" 
                            required 
                        >
                        <option disabled selected>Select an article category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="pt-3">
                        <p class="text-gray-500 font-semibold">Tags</p>
                        <input 
                            type="text" 
                            name="tags[]" 
                            placeholder="Tag 1" 
                            class="input input-bordered w-full max-w-xs bg-white border-gray-300 text-black" 
                        />
                        <input 
                            type="text" 
                            name="tags[]" 
                            placeholder="Tag 2" 
                            class="input input-bordered w-full max-w-xs bg-white border-gray-300 text-black" 
                        />
                        <div class="text-center">
                            <span class="label-text text-center">Max 2 tags allowed</span>
                        </div>
                    </div>
                    
                    <div class="pt-3">
                        <p class="text-gray-500 font-semibold">Thumbnail Image</p>
                        <input 
                            type="file" 
                            id="image" 
                            name="image" 
                            class="file-input file-input-bordered file-input-primary w-full max-w-xs bg-white border-gray-300 text-black" 
                        />
                        <div class="text-center">
                            <span class="label-text text-center">Max Size 2MB </span>
                        </div>
                    </div>
                    
                    <div class="py-6 text-center">
                        <a href="{{ route('articles.index') }}" class="btn btn-primary btn-outline ml-auto">Back</a>
                        <button 
                            type="submit" 
                            value="submit" 
                            class="btn btn-primary btn-outline ml-auto" 
                            onclick="return confirm('Post this article?')">Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>