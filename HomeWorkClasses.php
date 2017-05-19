<?php
interface ClassifiedCar
{
    //интерфейс задает обязательные методы для того, чтобы автомобиль всегды был отнесен к определенной модели
    public function getModel();
    public function setModel($model);
}

interface DiscountedPrice
{
    //для удобства этот интерфейс определяет, что в каждом классе, в который имплементируется этот интерфейс, по умолчанию выводится цена с учетом скидки, а если скидка не определяется принудительно, то по умолчанию она установлена 0
    public function getDiscount();
    public function setDiscount($discount);

    public function getDiscountedPrice();
    //таким образом, не зависимо от того, есть ли скидка на товар - мы используем только один метод
}

interface WritingPen
{
    //интерфейс устанавливает методы, определяющие работоспособность ручки
    public function getAbilityToWrite();
    public function setAbilityToWrite($ability_to_write);
    public function isWrite();
}

interface ProgeniedDuck
{
    //интерфейс для определения методов работы с потомством Утки:)
    public function getProgeny();
    public function setProgeny($progeny);
    public function newProgeny();
}

abstract class Thing //суперкласс Вещь или Предмет
{
    //т.к. любой предмет в мире - трехмерный, он имеет ширину, длину и высоту, поэтому свойства далее
    protected $width;
    protected $height;
    protected $length;
    //protected - т.к. далее нужно будет их наследовать в производных классах, закрыв в то же время от остального кода:)
}

abstract class Animal //суперкласс Животное - ведь нельзя отнести Утку к Вещи:)
{
    //у животных есть классификация - абсолютно у всех, в том числе дальше и у Утки, поэтому это и будет общим для ВСЕХ животных
    protected $type;
    protected $class;
    protected $squad;
    protected $family;
}

class Car extends Thing implements ClassifiedCar
{
    public $color;
    private $price;
    protected $model;

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }//эти два метода определяются интерфейсом, чтобы невозможно было забыть классифицировать автомобиль по МОДЕЛИ

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function changeColor($color)
    {
        //меняем свойство $color
    }
}

class Television extends Thing implements DiscountedPrice
{
    public $diagonal;
    public $producer;
    public $discount = 0;
    private $price;

    public function getDiscount()
    {
        return $this->discount;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDiscountedPrice()
    {
        return $this->price * ((100 - ($this->getDiscount()))*0.01);
    }

}

final class Pen extends Thing implements WritingPen
{
    private $color;
    private $material;
    public $ability_to_write;

    public function getColor()
    {
        return $this->color;
    }

    public function getMaterial()
    {
        return $this->material;
    }

    public function getAbilityToWrite()
    {
        return $this->ability_to_write;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setMaterial($material)
    {
        $this->material = $material;
    }

    public function setAbilityToWrite($ability_to_write)
    {
        $this->ability_to_write = $ability_to_write;
    }

    public function isWrite()
    {
        //метод проверки, пишет ли ручка
    }
}

class Duck extends Animal implements ProgeniedDuck
{
    public $gender;
    public $age;
    private $progeny;

    public function getProgeny()
    {
        return $this->progeny;
    }

    public function setProgeny($progeny)
    {
        $this->progeny = $progeny;
    }

    public function newProgeny()
    {
        //метод для увеличения размера потомства утки:)))
    }

}

class Product extends Thing implements DiscountedPrice
{
    private $category;
    private $name;
    private $discount = 0;
    private $price;

    public function __construct()
    {
        //конструктор класса Product
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function getDiscountedPrice()
    {
        return $this->price * ((100 - ($this->getDiscount()))*0.01);
    }
}

//создаем объекты класса Car
$car1 = new Car();
$car2 = new Car();

//создаем объекты класса Television
$television1 = new Television();
$television2 = new Television();

//создаем объекты класса Pen
$pen1 = new Pen();
$pen2 = new Pen();

//создаем объекты класса Duck
$duck1 = new Duck();
$duck2 = new Duck();

//создаем объекты класса Product
$product1 = new Product();
$product2 = new Product();

?>