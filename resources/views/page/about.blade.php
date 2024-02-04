<x-app-layout>
    <div class="container mx-auto p-8 flex">
        <div class="w-2/3 pr-8">
            <h1 class="text-3xl font-semibold mb-4">About Me</h1>
            <p class="text-gray-700 mb-4">
                Hello there! I'm Deklan Malik Akbar. I'm currently a fifth-semester student majoring in Computer Science
                at ITENAS (Institut Teknologi Nasional Bandung). I have a keen interest in and dedication to the field
                of
                information technology. Throughout my academic journey, I've delved into various aspects of IT,
                including programming, software development, and other informatics-related topics.
            </p>
            <p class="text-gray-700 mb-4">
                As a Computer Science student, I enjoy exploring new concepts, tackling technical challenges, and
                staying abreast of the ever-evolving world of technology. If there's anything you'd like to discuss or
                if you have further questions, feel free to ask! I'm always happy to share my knowledge and experiences
                in the IT realm.
            </p>
        </div>

        <div class="w-1/3">
            <img src="{{ asset('img/foto.jpeg') }}" alt="Your Profile Image" class="rounded-full h-48 w-48 object-cover">
        </div>

    </div>


    <div class="container mx-auto p-8 flex">
        <div
            class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl dark:text-white">
                Tech Stack
            </h5>
            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Proficient in the following tech stack</p>
            <ul class="my-4 space-y-3">
                <li>
                    <a href="#"
                        class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                        <img width="30dp" src="{{ asset('img/laravel.svg') }}" alt="Laravel">
                        <span class="flex-1 ms-3 whitespace-nowrap">Laravel</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                        <img width="30dp"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFKUlEQVR4nO2ZW4hWVRTHfzaWoygzJlkgWtRQDwpF4jCYyPhQD13HiEyzXrtpN+liPagvZVcVKqaiabLspaAsRwZyLloWKFIP5SSaVFSWD0oXmxltvi8WrAOLxT5nnzPfmUjwDwu+b5+111lrn7XXZW84g9MX04DZwExgHKcJzgFWAYeAqqHfgfeBxcBZERl1wAJgJfAy8KzKnDPWyp8L7HGKh+hboC3li60Gvs+Y+wEwfSyUFxf5xL3sOPAlcCxFmY+MMsuBozmMr+oCNJZtwC3mBRVdyQnmeRPwnBpllfkF6AkoeQRoB+4H7gHeU7nJ8zfLNmC7ES4+m+VmnRmrK3tnqe4lj6XOiCvLUn4qcFKFntT/MTwfUP5ToD4y7y3D/0JJ+tNqhH6Wg7/NGGxJVveuyNyr3NcqBXcaoW9EeK8Hhg3/QWCn+T8C3J4xfzzwt/L+k+JqhfG4UWB9Bt8VwJ+G9wAwA5gM7DbjQ8D8DDkHDO+lZRjwmBG4IYXnAuBH5y4bda7QU8Ap8/xXzeAh7DV8zZSAB4zADh2brL7+DNCrmbhakP4A+jX83gxMUdlfG565ZecAEd6lblAtmYaAbpcYLy47CsVon5YD7bpfLLXrs30F5M2qRfE6zZQ+uyY+/pVLPP05q9JxLjtXArISOqZFn+hSCI0u+1rapCuzxoyd0HIiLy7ROVWlNSqzI+WdoktDXuFSgA04ATYxrQUuBAbNmJTDRfGwmS+yLlI3S8aSfJDQQJ5K9Wxgl0s864AlZkzC3Gbzf0/KJ24BHlKS3x4yx5bnm12f0arvHjFju1THVDzhVv0mHZ9iIs+IE7oop/t1BdxgkdsL1vclK6NNks0hUgkHMQn4zTDe6553BZTqC8hJ2ztC2wL8vQG+LY7nPvNMdJwYMuAaw7Q/0BpaN0pooeNpce73tlIlI7suCMi9NuBudl/eGDJgpWGQXtWj3iWZHQGeVea5KJ7gHTMum9ej261w4j4WrxieR0MGrIgYMN65WPcoDZBN7bHD+X99xIBHYi40EIgs1wU+tXz+NBeqqOJbIi60MCD3VsdTp71y8vyGkAET3QrLxrF4N/Ai2YDk2OwJfRzg78vBt8JVsqmd3WoXRtuM+9iSopIRRhs02oSUygqjIyY8D2nFi1aqucIomiR8B7XOFXSHciayZvX3B4F5ORPZXvN/SSCR7YwlMjRd73erZ9N6u6b9wUhkicFu+EEtT9Y6D7A6iE7n5RXekOHLHSnFnBRoedGUUsxtSnlnKItHUae5IXTyFiqBewqU0/0RWVWl41rSFy6nLWZlRBVP0qx8CLymB2C2oXl1FA1NKyWgySWZ7jFqKQfVVWxPLO1szZhnBIpwNMQt1lXu0wa9qMJyENCrX6fNhE3b1IgL14xmI1DCXAgzNcEkfKf0KCU5VtnofPwHPYoJYUOs5imKy4xAOXRKw3znWrt1VWe4wyr5WpdnyFlveMX4mjHBJJMTkYiwPJB4Dpr/w4FS2cO60B2UhMNGaNaxoODulJA4bDq8LHyR0W+MGi8aoXIEnoV6PcX2BsgJXAzTTN0zXOZNzVyXeJYFeKRGuS1wAWipUy9B8izUNkpGpzNiq5bcckX0OvBTQOEevWaqulzytDt5ngQ86VxPqtBS0eiaiiw6qhsaLcC2pvAd0ebpLze+fazunqdrOZCm+GG9TxBf9pBk9U0O4z/PeY1VE+ZonS8x+yU9gmnJccktq3q13kr+7BT/TnvdaL3/f8L52luUfi98BvxH+BdKIjo66P3ToAAAAABJRU5ErkJggg==">
                        <span class="flex-1 ms-3 whitespace-nowrap">React.Js</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                        <img width="30dp"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACp0lEQVR4nO2Xz2sTQRTHt2D1Iijaf8FLLUmazc4ktiH9kZ3ZJN15AclBLwpCbnqsJxNoERuVHCzqQaGQVElprQh68yD0UBE8F+zFm4p67sGQkUm7yWa7m2SLUgLzgWGZfW/fe1/m5yqKRCKRSCQSieRYQRR2kMFyiqIMKYMIpsCbjbD3ykALoMCVQQRLAccMliNwQDABZzFhJUzZL/EUfaULiReJkWSFbhm1TENbim6pD9URvznUZO5MtxHoqyZVzQ9jks0jyn7YgyHKfmMCtw3DONVReDFxIrlCy+l188/c6ywXbeq5zgMFtR5a1Kq5Yu6kaw7KbmECP+05sKPvuyZETUAUvnQEdbR9O2PCf6ZC5401c88qvNU2s1wrxXjgTpgHC+re+CKat4rpJwe2CfBVEyKs7jB81HTzmnh2vCesLoIba2bjUPEHjbxM80AhvC+iqDZaAhw5MIFtkQMT2HYV4FITpnDdtaZOx+wV23E+JPrO4PGn067FW23iUaIpQIyGJcBvDtzFXyNwtcO/1xbmtEfLk5yspj0FZDaAR+5FufDzitErB3aOSDk+g8uTX8XTbkeEvTuSgEgp1izUS0SyYvxXAYjCLiZw+UjB0f1LzXkef9x9KsWfTLsKEFPAzxTSOv17F9jLHipGrEXKaW3OU4BRM1vx3BYlMuCG10bhsug/YQpTXQUgAm/c7OK9XUD4rrYcLITrQgR+MOFafGrdrOtVY7mdgzE/WzX28ifwVqPmxcM/E9QEzyFq78s7Vn+0OHp6fAFtBgrhxuwKbS/gV8D1auoDeUbOOWO0Dyb43s9hqar54SiBm86DTnyvzWbPK/+C0AK+gJZinzMbjOurqV29oo/1+qZ5dRBXAwLfrKtEX/59Xm8kEolEIpFIJBKJRBkU/gIP08f/AcFN4wAAAABJRU5ErkJggg==">
                        <span class="flex-1 ms-3 whitespace-nowrap">Node js</span>
                    </a>
                </li>

            </ul>

        </div>
    </div>

</x-app-layout>
