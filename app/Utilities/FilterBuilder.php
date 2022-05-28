<?php

namespace App\Utilities;

use Illuminate\Support\Str;

class FilterBuilder
{

    protected $query;
    protected $filters;
    protected $ranges;
    protected $namespace;

    /**
     * FilterBuilder constructor.
     * @param $query
     * @param $filters
     * @param $ranges
     * @param $namespace
     */
    public function __construct($query, $filters, $ranges, $namespace)
    {
        $this->query = $query;
        $this->filters = $filters;
        $this->ranges = $ranges;
        $this->namespace = $namespace;
    }

    /**
     * @return mixed
     */
    public function apply()
    {
        if (count($this->filters)) {
            $this->callFilters();
        }

        if (count($this->ranges)) {
            $this->callRanges();
        }

        return $this->query;
    }

    /**
     * @param $name
     * @return string
     */
    private function getClassPath($name)
    {
        $normailizedName = ucfirst(Str::camel($name));
        return $this->namespace . "\\{$normailizedName}";
    }


    private function callFilters()
    {
        foreach ($this->filters as $name => $value) {

            $class = $this->getClassPath($name);

            if (!class_exists($class)) {
                continue;
            }

            if (is_numeric($value)) {
                (new $class($this->query))->handleNumeric($value);
            } else if (is_string($value)) {
                (new $class($this->query))->handleString($value);
            } else if (is_array($value)) {
                if (count($value) === count(array_filter($value, 'is_numeric'))) {
                    (new $class($this->query))->handleArrayNumeric($value);
                } else if (count($value) === count(array_filter($value, 'is_string'))) {
                    (new $class($this->query))->handleArrayString($value);
                }

            }
        }
    }

    private function callRanges()
    {
        if (array_key_exists('from', $this->ranges) && array_key_exists('to', $this->ranges)) {

            $fromKeys = array_keys($this->ranges['from']);
            $toKeys = array_keys($this->ranges['to']);

            for ($i = 0; $i < count($this->ranges['from']); $i++) {

                $class = $this->getClassPath($fromKeys[$i]);

                if (!class_exists($class)) {
                    continue;
                }

                (new $class($this->query))->handleRange($this->ranges['from'][$fromKeys[$i]], $this->ranges['to'][$toKeys[$i]]);
            }
        }
    }


}
