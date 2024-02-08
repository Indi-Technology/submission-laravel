<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-3 flex flex-wrap">
                <div class="flex justify-between px-2 mx-auto max-w-screen-xl ">
                    <article
                        class="mx-auto w-full max-w-3xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                        <header class="mb-4 lg:mb-6 not-format mt-8">
                            <div class="flex justify-between">
                                <h1
                                    class="text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                                    <?php
                                    $titleWords = explode(' ', $article->title);
                                    $wordCount = count($titleWords);
                                    $threshold = 5; // Adjust this threshold as needed
                                
                                    foreach ($titleWords as $index => $word) {
                                        echo $word;
                                        if ($index < $wordCount - 1) {
                                            echo ' ';
                                        }
                                        if ($index === $threshold - 1) {
                                            echo '<br>'; // Insert line break after the fourth word
                                        }
                                    }
                                    ?>
                                </h1>
                                <h5
                                    class="text-sm font-normal leading-tight text-gray-900 lg:mb-6 lg:text-base dark:text-white">
                                    {{$article->category->name}}</h5>
                            </div>
                            <address class="flex items-center mb-6 not-italic">
                                <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                    <div>
                                        <a href="#" rel="author"
                                            class="text-xl font-bold text-gray-900 dark:text-white">by :
                                            {{$article->user->name}}</a>

                                        <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate
                                                datetime="2022-02-08" title="February 8th, 2022">{{
                                                $article->created_at->format('d F Y') }} / {{
                                                $article->created_at->diffForHumans() }}</time></p>
                                    </div>
                                </div>
                            </address>
                        </header>
                        @if($article->image_path!=null)
                        <center class="mb-4">
                            <figure>@if($article->image_path)
                                <img src="{{ asset('storage/uploads/' . $article->image_path) }}" width="500">
                                @else
                                <img src="{{asset('storage/uploads/no_image.png')}}" width="500">
                                @endif
                            </figure>
                        </center>
                        @else
                        @endif

                        <p class="lead pb-8 text-gray-900 dark:text-white"">{{$article->full_text}}</p>

                    </article>
                </div>
            </div>
        </div>

</x-app-layout>