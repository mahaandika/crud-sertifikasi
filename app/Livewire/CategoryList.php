<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;
    
    public $search = '';
    public $categoryId;
    public $name;
    public $isOpen = false;
    public $categoryToDelete;
    public $showDeleteModal = false;
    
    protected $listeners = ['refresh' => '$refresh'];
    
    public function render()
    {
        $query = Category::query();
        
        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }
        
        $categories = $query->latest()->paginate(10);
        
        return view('livewire.category-list', compact('categories'));
    }
    
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    
    public function openModal()
    {
        $this->isOpen = true;
    }
    
    public function closeModal()
    {
        $this->isOpen = false;
    }
    
    public function resetInputFields()
    {
        $this->name = '';
        $this->categoryId = null;
    }
    
    public function store()
{
    $this->validate([
        'name' => 'required|string|max:255',
    ]);

    if ($this->categoryId) {
        // Update kategori jika sedang dalam mode edit
        $category = Category::findOrFail($this->categoryId);
        $category->update(['name' => $this->name]);
        session()->flash('message', 'Kategori berhasil diperbarui.');
    } else {
        // Tambah kategori baru jika tidak dalam mode edit
        Category::create(['name' => $this->name]);
        session()->flash('message', 'Kategori berhasil ditambahkan.');
    }

    $this->resetForm();
}

private function resetForm()
{
    $this->categoryId = null;
    $this->name = '';
    $this->isOpen = false; // Tutup modal setelah proses selesai
}


    public function edit($id)
{
    $category = Category::findOrFail($id); 
    $this->categoryId = $category->id;
    $this->name = $category->name;
    $this->isOpen = true; // Menampilkan modal
}

    
    // public function edit($id)
    // {
    //     $category = Category::findOrFail($id);
    //     $this->categoryId = $id;
    //     $this->name = $category->name;
        
    //     $this->openModal();
    // }
    
    // public function delete()
    // {
    //     $category = Category::find($this->categoryToDelete);
    //     if ($category) {
    //         $category->delete();
    //         session()->flash('message', 'Kategori berhasil dihapus.');
    //     }
    //     $this->showDeleteModal = false;
    //     $this->categoryToDelete = null;
    // }
}
