<?php

namespace App\Utilities\CarFilters;

use App\Utilities\QueryFilter;
use App\Utilities\FilterContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class Year extends QueryFilter implements FilterContract
{
    /**
     * @param null $value
     */
    public function handleNumeric($value = null): void
    {

        if ($value)
            $this->query->where('year', $value);
    }

    /**
     * @param null $value
     */
    public function handleString($value = null): void
    {
        if ($value)
            $this->query->where('year', 'LIKE', $value);
    }

    /**
     * @param array $arr
     */
    public function handleArrayNumeric($arr = []): void
    {
        $notNullArr = Arr::whereNotNull($arr);
        if (count($notNullArr))
            $this->query->whereIn('year', $arr);
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
                    $query->orWhere('year', 'LIKE', "%$str%");
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
        $this->query->where('year', '>=', $from)
            ->where('year', '<=', $to);
    }
}
