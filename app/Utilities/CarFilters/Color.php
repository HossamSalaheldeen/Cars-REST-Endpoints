<?php

namespace App\Utilities\CarFilters;

use App\Utilities\QueryFilter;
use App\Utilities\FilterContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class Color extends QueryFilter implements FilterContract
{
    /**
     * @param null $value
     */
    public function handleNumeric($value = null): void
    {

        if ($value)
            $this->query->where('color', $value);
    }

    /**
     * @param null $value
     */
    public function handleString($value = null): void
    {
        if ($value)
            $this->query->where('color', 'LIKE', $value);
    }

    /**
     * @param array $arr
     */
    public function handleArrayNumeric($arr = []): void
    {
        $notNullArr = Arr::whereNotNull($arr);
        if (count($notNullArr))
            $this->query->whereIn('color', $arr);
    }

    /**
     * @param array $arr
     */
    public function handleArrayString($arr = []): void
    {

        $notNullArr = Arr::whereNotNull($arr);
        if (count($notNullArr))
            $this->query->where(function (Builder $query) use ($arr) {
                foreach ($arr as $str) {
                    $query->orWhere('color', 'LIKE', "%$str%");
                }
            });

    }

    /**
     * @param null $from
     * @param null $to
     */
    public function handleRange($from = null, $to = null): void
    {
        if ($from && $to)
        $this->query->where('color', '>=', $from)
            ->where('color', '<=', $to);
    }
}
