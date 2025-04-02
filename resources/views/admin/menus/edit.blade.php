<x-layouts.app :title="__('Edit Menu')">
    <div class="max-w-3xl mx-auto p-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Edit Menu</h2>

            <form method="POST" action="{{ route('menus.update', $menu->id) }}" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Nama Menu</label>
        <input type="text" name="name" id="name" 
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2"
            value="{{ old('name', $menu->name) }}" 
            placeholder="Masukkan nama menu" required>
        @error('name')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
        <select name="category_id" id="category_id" 
            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2">
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $menu->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <!-- Current Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                    <div class="relative w-[200px] h-[200px]">
                        <img src="{{ asset('storage/' . $menu->image) }}" alt="Hero Slider Image" class="w-[200px] h-[200px] object-cover bg-gray-50 rounded border border-gray-200">
                    </div>
                </div>

                <!-- New Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">New Image (Optional)</label>
                    <div class="mt-1 border border-gray-300 border-dashed rounded-md p-2">
                        <div class="flex flex-col items-center">
                            <label for="image" class="w-full cursor-pointer">
                                <div class="flex items-center justify-center space-x-2">
                                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    <span class="text-sm text-blue-600 hover:text-blue-500">Upload new image</span>
                                </div>
                                <p class="text-xs text-center text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                
                                <input id="image" 
                                       name="image" 
                                       type="file" 
                                       accept="image/*" 
                                       class="sr-only"
                                       onchange="showPreview(event)">
                            </label>

                            <!-- Preview container -->
                            <div id="imagePreview" class="mt-2 flex flex-wrap gap-2 w-full">
                            </div>
                        </div>
                    </div>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

    

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Menu</label>
        <textarea name="description" id="description"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2"
            placeholder="Masukkan Deskripsi">{{ old('description', $menu->description) }}</textarea>
        @error('description')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
        <input type="number" step="0.01" name="price" id="price"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2"
            value="{{ old('price', $menu->price) }}" placeholder="Masukkan harga menu" required>
        @error('price')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex justify-between">
        <a href="/menus">
            <button type="button"
            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</button>
        </a>
        <button type="submit" 
            class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Simpan Perubahan</button>
    </div>
</form>

        </div>
    </div>

    <script>
function showPreview(event) {
    const previewContainer = document.getElementById('imagePreview');
    previewContainer.innerHTML = '';

    const file = event.target.files[0];
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();

        reader.onload = function(e) {
            const div = document.createElement('div');
            div.className = 'relative w-[100px] h-[100px]';

            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'w-[100px] h-[100px] object-cover bg-gray-50 rounded border border-gray-200';

            div.appendChild(img);
            previewContainer.appendChild(div);
        }

        reader.readAsDataURL(file);
    }
}
</script>
</x-layouts.app>
