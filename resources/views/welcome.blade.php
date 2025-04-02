<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600"
            rel="stylesheet"
        />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <!-- Styles / Scripts -->
        <style>
            * {
                scroll-behavior: smooth;
            }
        </style>
    </head>
    <body class="!scroll-smooth">
        <header>
            <nav
                class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600"
            >
                <div
                    class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"
                >
                    <h1 class="text-2xl dark:text-white font-bold capitalize">
                        food court
                    </h1>
                    <button
                        data-collapse-toggle="navbar-sticky"
                        type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-sticky"
                        aria-expanded="false"
                    >
                        <span class="sr-only">Open main menu</span>
                        <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 17 14"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15"
                            />
                        </svg>
                    </button>
                    <div
                        class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                        id="navbar-sticky"
                    >
                        <ul
                            class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
                        >
                            <li>
                                <a
                                    href="#"
                                    class="block py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:p-0 dark:text-white hover:text-blue-500"
                                    aria-current="page"
                                    >Home</a
                                >
                            </li>
                            <li>
                                <a
                                    href="#about"
                                    class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                                    >About Us</a
                                >
                            </li>
                            <li>
                                <a
                                    href="#product"
                                    class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                                    >Products</a
                                >
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                                    >Contact</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main class="scroll-smooth">
            <section
                class="banner bg-gradient-to-r from-violet-200 to-pink-200 min-h-screen pt-5 flex items-center justify-center"
            >
                <div
                    class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12"
                >
                    <h1
                        class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl"
                    >
                        Savor the Taste of Authentic Culinary Delights
                    </h1>
                    <p
                        class="mb-8 text-lg font-normal text-gray-600 lg:text-xl sm:px-16 xl:px-48"
                    >
                        Welcome to our restaurant, where passion for food meets
                        exceptional dining experience. Explore our menu crafted
                        with the finest ingredients and enjoy moments that
                        celebrate flavors, community, and joy.
                    </p>
                    <div
                        class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4"
                    >
                        <a
                            href="#about"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900"
                        >
                            Scroll more
                            <svg
                                class="ml-2 -mr-1 w-5 h-5 rotate-90"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </section>

            <section
                id="about"
                class="about min-h-screen bg-gradient-to-r from-blue-200 to-cyan-200 pt-20"
            >
                <div class="title text-center">
                    <h1 class="text-4xl font-bold capitalize">about us</h1>
                    <p
                        class="mb-8 mt-3 text-lg font-normal text-gray-600 lg:text-xl sm:px-16 xl:px-48"
                    >
                        Welcome to our restaurant, where passion for food meets
                        exceptional dining experience. Explore our menu crafted
                        with the finest ingredients and enjoy moments that
                        celebrate flavors, community, and joy.
                    </p>
                </div>

                <div class="about-con bg-transparent flex justify-center mt-10">
                    <div class="img">
                        <img
                            class="w-[300px] rounded-md"
                            src="{{
                                asset(
                                    'img/6019f4e85168f1938627b817e73d5de4.jpg'
                                )
                            }}"
                            alt=""
                        />
                    </div>
                    <div class="mt-3">
                        <div class="para w-[500px] font-semibold ms-5">
                            <p>
                                At Food Court, we are passionate about creating
                                unforgettable dining experiences. Established
                                with a vision to bring people together through
                                exceptional cuisine, our team is dedicated to
                                crafting dishes that combine fresh, local
                                ingredients with culinary artistry. Whether
                                you're savoring our signature creations or
                                enjoying a casual gathering, we aim to provide
                                moments of joy and connection. Join us as we
                                celebrate the beauty of good food and great
                                company.
                            </p>
                        </div>
                        <div class="para w-[500px] mt-5 font-semibold ms-5">
                            <p>
                                At Food Court, our mission is to offer dining
                                experiences that leave lasting impressions.
                                Founded with a heartfelt vision to unite people
                                through the joy of exceptional cuisine, we take
                                pride in preparing dishes that blend the finest,
                                freshest local ingredients with refined culinary
                                craftsmanship.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center items-center mt-10">
                    <a
                        href="#product"
                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900"
                    >
                        See our Products
                        <svg
                            class="ml-2 -mr-1 w-5 h-5 rotate-90"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </a>
                </div>
            </section>

            <div>
                <section
                    id="product"
                    class="product bg-gradient-to-r from-violet-200 to-pink-200 min-h-screen pt-20"
                >
                    <div class="title text-center">
                        <h1 class="text-4xl font-bold capitalize">
                            our products 
                        </h1>
                        <p
                            class="mb-5 mt-3 text-lg font-normal text-gray-600 lg:text-xl sm:px-16 xl:px-48"
                        >
                            Discover our carefully curated selection of dishes,
                            crafted to satisfy every palate. From timeless
                            classics to innovative creations, our menu showcases
                            the freshest ingredients and the artistry of our
                            chefs.
                        </p>
                    </div>

                    @livewire('food-card')
                </section>
            </div>
        </main>
    </body>
</html>
