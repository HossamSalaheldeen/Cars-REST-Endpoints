<?php


namespace App\Enums;


class CarGasEconomyStatus
{
    const YES = 1;
    const NO = 0;

    /**
     * @param $intType
     * @return int|string|string[]
     */
    public static function getGasEconomyStringType($intType)
    {
        return getAttributeStringByReflection(self::class, $intType);
    }
}
