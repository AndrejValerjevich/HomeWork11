<?php

class Order
{
    protected $date;
    protected $sum;
    protected $items = [];
    protected $item_amount;

    protected $customer_name;
    protected $customer_surname;

    public function __construct(Basket $basket, $customer_name, $customer_surname)
    {
        $this->date = date('l jS \of F Y h:i');
        $this->sum = $basket->getBasketSum();
        $this->item_amount = $basket->getSize();
        $this->items = $basket->getItems();
        $this->customer_name = $customer_name;
        $this->customer_surname = $customer_surname;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getSum()
    {
        return $this->sum;
    }

    public function getItemAmount()
    {
        return $this->item_amount;
    }

    public function getCustomerName()
    {
        return $this->customer_name;
    }

    public function getCustomerSurname()
    {
        return $this->customer_surname;
    }

    public function printOrderDetails()
    {
        echo 'Дата покупки: ' . $this->getDate() . '<br/>Сумма: ' . $this->getSum() . '<br/>Количество товаров: ' . $this->getItemAmount() . '<br/>Имя покупателя: ' . $this->getCustomerName() . '<br/>Фамилия покупателя: ' . $this->getCustomerSurname();
    }

}