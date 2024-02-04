<x-app-layout>
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl mt-5">
        <article
            class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 rounded-full" src="{{ asset('img/avatar.png') }}" alt="avatar">
                        <div>
                            <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">
                                @if (Auth::check() || $post->user)
                                    <span class="font-medium dark:text-white">
                                        {{ Auth::check() ? Auth::user()->name : $post->user->name }}
                                    </span>
                                @endif
                            </a>
                            <p class="text-base text-gray-500 dark:text-gray-400">Graphic Designer, educator & CEO
                                Flowbite</p>
                            <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                    title="February 8th, 2022">{{ $post->created_at->format('d F Y') }}</time></p>
                        </div>
                    </div>
                </address>
                <h1
                    class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                    {{ $post->title }}</h1>
            </header>
            <p class="lead"> {{ $post->post }}</p>

            <figure>
                @if ($post->image)
                    <img src="{{ asset('storage/uploads/' . $post->image) }}" width="100" height="100">
                @else
                    <img src="{{ asset('storage/no_image.jpg') }}" width="100" height="100">
                @endif
                <figcaption>Digital art by Anonymous</figcaption>
            </figure>

            <section class="not-format">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion</h2>
                </div>
                <form class="mb-6" id="commentForm">
                    <div
                        class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="6"
                            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                            placeholder="Write a comment..." required></textarea>
                    </div>
                    <secondary-button>
                        <button type="submit" class="w-full">Post comment</button>
                    </secondary-button>
                </form>
                <div id="commentsContainer">

                </div>

                <script>
                    document.getElementById('commentForm').addEventListener('submit', function(event) {
                        event.preventDefault(); // Prevent form submission

                        // Get the value of the comment
                        var comment = document.getElementById('comment').value;

                        // Create a new article element for the comment
                        var article = document.createElement('article');
                        article.classList.add('p-6', 'mb-6', 'text-base', 'bg-white', 'rounded-lg', 'dark:bg-gray-900');

                        // Construct the inner HTML for the article
                        article.innerHTML = `
            <footer class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white">
                        <img class="mr-2 w-6 h-6 rounded-full" src="{{ asset('img/user.png') }}" alt="avatar">
                       @if (Auth::check() || $post->user)
                                    <span class="font-medium dark:text-white">
                                        {{ Auth::check() ? Auth::user()->name : $post->user->name }}
                                    </span>
                                @endif
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $post->created_at->format('d F Y') }}</p>
                </div>
                <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                    </svg>
                    <span class="sr-only">Comment settings</span>
                </button>
                <div id="dropdownComment1" class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                        <li><a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a></li>
                        <li><a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a></li>
                        <li><a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a></li>
                    </ul>
                </div>
            </footer>
            <p>${comment}</p>
            <div class="flex items-center mt-4 space-x-4">
                <button type="button" class="flex items-center font-medium text-sm text-gray-500 hover:underline dark:text-gray-400">
                    <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"/>
                    </svg>
                    Reply
                </button>
            </div>
        `;

                        // Append the new article to the comments container
                        document.getElementById('commentsContainer').appendChild(article);

                        // Clear the comment textarea
                        document.getElementById('comment').value = '';
                    });
                </script>

</x-app-layout>
