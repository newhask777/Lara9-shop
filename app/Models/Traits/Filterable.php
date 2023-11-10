<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\FilterInterface;

trait Filterable
{
    /**
     * @param Builder $builder
     * @param FilterInterface $filter
     *
     * @return Bulder
     */

    public function scopeFilter(Builder $builder, FilterInterface $filter)
    {
        $filter->apply($builder);

        return $builder;
    }
}
