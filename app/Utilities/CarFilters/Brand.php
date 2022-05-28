<?php

namespace App\Utilities\CarFilters;

use App\Utilities\QueryFilter;
use App\Utilities\FilterContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class Brand extends QueryFilter implements FilterContract
{
    /**
     * @param null $value
     */
    public function handleNumeric($value = null): void
    {
        if ($value)
            $this->query->whereRelation('carModel', 'brand_id', $value);
    }

    /**
     * @param null $value
     */
    public function handleString($value = null): void
    {
        if ($value)
            $this->query->whereRelation('carModel.brand', 'name', 'like', "%$value%");
    }

    /**
     * @param array $arr
     */
    public function handleArrayNumeric($arr = []): void
    {
        $notNullArr = Arr::whereNotNull($arr);
        if (count($notNullArr))
            $this->query->whereHas('carModel', function (Builder $query) use ($arr) {
                $query->whereIn('brand_id', $arr);
            });
    }

    /**
     * @param array $arr
     */
    public function handleArrayString($arr = []): void
    {

        $notNullArr = Arr::whereNotNull($arr);
        if (count($notNullArr))
            $this->query->whereHas('carModel.brand', function (Builder $query) use ($arr) {
                $query->where(function (Builder $query) use ($arr) {
                    foreach ($arr as $str) {
                        $query->orWhere('name', 'LIKE', "%$str%");
                    }
                });
            });
    }

    /**
     * @param null $from
     * @param null $to
     */
    public function handleRange($from = null, $to = null): void
    {
        if ($from && $to)
            $this->query->whereRelation('carModel', 'brand_id', '>=', $from)
                ->whereRelation('carModel', 'brand_id', '<=', $to);
    }
}
