# Бэкенд-разработчик — Тестовое задание от Oxem Studio

##  <span style="color:#c00000">Обязательно запускать из index.php внутри public!</span>


> Запуск приложения происходит из каталога `public` файла `index.php`

```php
<?php 

use App\Core\App;  
  
require_once('../vendor/autoload.php');  
  
App::boot();
```

Сам класс `App` находится в каталоге `app/core`, там происходит создание животных и прочие действия задуманные приложением по ТЗ

### Еще не мало важная папка каталога `app` это `classes`, туда я поместил абстрактные классы:
1.  Animals.php
2. FarmBase.php

> Их я использую для возможности переопределения методов классов ферм и типов животных

```php
abstract class Animal  
{  
  
     public static int $generalCount = 0;  
  
  
     protected int $number;  
  
  
     public function __construct() {  
        $this->number  = self::$generalCount;  
        ++self::$generalCount;  
    }
}
```

Сделал именно так чтобы реализовать присвоение уникального идентификатора животному (также как реализовано в реляционных базах данных. Начинаю от нуля и тд). Не особо понял как именно нужно было сделать и выбрал этот способ.

### В каталоге `animals` находятся классы типов животных.

```php
<?php namespace Animals;  
  
use App\Classes\Animal;  
  
class AnimalType extends Animal  
{  
    public static string $name = 'Название животного';  
  
    public static int $count = 0; 
  
    public function registerProducts(): array  
    {  
        return [  
            "\\Products\\ProductType",  
        ];  
    }  
  
    public static function getInfo(): string  
    {  
        return self::$name.": ".self::$count."\n";  
    }  
  
}
```

Интерфейсы не стал делать, поэтому приложу базовую конструкцию создания типа животных.

`$count` - кол-во созданных экземпляров данного класса(Будет подсчитываться само внутри фермы)

`$this-registerProducts` - Указываем путь к классу продукта (Сделал именно так, чтобы была возможность добавлять животному легко и быстро новый тип продукта)

### Продукты аналогично находятся в каталоге `products` и выглядят вот так:

```php
<?php namespace Products;  
  
class Egg  
{  
   public static string $name = 'Название типа продукты';  
  
   public static string $unitMeasurement = 'Единица измерения продукты';  
  
   public static int $quantity = 0;  
  
   public string $range = '0-1';  
  
   public static function getInfo(): string  
    {  
        return self::$name.": ".self::$quantity." ".self::$unitMeasurement."\n";  
    }  
  
}
```

`$quantity` - Кол-во продукта также высчитывается само в  классе фермы
`$range` - Можно вводить диапазон в формате `{min}-{max}` или же целое число
Метод `getInfo` - Выводит информацию о конкретном продукте

### В каталоге `farm` находятся классы ферм:

Сделал возможность, чтобы можно было создать множества разных ферм и переопределить методы основного класса фермы. Если изменения не нужны, то оставляет класс пустым.

У фермы есть методы:
1.  `addAnimals(Animal $animal)` для добавления нового животного на ферму
2.  `collectProducts()` для сбора всех продуктов со всех животных.
3.  `getAnimals()` для получения информации о всех животных
4.  `getProducts()` для получения информации о всех собранных продуктах

>Почему у животных должен быть индивидуальный идентификатор я не особо понял, но если что можно посмотреть их выведя свойство `$farm->products` через `print_r`. Там находится детальная информация о том какое животное по ID сколько и какой продукции произвело

