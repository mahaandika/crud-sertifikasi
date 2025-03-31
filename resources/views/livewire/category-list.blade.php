<div>
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6">
                <h2>Daftar Kategori</h2>
            </div>
            <div class="col-md-6 text-end">
                <button wire:click="create()" class="btn btn-primary">Tambah Kategori</button>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <input wire:model.live="search" type="text" class="form-control" placeholder="Cari kategori...">
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
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">No</th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Nama</th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Tanggal Dibuat</th>
                                <th width="150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at->format('d/m/Y H:i') }}</td>
                                    {{-- <td class="px-4 py-3 flex items-center justify-end">
                                        <button wire:click="edit({{ $category->id }})" >Edit</button>
                                        <button wire:click="delete({{ $category->id }})"  onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                                    </td> --}}
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <a href="{{ route('categories.edit', $category->id) }}" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:outline-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Edit
                                        </a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="ml-3">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ml-3 rounded-lg bg-red-700 px-3 py-2 text-center text-xs font-medium text-white hover:bg-red-800" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data kategori</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                {{ $categories->links() }}
            </div>
        </div>
    </div>
    
    <!-- Modal Form -->
    <div class="modal fade {{ $isOpen ? 'show' : '' }}" tabindex="-1" role="dialog" style="{{ $isOpen ? 'display: block; ' : 'display: none;' }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $categoryId ? 'Edit Kategori' : 'Tambah Kategori' }}</h5>
                    <button type="button" class="btn-close" wire:click="closeModal()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="form-group mb-3">
                            <label for="name">Nama Kategori</label>
                            <input type="text" wire:model="name" class="form-control" id="name" placeholder="Masukkan nama kategori">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
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