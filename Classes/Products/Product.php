<?php
namespace Classes\Products;
/*require_once 'Interfaces/DefinedProduct.php';
require_once 'Traits/WorkWithPrice.php';*/

abstract class Product implements DefinedProduct
{
    use WorkWithPrice;
    protected $id_product;
    protected $category;
    protected $name;
    protected $weight;
    protected $delivery = 250;

    public function __construct($id_product, $category, $name, $weight, $price)
    {
        $this->id_product = $id_product;
        $this->category = $category;
        $this->name = $name;
        $this->weight = $weight;
        $this->price = $price;
    }

    public function getIdProduct()
    {
        return $this->id_product;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this->name;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
        return $this->category;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getDelivery()
    {
        return $this->delivery;
    }

    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
    }

    public function getDiscountedPrice()
    {
        if ($this->getDiscount() != 0) {
            $this->setDelivery(300);
            return $this->price * (1 - $this->getDiscount()/100) + $this->getDelivery();
        }
        return $this->price + $this->getDelivery();
    }

    public function showInformation()
    {
        echo 'Категория: ' . $this->getCategory() . '<br/>Наименование: ' . $this->getName() . '<br/>Скидка: ' . $this->getDiscount() . '<br/>Вес: ' . $this->getWeight() . '<br/>Цена с учетом скидки: ' . $this->getDiscountedPrice();
    }
}
?>

