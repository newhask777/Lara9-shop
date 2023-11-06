<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if(isset($data["preview_image"]) && $data["preview_image"] != null)
        {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }
        else
        {
            $data['preview_image'] = Product::find($product->preview_image);
        }

        // dd($data['preview_image']);

        if(isset($data['tags']))
        {
            $tagsIds = $data['tags'];
            unset($data['tags']);

            foreach($tagsIds as $tagId)
            {
                ProductTag::firstOrCreate([
                    'product_id' => $product->id,
                    'tag_id' => $tagId
                ]);
            }
        }

        if(isset($data['tags']))
        {
            $colorsIds = $data['colors'];
            unset($data['colors']);

            foreach($colorsIds as $colorsId)
            {
                ColorProduct::firstOrCreate([
                    'product_id' => $product->id,
                    'color_id' => $colorsId
                ]);
            }
        }


        unset($data['tags'], $data['colors']);

        $product->update($data);

        return view('products.show', compact('product'));
    }
}
