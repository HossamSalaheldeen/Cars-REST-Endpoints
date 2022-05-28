<?php


namespace App\Utilities;

interface FilterContract
{
    /**
     * @param null $value
     */
    public function handleNumeric($value = null): void;

    /**
     * @param null $value
     */
    public function handleString($value = null): void;

    /**
     * @param array $arr
     */
    public function handleArrayNumeric($arr = []): void;

    /**
     * @param array $arr
     */
    public function handleArrayString($arr = []): void;

    /**
     * @param null $from
     * @param null $to
     */
    public function handleRange($from = null, $to = null): void;
}
