<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Color;
use App\Models\Category;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Product $product)
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        $groups = Group::all();
        return view('products.edit', compact('tags','colors', 'categories', 'product', 'groups'));
        
    }
}
