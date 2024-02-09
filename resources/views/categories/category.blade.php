<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Homepage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col bg-white dark:bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <a href="{{ route('categories.create_categories') }}"><button class="mx-6 mt-6 text-black px-4 py-2 rounded" style="background-color: #0084ff;">Create Categories</button></a>
              <table class="table-fixedx border-collapse border border-gray-300 hover:table-striped m-6">
                <thead>
                  <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Action</th>
                  </tr>
                </thead>
                @foreach($category as $item)
                <tbody>
                  <tr>
                    <td class="border px-4 py-2">{{ $item->name }}</td>
                    <td class="border px-4 py-2">
                      <a href="{{ route('categories.edit_categories', ['category' => $item->id]) }}"><button style="background-color: #ffe600; color: #000000;" class="px-4 py-2 rounded">Edit</button></a>
                      <form method="POST" action="{{ route('categories.destroy_categories', ['category' => $item->id]) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color: #ff0000; color: #000000;" class="px-4 py-2 rounded" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                      </form>
                  </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
              <div class="mx-6 my-6">
                {{ $category->links() }}
              </div>
            </div>
        </div>
    </div>
</x-app-layout>
 