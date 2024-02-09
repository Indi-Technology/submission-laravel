<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('About Me') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
            <div class="flex flex-row grid grid-cols-6 gap-2 bg-white dark:bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative col-span-6 h-auto mx-4 my-4 overflow-hidden text-black bg-clip-border rounded-xl bg-blue-gray-500 shadow-blue-gray-500/40">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
                <div class="relative col-span-1 h-auto mx-4 my-4 overflow-hidden text-black bg-clip-border bg-blue-gray-500 shadow-blue-gray-500/40">
                    <img src="https://laiacc.com/wp-content/uploads/2019/03/blank-profile-picture-973460_1280-600x600.png" class="w-20">
                </div>
                <div class="relative col-span-5 h-auto mx-4 my-4 overflow-hidden text-black bg-clip-border rounded-xl bg-blue-gray-500 shadow-blue-gray-500/40">
                    <p>
                        Contact Person: <br>
                        <a href="https://instagram.com/sukmaglsv?igshid=YmMyMTA2M2Y=" target="_blank">
                            @sukmaglsv
                        </a><br>
                        <a href="mailto:sukmagladysv@gmail.com" target="_blank">
                            sukmagladysv@gmail.com
                        </a><br>
                        <a href="https://api.whatsapp.com/send?phone=085895792106" target="_blank">
                            0858-9579-2106
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
 