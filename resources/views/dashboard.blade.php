<x-layouts.app :title="__('Dashboard')">
    <div
        class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700"
    >
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="48"
                        height="48"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="lucide lucide-chart-bar-stacked-icon lucide-chart-bar-stacked"
                    >
                        <path d="M11 13v4" />
                        <path d="M15 5v4" />
                        <path d="M3 3v16a2 2 0 0 0 2 2h16" />
                        <rect x="7" y="13" width="9" height="4" rx="1" />
                        <rect x="7" y="5" width="12" height="4" rx="1" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-700">
                        Kategori Menu
                    </h2>
                    <div class="flex items-baseline">
                        <p class="text-2xl font-bold text-gray-800">
                            {{ \App\Models\Category::count() }}
                        </p>
                        <p class="ml-2 text-sm text-gray-600">
                            Total Kategori Menus
                        </p>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <a
                    href="/categories"
                    class="inline-flex items-center text-sm text-blue-500 hover:text-blue-600"
                >
                    Lihat semua kategori menu
                    <svg
                        class="w-4 h-4 ml-1"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7"
                        />
                    </svg>
                </a>
            </div>
        </div>
        <!--  -->
        <div
            class="mt-5 relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700"
        >
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="48"
                            height="48"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-cooking-pot-icon lucide-cooking-pot"
                        >
                            <path d="M2 12h20" />
                            <path
                                d="M20 12v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8"
                            />
                            <path d="m4 8 16-4" />
                            <path
                                d="m8.86 6.78-.45-1.81a2 2 0 0 1 1.45-2.43l1.94-.48a2 2 0 0 1 2.43 1.46l.45 1.8"
                            />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-gray-700">
                            Menu
                        </h2>
                        <div class="flex items-baseline">
                            <p class="text-2xl font-bold text-gray-800">
                                {{ \App\Models\Menu::count() }}
                            </p>
                            <p class="ml-2 text-sm text-gray-600">
                                Total Menus
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <a
                        href="/menus"
                        class="inline-flex items-center text-sm text-blue-500 hover:text-blue-600"
                    >
                        Lihat semua menu
                        <svg
                            class="w-4 h-4 ml-1"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5l7 7-7 7"
                            />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
