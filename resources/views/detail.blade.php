<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Articles Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-row bg-white dark:bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative flex flex-col text-gray-700 bg-white bg-clip-border rounded-xl w-auto">
                    <div class="relative h-auto mx-4 mt-4 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-blue-gray-500 shadow-blue-gray-500/40">
                      <img
                        src="{{asset('storage/'.$article->image)}}" alt="card-image" />
                    </div>
                    <div class="p-6 mt-2">
                      <h6 class="block font-sans text-l antialiased font-light leading-relaxed text-inherit">
                        Categories: {{ ($article->category)->name }}
                      </h6>
                      <h5 class="block my-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        {{ $article->title }}
                      </h5>
                      <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                        {{ $article->content }}
                      </p>
                      <p class="block mt-4 font-sans text-base antialiased font-light leading-relaxed text-inherit">
                        Tags: 
                        @foreach($article->articleTag as $tag)
                          {{($tag->tag)->name}}, 
                        @endforeach
                      </p>
                    </div>
                  </div>  
            </div>
        </div>
    </div>
</x-app-layout>
 