<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'categories_id',
        'sub_categories_id',
        'name',
        'image',
        'price',
        'status',
        'description',
        'slug',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }


    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_categories_id');
    }
}
