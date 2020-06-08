<?php

/**
 * 1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов
 * продукт, ценник, посылка и т.п.
 *
 * 2. Описать свойства класса из п.1 (состояние).
 *
 * 3. Описать поведение класса из п.1 (методы).
 *
 * 4. Придумать наследников класса из п.1. Чем они будут отличаться?
 */

class Product
{
    public $id;
    public $article;
    public $category;
    public $title;
    public $description;
    public $size;
    public $weight;
    public $price;
    public $guarantee;
    public $country;
    public $count;

    public function __construct($article, $category, $title, $description, $size, $weight, $price, $guarantee, $country, $count)
    {
        $this->article = $article;
        $this->category = $category;
        $this->title = $title;
        $this->description = $description;
        $this->size = $size;
        $this->weight = $weight;
        $this->price = $price;
        $this->guarantee = $guarantee;
        $this->country = $country;
        $this->count = $count;
    }

    public function view()
    {
        echo "
            <h2>Карточка товара</h2>
            <b>Артикул:</b> $this->article<br>
            <b>Категория:</b> $this->category<br>
            <b>Наименование:</b> $this->title<br>
            <b>Описание:</b> $this->description<br>
            <b>Размер:</b> $this->size<br>
            <b>Вес:</b> $this->weight кг<br>
            <b>Цена:</b> $this->price руб.<br>
            <b>Гарантия:</b> $this->guarantee мес.<br>
            <b>Страна-производитель:</b> $this->country<br>
            <b>Количество на складе:</b> $this->count шт.<br>
        ";
    }

    // Списание товара со склада
    public function removeFromStock($number)
    {
        echo "<h2>Списание со склада</h2>";
        if (($this->count - $number) < 0) {
            echo "<b>Недостаточное количество товара на складе для списания: $number шт.!</b><br>";
        } else {
            $this->count -= $number;
            echo "<b>Списание товара $this->title в количестве $number шт. выполнено успешно!</b><br>";
        }
        echo "<b>Остаток на складе:</b> $this->count шт.<br>";
    }
}

// Уцененый товар (брак, не комплект)
class Discount extends Product
{
    public $state;
    public $complete;
    public $functionality;
    public $package;
    public $reason;

    function __construct($article, $category, $title, $description, $size, $weight, $price, $guarantee, $country, $count,
                         $state, $complete, $functionality, $package, $reason)
    {
        parent::__construct($article, $category, $title, $description, $size, $weight, $price, $guarantee, $country, $count);
        $this->state = $state;
        $this->complete = $complete;
        $this->functionality = $functionality;
        $this->package = $package;
        $this->reason = $reason;
    }

    public function view()
    {
        parent::view();
        echo "
            <b>Состояние:</b> $this->state<br>
            <b>Комплектность:</b> $this->complete<br>
            <b>Функциональность:</b> $this->functionality<br>
            <b>Состояние упаковки:</b> $this->package<br>
            <b>Причина уценки:</b> $this->reason<br>
        ";
    }
}

/*Стандартный товар*/
$product1 = new Product(123456, "Пылесосы", "Пылесос Philips",
    "Народная марка!",
    "50 x 30 x 20 см", 4, 5000, 12, "Китай", "10");
$product1->view();
$product1->removeFromStock(5);
$product1->removeFromStock(3);

/*Уцененный товар*/
$product2 = new Discount(987654, "Фены", "Фен Scarlett",
    "Даже моя мама бы купила!",
    "30 x 20 x 10", 0.55, 2000, 6, "Китай", 5,
    "незначительные следы эксплуатации (мелкие потертости, царапины)", "полная", "полностью исправен", "отличное", "отремонтированный");
$product2->view();
$product2->removeFromStock(1);
$product2->removeFromStock(2);

//var_dump($product1);
//var_dump($product2);
