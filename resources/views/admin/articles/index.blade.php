<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Article List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-link :href="route('articles.create')">Create Article</x-link>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-3">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-left text-sm font-light">
                                        <thead class="border-b font-medium dark:border-neutral-500">
                                            <tr>
                                                <th scope="col" class="px-6 py-4">#</th>
                                                <th scope="col" class="px-6 py-4">Title</th>
                                                <th scope="col" class="px-6 py-4">Category</th>
                                                <th scope="col" class="px-6 py-4">Writer</th>
                                                <th scope="col" class="px-6 py-4">Created At</th>
                                                <th scope="col" class="px-6 py-4">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($articles as $article)
                                            <tr class="border-b dark:border-neutral-500"
                                                onclick="window.location='{{ route('public.show', $article->id) }}';"
                                                style="cursor:pointer;">
                                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{$article->id}}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">{{$article->title}}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{$article->category->name}}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">{{$article->user->name}}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{$article->created_at}}</td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <x-link :href="route('articles.edit', $article->id)">Edit</x-link>
                                                    <form action="{{ route('articles.destroy', $article->id) }}"
                                                        method="POST" onsubmit="return confirm('Are you sure?');"
                                                        style="display: inline-block;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <x-danger-button class="ml-3">Delete</x-danger-button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div
                                        class="border-ts border-gray-900 bg-gray-300 dark:bg-gray-800 px-4 py-3 sm:px-6">
                                        {{ $articles->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</x-app-layout>