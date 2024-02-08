<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tag List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-link :href="route('tags.create')">Create
                Tag</x-link>
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
                                                <th scope="col" class="px-6 py-4">Tag</th>
                                                <th scope="col" class="px-6 py-4">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tags as $tag)
                                            <tr class="border-b dark:border-neutral-500">
                                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{$tag->id}}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">{{$tag->name}}</td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <x-link :href="route('tags.edit', $tag->id)">Edit
                                                    </x-link>
                                                    <form action="{{ route('tags.destroy', $tag->id) }}" method="POST"
                                                        onsubmit="return confirm('Are you sure?');"
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
                                        {{ $tags->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>