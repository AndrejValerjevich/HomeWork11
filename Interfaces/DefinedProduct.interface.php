<?php

interface DefinedProduct
{
    //наличие этих методов гарантирует достаточный для продукта затем набор свойств - и соответственно информации и нем
    public function getName();
    public function setName($name);

    public function getCategory();
    public function setCategory($category);

    public function getPrice();
    public function setPrice($price);

    public function getDiscountedPrice();
}