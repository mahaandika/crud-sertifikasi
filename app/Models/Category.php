<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Category extends Model
    {
        use HasFactory, HasUuids;

        protected $keyType = 'string';
        public $incrementing = false;   
        
        protected $fillable = ['name'];

        public function menus()
        {
            return $this->hasMany(Menu::class);
        }
    }
