<?php

final class Freezer extends Product
{
    private $color;
    private $cold;

    public function __construct($id_product, $category, $name, $weight, $price, $color, $cold)
    {
        parent::__construct($id_product, $category, $name, $weight, $price);
        $this->color = $color;
        $this->cold = $cold;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getCold()
    {
        return $this->cold;
    }

    public function setCold($cold)
    {
        $this->cold = $cold;
    }

    public function showInformation()
    {
        if ($this->getWeight() > 10) {
            $this->setDiscount(10);
        }
        parent::showInformation();
        echo '<br/>Цвет: ' . $this->getColor() . '<br/>Макс. Холод: ' . $this->getCold(), PHP_EOL;
    }

    public function getDiscountedPrice()
    {
        if ($this->getWeight() > 10)
        {
            $this->setDiscount(10);
            $this->setDelivery(300);
            return $this->price * (1 - $this->getDiscount()/100) + $this->getDelivery();
        }
        return $this->price + $this->getDelivery();
    }
}