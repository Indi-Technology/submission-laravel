<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Homepage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-2 bg-white dark:bg-white sm:rounded-lg">
            <div class="flex flex-row bg-white dark:bg-white overflow-hidden shadow-sm">
              @foreach($article as $item)
                <div class="relative flex flex-col text-gray-700 bg-white bg-clip-border rounded-xl w-96">
                    <div class="relative h-56 mx-4 mt-4 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-blue-gray-500 shadow-blue-gray-500/40">
                      <img
                        src="{{ asset('storage/' . $item->image) }}" class="object-cover w-full h-full" alt="card-image" />
                    </div>
                    <div class="p-6">
                      <h5 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        {{ \Illuminate\Support\Str::limit($item->title, 45, $end='...') }}
                      </h5>
                      <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                        {!! \Illuminate\Support\Str::limit(nl2br(e($item->content)), 145, $end='...') !!}
                      </p>
                    </div>
                    <div class="p-6 pt-0">
                      <a href="{{ url('/details/'.$item->id) }}">
                        <button class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
                        type="button">
                        Read More
                        </button>
                      </a>
                    </div>
                  </div>  
                @endforeach
            </div>
            <div class="mx-6 my-6">
              {{ $article->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
 