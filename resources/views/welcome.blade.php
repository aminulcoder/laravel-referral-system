<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,100..900;1,100..900&family=Fira+Code:wght@300..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">>


    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('custom.css') }}">
    @endif
</head>

<body class="">

    <div class="bg-[#007bff]">
        @php
            use Carbon\Carbon;
            $dateTime = Carbon::parse('2025-02-27 20:57:09')->format('d M Y, h:i:s A');
        @endphp
        <div class="w-[1280px] py-6  flex justify-between items-center bg-[#007bff] text-white  mx-auto">
            <p class="text-xl">Welcome to Oitila</p>
            <div class="flex  items-center space-x-2">
                <p class="text-xl">Sever Time :</p>
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <div class="">
                        <p class="">📅 {{ $dateTime }}</p>
                    </div>
                </div>
                {{--
                <div class=" space-x-2">
                    <a href="">Login</a>
                    or
                    <a href="" class="bg-white text-blue-500 px-3 py-2 rounded-3xl">Register</a>


                </div> --}}


                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 space-x-2 justify-end items-center">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="">
                                Log in
                            </a>
                            {{-- <a href="{{ route('referral.page') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Affiliate
                        </a> --}}

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-white text-blue-500 px-3 py-2 rounded-3xl">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </div>
    </div>

    <div class="w-[1280px] container mx-auto bg-white flex justify-between ">
        <div class="py-2">
            <a href="#">
                <img src="https://oitila.netlify.app/live/assets/img/logo2.png" alt="" srcset="">
            </a>
        </div>
        <nav class="bg-white text-blue-500 p-4 z-50 flex items-center space-x-4 ">
            <ul class="flex space-x-6 items-center">
                <!-- Dropdown Menu -->
                <li class="relative">
                    <button id="dropdownBtn" class="hover:text-yellow-300 focus:outline-none flex items-center">
                        Home
                        <svg id="arrowIcon" class="w-5 h-5 ml-2 transition-transform duration-300" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <ul id="dropdownMenu"
                        class="absolute left-0 hidden bg-white border border-gray-200 mt-2 rounded-md shadow-lg w-40 z-50">
                        <li><a href="#" class="block px-4 py-2 text-blue-500 hover:bg-gray-300">Home 1</a></li>
                        <li><a href="#" class="block px-4 py-2 text-blue-500 hover:bg-gray-300">Home 2</a></li>
                        <li><a href="#" class="block px-4 py-2 text-blue-500 hover:bg-gray-300">Home 3</a></li>
                        <li><a href="#" class="block px-4 py-2 text-blue-500 hover:bg-gray-300">Home 4</a></li>
                    </ul>
                </li>


                <li><a href="#" class="hover:text-yellow-300">About Us</a></li>
                <!-- Dropdown Menu -->
                <li class="relative">
                    <button id="dropdownBtn" class="hover:text-yellow-300 focus:outline-none flex items-center">
                        Dashboard
                        <svg id="arrowIcon" class="w-5 h-5 ml-2 transition-transform duration-300" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <ul id="dropdownMenu"
                        class="absolute left-0 hidden bg-white border border-gray-200 mt-2 rounded-md shadow-lg w-40 z-50">
                        <li><a href="#" class="block px-4 py-2 text-blue-500 hover:bg-gray-300">Home 1</a></li>
                        <li><a href="#" class="block px-4 py-2 text-blue-500 hover:bg-gray-300">Home 2</a></li>
                        <li><a href="#" class="block px-4 py-2 text-blue-500 hover:bg-gray-300">Home 3</a></li>
                        <li><a href="#" class="block px-4 py-2 text-blue-500 hover:bg-gray-300">Home 4</a></li>
                    </ul>
                </li>
                <!-- Dropdown Menu -->
                <li class="relative">
                    <button id="dropdownBtn" class="hover:text-yellow-300 focus:outline-none flex items-center">
                        Pages
                        <svg id="arrowIcon" class="w-5 h-5 ml-2 transition-transform duration-300" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <ul id="dropdownMenu"
                        class="absolute left-0 hidden bg-white border border-gray-200 mt-2 rounded-md shadow-lg w-40 z-50">
                        <li><a href="#" class="block px-4 py-2 text-blue-500 hover:bg-gray-300">Home 1</a></li>
                        <li><a href="#" class="block px-4 py-2 text-blue-500 hover:bg-gray-300">Home 2</a></li>
                        <li><a href="#" class="block px-4 py-2 text-blue-500 hover:bg-gray-300">Home 3</a></li>
                        <li><a href="#" class="block px-4 py-2 text-blue-500 hover:bg-gray-300">Home 4</a></li>
                    </ul>
                </li>
                <!-- Dropdown Menu -->
                <li class="relative">
                    <button id="dropdownBtn" class="hover:text-yellow-300 focus:outline-none flex items-center">
                        Blog
                        <svg id="arrowIcon" class="w-5 h-5 ml-2 transition-transform duration-300" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <ul id="dropdownMenu"
                        class="absolute left-0 hidden bg-white border border-gray-200 mt-2 rounded-md shadow-lg w-40 z-50">
                        <li><a href="#" class="block px-4 py-2 text-blue-500 hover:bg-gray-300">Home 1</a></li>
                        <li><a href="#" class="block px-4 py-2 text-blue-500 hover:bg-gray-300">Home 2</a></li>
                        <li><a href="#" class="block px-4 py-2 text-blue-500 hover:bg-gray-300">Home 3</a></li>
                        <li><a href="#" class="block px-4 py-2 text-blue-500 hover:bg-gray-300">Home 4</a></li>
                    </ul>
                </li>
                <li><a href="#" class="hover:text-yellow-300">Contact</a></li>
            </ul>
            <a href="{{ route('referral.page') }}"
                class="bg-gradient-to-r from-blue-500 to-purple-600 text-white  px-3 py-2 rounded-3xl">Join Now</a>
        </nav>
    </div>


    <div class="bg-blue-500 h-[90vh]">
        <div class="w-[1280px] mx-auto bg-blue-500 text-white space-y-6">
            <p class="text-2xl pt-20 font-semibold">Want to Invest Money?</p>
            <h1 class="text-7xl  font-semibold">Grow your money with <br> safety invest in Oitila</h1>
            <p class="font-semibold">We Already Completed Our 50+ Years in Online Investment Business
                With Trust and Excellent Reputation.</p>

            <div class="py-16">
                <a href="#" class="bg-white text-blue-500  rounded-3xl px-3 py-2">

                    Start Investing Now
                </a>
            </div>
        </div>
    </div>


    <div class="w-full max-w-screen-xl mx-auto z-50 -mt-32">
        <div class="flex  space-x-6 py-20 px-6 border-2 rounded-md shadow-2xl bg-white">
            <!-- Register Account -->
            <div
                class="flex items-center space-x-6 w-full md:w-1/3 hover:scale-105 transition-transform duration-300 ease-in-out">
                <img src="https://oitila.netlify.app/live/assets/img/svg/add-user.svg" class="h-20" alt="">
                <div class="space-y-2">
                    <h6 class="text-2xl font-semibold">Register Account</h6>
                    <p class="text-sm text-gray-500">Register for an account. <br> It's totally easy and free.</p>
                </div>
            </div>

            <!-- Invest Money -->
            <div
                class="flex items-center space-x-6 w-full md:w-1/3 hover:scale-105 transition-transform duration-300 ease-in-out">
                <img src="https://oitila.netlify.app/live/assets/img/svg/coin.svg" class="h-20" alt="">
                <div class="space-y-2">
                    <h6 class="text-2xl font-semibold">Invest Money</h6>
                    <p class="text-sm text-gray-500">Choose your investment plan <br> and make the first deposit.</p>
                </div>
            </div>

            <!-- Get Withdraw -->
            <div
                class="flex items-center space-x-6 w-full md:w-1/3 hover:scale-105 transition-transform duration-300 ease-in-out">
                <img src="https://oitila.netlify.app/live/assets/img/svg/add-user.svg" class="h-20" alt="">
                <div class="space-y-2">
                    <h6 class="text-2xl font-semibold">Get Withdraw</h6>
                    <p class="text-sm text-gray-500">Request for the withdrawal <br> and receive a payment.</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-gray-900">
        <div class=" w-[1280px] mx-auto grid grid-cols-12 py-16 gap-6 ">
            <div class="col-span-4 space-y-3">
                <img src="https://oitila.netlify.app/live/assets/img/logo.png" alt="" srcset="">

                <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis commodi ut
                    illum. Cumque, unde suscipit error!</p>

                <div class=" flex items-center space-x-4">
                    <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                            clip-rule="evenodd" />
                    </svg>

                    <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M22 5.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.343 8.343 0 0 1-2.605.981A4.13 4.13 0 0 0 15.85 4a4.068 4.068 0 0 0-4.1 4.038c0 .31.035.618.105.919A11.705 11.705 0 0 1 3.4 4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 6.1 13.635a4.192 4.192 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 2 18.184 11.732 11.732 0 0 0 8.291 20 11.502 11.502 0 0 0 19.964 8.5c0-.177 0-.349-.012-.523A8.143 8.143 0 0 0 22 5.892Z"
                            clip-rule="evenodd" />
                    </svg>

                    <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z"
                            clip-rule="evenodd" />
                    </svg>
                    <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z"
                            clip-rule="evenodd" />
                    </svg>


                </div>
            </div>


            <div class="col-span-2 text-white space-y-8">
                <h2 class="text-xl font-semibold">Useful links</h2>

                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Affiliate</a></li>
                    <li><a href="#">Pricing Plan</a></li>
                    <li><a href="#">Profit</a></li>
                    <li><a href="#">Terms & Policy</a></li>
                </ul>
            </div>
            <div class="col-span-6 text-white space-y-8">
                <h2 class="text-xl font-semibold">Subscribe To Our Newsletter</h2>

                <ul class=" space-y-3">
                    <form action="">
                        <input type="email"
                            class="w-full md:w-96 placeholder:text-white border-b border-gray-300 bg-transparent px-2 py-2 text-white focus:outline-none "
                            placeholder="Enter your Email Address">
                        <div class=" pt-3">

                            <button class="bg-gradient-to-r from-blue-500 to-purple-600 border rounded-3xl px-3 py-2">Subscribe</button>
                        </div>
                    </form>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi <br> accusamus labore
                        recusandae! Quia sint consectetur explicabo.</p>
                </ul>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dropdownBtn = document.getElementById("dropdownBtn");
            const dropdownMenu = document.getElementById("dropdownMenu");
            const arrowIcon = document.getElementById("arrowIcon");

            dropdownBtn.addEventListener("click", function(event) {
                dropdownMenu.classList.toggle("hidden");
                arrowIcon.classList.toggle("rotate-180");
                event.stopPropagation();
            });

            document.addEventListener("click", function(event) {
                if (!dropdownBtn.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add("hidden");
                    arrowIcon.classList.remove("rotate-180");
                }
            });
        });
    </script>
</body>

</html>
