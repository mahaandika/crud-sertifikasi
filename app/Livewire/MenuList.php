<?php

namespace App\Livewire;

use App\Models\Menu;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class MenuList extends Component
{
    use WithPagination, WithFileUploads;
    
    public $search = '';
    public $categoryFilter = '';
    public $menuId;
    public $name;
    public $image;
    public $description;
    public $price;
    public $category_id;
    public $oldImage;
    public $isOpen = false;
    
    protected $listeners = ['refresh' => '$refresh'];
    
    public function render()
    {
        $query = Menu::query();
        
        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }
        
        if ($this->categoryFilter) {
            $query->where('category_id', $this->categoryFilter);
        }
        
        $menus = $query->with('category')->latest()->paginate(10);
        $categories = Category::all();
        
        return view('livewire.menu-list', compact('menus', 'categories'));
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
        $this->menuId = '';
        $this->name = '';
        $this->category_id = '';
        $this->description = '';
        $this->price = '';
        $this->image = null;
        $this->oldImage = null;
    }
    
    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Simplified validation
        ]);
        
        // Generate a new UUID for the menu if it's a new entry
        $menuId = $this->menuId ?? (string) \Illuminate\Support\Str::uuid();

        // Initialize the image URL
        $imageUrl = $this->oldImage;

        // Handle the image upload
        if ($this->image) {
            // Delete the old image if it exists
            if ($this->oldImage) {
                Storage::disk('public')->delete($this->oldImage);
            }
            
            // Store the new image and get the path
            $imageUrl = $this->image->store('menus', 'public');
        }

        // Create or update the menu
        Menu::updateOrCreate(['id' => $menuId], [
            'name' => $this->name,
            'category_id' => $this->category_id,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $imageUrl,
        ]);
        
        session()->flash('message', $this->menuId ? 'Menu berhasil diperbarui.' : 'Menu berhasil ditambahkan.');
        
        $this->closeModal();
        $this->resetInputFields();
    }
    
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $this->menuId = $id;
        $this->name = $menu->name;
        $this->category_id = $menu->category_id;
        $this->oldImage = $menu->image_url;
        
        $this->openModal();
    }
    
    public function delete($id)
    {
        $menu = Menu::find($id);
        
        // Hapus gambar jika ada
        if ($menu->image_url) {
            Storage::disk('public')->delete($menu->image_url);
        }
        
        $menu->delete();
        session()->flash('message', 'Menu berhasil dihapus.');
    }
}
