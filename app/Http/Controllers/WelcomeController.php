<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->paginate(5);
        $categories = Category::latest()->paginate(5);
        return view('welcome', compact('menus', 'categories'));
    }
}
