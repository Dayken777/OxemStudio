<?php namespace App\Classes;

abstract class Animal
{

    /**
     * The total number of all animals
     * - The countdown starts from zero
     * @var int
     */
    public static int $generalCount = 0;


    /**
     * Individual animal number
     *
     */
    protected int $number;


    /**
     * Constructor
     */
    public function __construct() {
        $this->number  = self::$generalCount;
        ++self::$generalCount;
    }


    /**
     * Method of getting a number
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

}