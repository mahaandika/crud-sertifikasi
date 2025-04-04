<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['category_id', 'name', 'description', 'price', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
