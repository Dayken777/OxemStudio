<?php

namespace Products;

class Wool
{
    /**
     * Name of the product type
     * @var string
     */
    public static string $name = 'Шерсть';

    /**
     * The unit of measurement in which the product is calculated
     * @var string
     */
    public static string $unitMeasurement = 'м3';

    /**
     * Total amount of product collected
     * @var int
     */
    public static int $quantity = 0;

    /**
     * Possible quantity of products
     * - Format:  {min}-{max}
     * - Through the separator "-"
     * @var string
     */
    public string $range = '5';

    /**
     * The method of obtaining information about the collected product type
     * @return string
     */
    public static function getInfo(): string
    {
        return self::$name.": ".self::$quantity." ".self::$unitMeasurement."\n";
    }

}