<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto py-8">
                        <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                            <div class="col-span-4 sm:col-span-3">
                                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                                    <div class="flex flex-col items-center">
                                        <img src="{{asset('storage/me.jpg')}}"
                                            class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">

                                        </img>
                                        <h1 class="text-xl font-bold">Adecya Jalu Mahadwija</h1>
                                        <p>Web Developer</p>
                                    </div>
                                    <hr class="my-6 border-t border-gray-300">
                                    <div class="flex flex-col">
                                        <span class="uppercase font-bold tracking-wider mb-2">Skills</span>
                                        <ul>
                                            <li class="mb-2">Pyhton</li>
                                            <li class="mb-2">Django</li>
                                            <li class="mb-2">PHP</li>
                                            <li class="mb-2">HTML/CSS</li>
                                            <li class="mb-2">Tailwind Css</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-4 sm:col-span-9">
                                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                                    <h2 class="text-xl font-bold mb-4">About Me</h2>
                                    <p>As an experienced student in the field of programming, I
                                        have deep knowledge and proven skills in several programs I have created. Over 5
                                        years of learning in this industry, I have successfully developed a program. I
                                        possess abilities in both web programming and mobile programming. Additionally,
                                        I have a strong educational background in software engineering. I have good
                                        communication skills, am capable of working in teams, and am results-oriented.
                                        In my future career, my aim is to contribute to innovative projects and achieve
                                        the level of success I desire. I hope to contribute to this endeavor by bringing
                                        my knowledge, experience, and dedication.
                                    </p>

                                    <h3 class="font-semibold mt-10 -mb-2">
                                        Find me on
                                    </h3>
                                    <div class="flex  items-center gap-6 my-6">
                                        <a class="text-gray-100 hover:text-blue-600"
                                            aria-label="Visit TrendyMinds LinkedIn"
                                            href="https://www.linkedin.com/in/adecya-jalu-mahadwija" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-6">
                                                <path fill="currentColor"
                                                    d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
                                                </path>
                                            </svg>
                                        </a>
                                        <a class="text-gray-100 hover:text-blue-600"
                                            aria-label="Visit TrendyMinds Twitter" href="https://github.com/JaluDwija37"
                                            target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                            </svg>
                                        </a>
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