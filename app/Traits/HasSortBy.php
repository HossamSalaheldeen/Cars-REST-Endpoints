<?php


namespace App\Traits;


use Illuminate\Support\Arr;

trait HasSortBy
{
    /**
     * @param $query
     * @param $sorts
     * @throws \Exception
     */
    public function scopeSortBy($query,$sorts)
    {
        $this->checkSortableExists();

        $validatedSorts = $this->getValidatedSorts($sorts);

        foreach ($validatedSorts as $sort) {
            $query->orderBy($sort['column'], $sort['direction']);
        }
    }

    /**
     * @throws \Exception
     */
    private function checkSortableExists()
    {
        if (!isset($this->sortable)) {
            throw new \Exception('No sortable array in the model.');
        }
    }

    /**
     * @param $sorts
     * @return array
     * @throws \Exception
     */
    private function getValidatedSorts($sorts)
    {
        $availableSorts = [];

        if (is_array($sorts)) {
            foreach ($sorts as $sort) {
                $column = explode(',', $sort)[0];
                $direction = explode(',', $sort)[1] ?? 'asc';
                if (in_array($column, $this->sortable) && in_array($direction, ['asc', 'desc'])) {
                    $availableSorts [] = [
                        'column' => $column,
                        'direction' => $direction
                    ];
                }
            }
        }else {
            throw new \Exception('sort query string must be type of array.');
        }
        return $availableSorts;
    }

}
