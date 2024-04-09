<?php

namespace App\Helpers;

trait Helpers
{
    /**
     * A method for randomly obtaining values
     * @param $str
     * @return int
     */
    function random($str): int
    {
        $range = explode('-', $str);
        $min = $range[0];
        $max = $range[1]??$min;

        return rand($min, $max);
    }

    /**
     * Method for getting child classes
     * @param $parent
     * @return array
     */
    static function getSubClass($parent): array
    {
        foreach (get_declared_classes() as $class) {
            if (is_subclass_of($class, $parent))
                $result[] = $class;
        }

        return $result??[];
    }

}