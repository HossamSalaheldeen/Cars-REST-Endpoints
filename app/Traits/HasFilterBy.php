<?php
namespace App\Traits;

use App\Utilities\FilterBuilder;

trait HasFilterBy
{
    /**
     * @param $query
     * @param $filters
     * @param $ranges
     * @return mixed
     */
    public function scopeFilterBy($query, $filters, $ranges)
    {
        $namespace = 'App\\Utilities\\'.class_basename(static::class).'Filters';
        $filter = new FilterBuilder($query, $filters,$ranges, $namespace);
        return $filter->apply();
    }
}
