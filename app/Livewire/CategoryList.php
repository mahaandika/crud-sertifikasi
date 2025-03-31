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
        $this->categoryId = '';
    }
    
    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);
        
        Category::updateOrCreate(['id' => $this->categoryId], [
            'name' => $this->name
        ]);
        
        session()->flash('message', $this->categoryId ? 'Kategori berhasil diperbarui.' : 'Kategori berhasil ditambahkan.');
        
        $this->closeModal();
        $this->resetInputFields();
    }
    
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $id;
        $this->name = $category->name;
        
        $this->openModal();
    }
    
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('message', 'Kategori berhasil dihapus.');
    }
}
