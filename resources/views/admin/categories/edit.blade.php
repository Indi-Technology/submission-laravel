<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-3 text-center">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight py-3 pb-5">Edit Category</h2>
            <div class="mx-auto">
                <form action="{{ route('categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        placeholder="Kategori" 
                        class="input input-bordered input-info w-full max-w-xs bg-white border-gray-300 text-black" 
                        value="{{ $category->name }}" 
                        required
                    />
                
                    <div class="py-3 text-center">
                        <a 
                            href="{{ route('categories.index') }}" 
                            class="btn btn-primary btn-outline ml-auto">Back
                        </a>
                        <button 
                            type="submit" 
                            class="btn btn-primary btn-outline ml-auto">Edit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
