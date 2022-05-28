<?php

namespace App\Utilities\CarFilters;

use App\Utilities\QueryFilter;
use App\Utilities\FilterContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class CarModel extends QueryFilter implements FilterContract
{
    /**
     * @param null $value
     */
    public function handleNumeric($value = null): void
    {
        if ($value)
            $this->query->where('car_model_id', $value);
    }

    /**
     * @param null $value
     */
    public function handleString($value = null): void
    {
        if ($value)
            $this->query->whereRelation('carModel', 'name', 'like', "%$value%");
    }

    /**
     * @param array $arr
     */
    public function handleArrayNumeric($arr = []): void
    {
        $notNullArr = Arr::whereNotNull($arr);
        if (count($notNullArr))
            $this->query->whereIn('car_model_id', $notNullArr);
    }

    /**
     * @param array $arr
     */
    public function handleArrayString($arr = []): void
    {

        $notNullArr = Arr::whereNotNull($arr);
        if (count($notNullArr))
            $this->query->whereHas('carModel', function (Builder $query) use ($arr) {
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
            $this->query->where('car_model_id', '>=', $from)
                ->where('car_model_id', '<=', $to);
    }
}
