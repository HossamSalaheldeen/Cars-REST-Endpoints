<?php

namespace App\Utilities;

use Illuminate\Database\Eloquent\Builder;

abstract class QueryFilter
{
    /**
     * @var Builder
     */
    protected $query;

    /**
     * QueryFilter constructor.
     * @param Builder $query
     */
    public function __construct(Builder $query)
    {
        $this->query = $query;
    }
}
