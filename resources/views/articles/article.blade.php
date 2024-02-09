<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col bg-white dark:bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <a href="{{ route('articles.create_articles') }}"><button class="mx-6 mt-6 text-black px-4 py-2 rounded" style="background-color: #0084ff;">Create Article</button></a>
              <table class="table-fixedx border-collapse border border-gray-300 hover:table-striped m-6">
                <thead>
                  <tr>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Content</th>
                    <th class="px-4 py-2">Categories</th>
                    <th class="px-4 py-2">Tags</th>
                    <th class="px-4 py-2">Image</th>
                    <th class="px-4 py-2">Action</th>
                  </tr>
                </thead>
                @foreach($article as $item)
                <tbody>
                  <tr>
                    <td class="border px-4 py-2">{{ $item->title }}</td>
                    <td class="border px-4 py-2">{{ $item->content }}</td>
                    <td class="border px-4 py-2">{{ ($item->category)->name }}</td>
                    <td class="border px-4 py-2">
                        @foreach($item->articleTag as $tag)
                          {{($tag->tag)->name}}
                        @endforeach
                    </td>
                    <td class="border px-4 py-2"><img src="{{asset('storage/'.$item->image)}}" class="w-12"></td>
                    <td class="border px-4 py-2">
                      <a href="{{ route('articles.edit_articles', ['article' => $item->id]) }}"><button style="background-color: #ffe600; color: #000000;" class="px-4 py-2 rounded">Edit</button></a>
                      <form method="POST" action="{{ route('articles.destroy_articles', ['article' => $item->id]) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color: #ff0000; color: #000000;" class="px-4 py-2 rounded" onclick="return confirm('Are you sure you want to delete this articles?')">Delete</button>
                      </form>
                  </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
              <div class="mx-6 my-6">
                {{ $article->links() }}
              </div>
            </div>
        </div>
    </div>
</x-app-layout>
 