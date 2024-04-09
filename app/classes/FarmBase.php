<?php

namespace App\Classes;

use App\Helpers\Helpers;

abstract class FarmBase {
    use Helpers;

    /**
     * An array with animals on the farm
     * @var array
     */
    protected array $animals = [];

    /**
     * @var array
     */
    protected array $products = [];

    /**
     * The method of adding animals
     * @param Animal $animal
     * @return void
     */
    public function addAnimal(Animal $animal): void
    {
        $this->animals[] = $animal;
        $animal::$count += 1;
    }


    /**
     * The method of collecting products
     * @return void
     */
    public function collectProducts(): void
    {
        $animals = $this->animals;

        foreach($animals as $animal){
            $pathClassProducts = $animal->registerProducts();
            foreach($pathClassProducts as $productObj){
                $product = (new $productObj);
                $quantity = $this->random($product->range);
                $productObj::$quantity += $quantity;

                // Посмотреть сколько кто чего сделал
                $this->products[$animal::$name.' № '.$animal->getNumber()] = [$product::$name => $quantity];
            }
        }
    }

    /**
     * Get information about the number of animals on the farm
     * @return string
     */
    public function getAnimals(): string
    {
        $animalsClass = $this->getSubClass(Animal::class);
        $info = "";

        foreach($animalsClass as $animal){
            $info .= $animal::$name.": ".$animal::$count."\t";
        }
        $info .= "\n";

        return $info;
    }

    /**
     * Get information about the amount of food collected on the farm
     * @return string
     */
    public function getProducts(): string
    {
        $animalsClass = $this->getSubClass(Animal::class);
        $info = "";

        foreach($animalsClass as $animal){
            $pathClassProducts = (new $animal)->registerProducts();
            foreach($pathClassProducts as $productObj){
                $info .= $productObj::$name.": ".$productObj::$quantity." ".$productObj::$unitMeasurement."\t";
            }
        }
        $info .= "\n";

        return $info;
    }

}