<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'description'=> 'nullable',
            'content'=> 'nullable',
            'preview_image'=> 'nullable',
            'price'=> 'nullable',
            'count'=> 'nullable',
            'is_published' => 'nullable',
            'category_id'=> 'integer',
            'tags' => 'nullable|array',
            'colors'=> 'nullable|array',
            'product_images' => 'nullable|array'
        ];
    }
}
