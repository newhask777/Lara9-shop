<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    const CATEGORIES = 'categories';
    const COLORS = 'colors';
    const PRICE = 'price';
    const TAGS = 'tags';

    protected function getCallbacks(): array
    {
        [
            self::CATEGORIES => [$this, 'categories'],
            self::COLORS => [$this, 'colors'],
            self::PRICE => [$this, 'price'],
            self::TAGS => [$this, 'tags'],
        ];

    }

    protected function categories(Builder $builder, $value)
    {
        $bulder->whereIn('category_id', $value);
    }

    protected function colors(Builder $builder, $value)
    {
        $bulder->whereIn('color_id', $value);
    }

    protected function price(Builder $builder, $value)
    {
        $bulder->whereBetween($value['from'], $value['to']);
    }

    protected function tags(Builder $builder, $value)
    {
        $bulder->whereHas('tags', function() use ($value) {
            $b->whereIn('tag_id', $value);
        });
    }
}
