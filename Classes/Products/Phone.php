<?php
namespace Classes\Products;

use Classes\Exceptions\EmptyProductException;

final class Phone extends Product
{
    protected $discount = 10;
    private $diagonal;
    private $camera;

    public function __construct($id_product, $category, $name, $weight, $price, $diagonal, $camera)
    {
        try {
            if ($id_product == null) {
                throw new EmptyProductException('Empty id_product.');
            }
            else {
                parent::__construct($id_product, $category, $name, $weight, $price);
                $this->diagonal = $diagonal;
                $this->camera = $camera;
            }
        }
        catch (EmptyProductException $e) {
            echo 'Вы забыли заполнить поле id товара!';
        }
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }

    public function getCamera()
    {
        return $this->camera;
    }

    public function setCamera($camera)
    {
        $this->camera = $camera;
    }

    public function getDiagonal()
    {
        return $this->diagonal;
    }

    public function setDiagonal($diagonal)
    {
        $this->diagonal = $diagonal;
    }

    public function showInformation()
    {
        parent::showInformation();
        echo '<br/>Диагональ экрана: ' . $this->getCategory() . '<br/>Камера: ' . $this->getName(), PHP_EOL;
    }
}