<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class FoodCard extends Component
{
     protected $queryString = ['selectedCategory'];
     public $selectedCategory = null;

    public function updatedSelectedCategory()
    {
        // Refresh data saat kategori berubah
        $this->render();
    }

    public function render()
    {
        $categories = Category::latest()->get();

        if (!$this->selectedCategory) {
            // Jika tidak ada kategori yang dipilih, tampilkan semua menu
            $menus = Menu::latest()->get();
        } else {
            // Jika ada kategori yang dipilih (berupa nama kategori), tampilkan menu berdasarkan kategori tersebut
            $menus = Menu::whereHas('category', function ($query) {
                $query->where('category_id', $this->selectedCategory);
            })->latest()->get();
        }

        return view('livewire.food-card', compact('menus', 'categories'));
    }

}
