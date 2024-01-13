<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

//        dd($data);

        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        unset($data['tags'], $data['colors']);

//        $product = Product::firstOrCreate([
//            'name' => $data['name'],
//            'description' => $data['description']
//        ], $data);

        $product = Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'preview_image' => $data['preview_image'],
            'price' => $data['price'],
            'count' => $data['count'],
            'category_id' => $data['category_id'],
            'group_id' => $data['group_id'],
        ]);

        foreach ($tagsIds as $tagId)
            {
                ProductTag::firstOrCreate([
                    'product_id' => $product->id,
                    'tag_id' => $tagId
                ]);
            }

        foreach ($colorsIds as $colorId)
        {
            ColorProduct::firstOrCreate([
                'product_id' => $product->id,
                'color_id' => $colorId
            ]);
        }

//        dd($data);

        return redirect()->route('product.index');
    }
}
