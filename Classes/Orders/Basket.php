<?php
namespace Classes\Orders;

class Basket
{
    private $size = 0;
    private $items = [];

    public function getSize()
    {
        return $this->size;
    }

    private function setSize($size)
    {
        $this->size = $size;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function addProduct($item)
    {
        $this->items[] = $item;
        $this->setSize($this->getSize()+1);
        return $this->items;
    }

    public function getBasketSum()
    {
        $sum = 0;
        foreach ($this->getItems() as $item) {
            $sum += $item->getDiscountedPrice();
        }
        return $sum;
    }

    public function delProduct($id_product)
    {
        $product_count = 0;
        foreach ($this->getItems() as $item) {
            if ($item->getIdProduct() == $id_product) {
                unset($this->items[$product_count]);
            }
            $product_count++;
        }
        $this->setSize($this->getSize()-1);
        return $this->items;
    }
}