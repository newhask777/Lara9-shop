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

        if(isset($data["preview_image"]) && $data["preview_image"] != null)
        {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }


        // dd($data);
        $productImages = $data['product_images'];

        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        unset($data['tags'], $data['colors'], $data['product_images']);


        $product = Product::firstOrCreate([
            'name'=> $data['name'],
        ], $data);

        foreach($tagsIds as $tagId)
        {
            ProductTag::firstOrCreate([
                'product_id' => $product->id,
                'tag_id' => $tagId
            ]);
        }

        foreach($colorsIds as $colorsId)
        {
            ColorProduct::firstOrCreate([
                'product_id' => $product->id,
                'color_id' => $colorsId
            ]);
        }

        foreach($productImages as $productImage)
        {
            $currentImages = ProductImage::where('product_id', $product->id)->get();

            if(count($currentImages) > 3) continue;
            $filePath = Storage::disk('public')->put('images', $productImage);
            ProductImage::create([
                'product_id' => $product->id,
                'file_path' => $filePath
            ]);
        }

        return redirect()->route('product.index');
    }
}
