<div>
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6">
                <h2>Daftar Menu</h2>
            </div>
            <div class="col-md-6 text-end">
                <button wire:click="create()" class="btn btn-primary">Tambah Menu</button>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-4">
                <input wire:model.live="search" type="text" class="form-control" placeholder="Cari menu...">
            </div>
            <div class="col-md-4">
                <select wire:model.live="categoryFilter" class="form-control">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Gambar</th>
                                <th>Tanggal Dibuat</th>
                                <th width="150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($menus as $menu)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $menu->name }}</td>
                                    <td>{{ $menu->kategori->name }}</td>
                                    <td>
                                        @if ($menu->image_url)
                                            <img src="{{ asset('storage/' . $menu->image_url) }}" alt="{{ $menu->name }}" width="50">
                                        @else
                                            <span class="text-muted">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>{{ $menu->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <button wire:click="edit({{ $menu->id }})" class="btn btn-sm btn-info">Edit</button>
                                        <button wire:click="delete({{ $menu->id }})" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">Hapus</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data menu</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                {{ $menus->links() }}
            </div>
        </div>
    </div>
    
    <!-- Modal Form -->
    <div class="modal fade {{ $isOpen ? 'show' : '' }}" tabindex="-1" role="dialog" style="{{ $isOpen ? 'display: block; background-color: rgba(0, 0, 0, 0.5);' : 'display: none;' }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $menuId ? 'Edit Menu' : 'Tambah Menu' }}</h5>
                    <button type="button" class="btn-close" wire:click="closeModal()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="form-group mb-3">
                            <label for="name">Nama Menu</label>
                            <input type="text" wire:model="name" class="form-control" id="name" placeholder="Masukkan nama menu">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="category_id">Kategori</label>
                            <select wire:model="category_id" class="form-control" id="category_id">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="image">Gambar</label>
                            <input type="file" wire:model="image" class="form-control" id="image">
                            <div wire:loading wire:target="image">Mengupload...</div>
                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                            
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="mt-2" width="100">
                            @elseif ($oldImage)
                                <img src="{{ asset('storage/' . $oldImage) }}" alt="Current Image" class="mt-2" width="100">
                            @endif
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal()">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>