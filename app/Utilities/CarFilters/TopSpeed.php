<?php


namespace App\Utilities\CarFilters;


use App\Utilities\FilterContract;
use App\Utilities\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class TopSpeed extends QueryFilter implements FilterContract
{
    /**
     * @param null $value
     */
    public function handleNumeric($value = null): void
    {

        if ($value)
            $this->query->where('top_speed', $value);
    }

    /**
     * @param null $value
     */
    public function handleString($value = null): void
    {
        if ($value)
            $this->query->where('top_speed', 'LIKE', $value);
    }

    /**
     * @param array $arr
     */
    public function handleArrayNumeric($arr = []): void
    {
        $notNullArr = Arr::whereNotNull($arr);
        if (count($notNullArr))
            $this->query->whereIn('top_speed', $arr);
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
                    $query->orWhere('top_speed', 'LIKE', "%$str%");
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
        $this->query->where('top_speed', '>=', $from)
            ->where('top_speed', '<=', $to);
    }
}
