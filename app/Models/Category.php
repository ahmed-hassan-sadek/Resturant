<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id' , 'created_at' , 'updated_at'];

    public function items()
    {
        return $this->hasMany(Item::class , 'category_id' , 'id');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class , 'category_id' , 'id');
    }
}
