<?php

namespace Products;

class Milk
{
    /**
     * Name of the product type
     * @var string
     */
    public static string $name = 'Молоко';

    /**
     * The unit of measurement in which the product is calculated
     * @var string
     */
    public static string $unitMeasurement = 'л.';

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
    public string $range = '8-12';

    /**
     * The method of obtaining information about the collected product type
     * @return string
     */
    public static function getInfo(): string
    {
        return self::$name.": ".self::$quantity." ".self::$unitMeasurement."\n";
    }

}