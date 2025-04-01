<x-layouts.app :title="__('Edit Kategori')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Kategori</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('categories.update', $category->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label for="name">Nama Kategori</label>
                                    <input type="text" name="name" class="form-control" id="name" 
                                        value="{{ old('name', $category->name) }}" 
                                        placeholder="Masukkan nama kategori" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-layouts.app>