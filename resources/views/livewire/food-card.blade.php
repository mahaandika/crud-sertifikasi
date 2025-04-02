<div>
    <div class="filter">
        <form class="max-w-sm mx-auto" method="GET" id="filterForm">
    <label for="categories" class="block mb-2 text-xl font-medium text-gray-900">
        Pilih kategori makanan
    </label>
    <select
        id="categories"
        name="selectedCategory"
        wire:model="selectedCategory"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        onchange="document.getElementById('filterForm').submit();"
    >
        <option value="">Semua</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</form>

    </div>

    <div class="card flex justify-center gap-x-3 mt-8 pb-8">
        <div class="grid grid-cols-3 grid-rows gap-4">
            @foreach ($menus as $menu)
                <div>
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
                        <img class="rounded-t-lg" src="{{ asset('storage/' . $menu->image) }}" alt=""/>
                        <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                {{ $menu->name }}
                            </h5>
                            <p class="mb-3 font-normal text-gray-700">
                                {{ $menu->description }}
                            </p>
                            <p class="font-semibold mb-5">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                            <div class="flex justify-center">
                                <a href="https://www.whatsapp.com/" 
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    Pesan Sekarang
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" 
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
