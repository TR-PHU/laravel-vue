<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function articles() {
        return $this->belongsToMany('App\Models\Article');
    }
    
    public function parentCategory() {
         return $this->belongsTo('App\Models\Category');
    }

    public function children() {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }
}
