<?php namespace App\Core;

use Animals\Chicken;
use Animals\Cow;
use Animals\Sheep;
use Farms\Farm;


class App {

    /**
     * The method that runs the program
     * @return void
     */
    public static function boot(): void
    {
        $farm = new Farm();

        // Инициализация первых животных по ТЗ
        for($count = 0; $count < 10; $count++) {
            $farm->addAnimal(new Cow());
        }
        for($count = 0; $count < 20; $count++) {
            $farm->addAnimal(new Chicken());
        }
        echo $farm->getAnimals();

        // Сбор продуктов в течение первой недели
        for ($week = 1; $week <= 7; $week++) {
            $farm->collectProducts();
        }
        echo $farm->getProducts();

        // После покупки новых животных
        // Про очищение собранной продукции в ТЗ не было написано, поэтому я решил оставить продолжить счёт.
        for($count = 0; $count < 5; $count++) {
            $farm->addAnimal(new Chicken());
        }
        for($count = 0; $count < 1; $count++) {
            $farm->addAnimal(new Cow());
        }
        echo $farm->getAnimals();

        // Сбор продуктов в течение второй недели
        for ($week = 1; $week <= 7; $week++) {
            $farm->collectProducts();
        }
        echo $farm->getProducts();


    }

}