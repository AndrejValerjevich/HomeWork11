<?php
namespace Classes\Products;

final class Laptop extends Product
{
    //по заданию - на один продукт не распространяется скидка - поэтому в классе Laptop.class мы не переопределяем свойство $discount = 0;
    private $memory;
    private $processor;

    public function __construct($id_product, $category, $name, $weight, $price, $memory, $processor)
    {
        parent::__construct($id_product, $category, $name, $weight, $price);
        $this->memory = $memory;
        $this->processor = $processor;
    }

    public function getMemory()
    {
        return $this->memory;
    }

    public function setMemory($memory)
    {
        $this->memory = $memory;
    }

    public function getProcessor()
    {
        return $this->processor;
    }

    public function setProcessor($processor)
    {
        $this->processor = $processor;
    }

    public function showInformation()
    {
        parent::showInformation();
        echo '<br/>Объем памяти: ' . $this->getMemory() . '<br/>Процессор: ' . $this->getProcessor(), PHP_EOL;
    }

}