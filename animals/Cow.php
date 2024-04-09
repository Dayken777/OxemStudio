<?php

namespace Animals;

use App\Classes\Animal;

class Cow extends Animal
{
    /**
     * Name of the type of animal
     * @var string
     */
    public static string $name = 'Корова';

    /**
     * The number of animals of this type
     * @var int
     */
    public static int $count = 0;

    /**
     * The method of registering product types
     * @return string[]
     */
    public function registerProducts(): array
    {
        return [
            "\\Products\\Milk",
        ];
    }

    /**
     * A method for obtaining information about the number of animals of this type
     * @return string
     */
    public static function getInfo(): string
    {
        return self::$name.": ".self::$count."\n";
    }

}