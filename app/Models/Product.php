<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Color;
use App\Models\ProductImage;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = false;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getImageUrlAttribute()
    {
        return url('storage/' . $this->preview_image);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class,'color_products','product_id', 'color_id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}
