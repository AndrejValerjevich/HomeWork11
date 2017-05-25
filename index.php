<?php
use Classes\Products\Phone;
use Classes\Products\Laptop;
use Classes\Products\Freezer;

use Classes\Orders\Basket;
use Classes\Orders\Order;
/*
 * Код данной страницы в виду недостатка времени написан просто листингом, подряд, страница не интерактивна.
 * Однако, все аспекты домашнего затания в коде присутствуют и могут быть преобразованы в рабочий сайт:)
 */
error_reporting(E_ALL);

#region //Определяем страницу и заголовки страниц
if (!empty($_GET["pageType"])) {
    $typeOfPage = $_GET["pageType"];

    if ($typeOfPage == "1") {
        $head = "Главная";
        $fieldsetClass = "main-container-fieldset__start";
    } else
        if ($typeOfPage == "2") {
            $head = "Товары";
            $fieldsetClass = "main-container-fieldset-info";
        }
}
else
{
    $head = "Главная";
    $fieldsetClass = "main-container-fieldset__start";
}
#endregion

#region //Автолоадер
function Autoloader($className)
{
    $path = str_replace('\\',DIRECTORY_SEPARATOR,$className);
    $file_path = $path . '.php';
    if (file_exists($file_path)) {
        include "$file_path";
    }
    else echo "нет в классе ";
}
#endregion

spl_autoload_register('Autoloader');

#region //Работа с товарами
//Здесь мы просто создадим 4 объекта наших классов
$product_array = [];

$phone = new Phone(111,'Phones','Apple Iphone 7',0.5,15000,'5"','21Mpx');
$product_array[] = $phone;

$laptop = new Laptop(222,'Laptops','ASUS N1K256', 3.5, 75000, '16Gb', 'Intel Core i7');
$product_array[] = $laptop;

$big_freezer = new Freezer(333,'Freezers', 'Samsung К42996HG', 15, 30000, 'Белый', '19%');
$product_array[] = $big_freezer;

$small_freezer = new Freezer(444,'Freezers', 'Samsung S456HG', 8, 30000, 'Белый', '14%');
$product_array[] = $small_freezer;
#endregion

#region //Работа с исключениями - исходно оно генерируется на экране, далее можно изменить:)
//Переменные далее - это могут быть поля формы, и если не заполнить поле id - мы получим исключение!

$id_product = '555';//если оставить пустым '', как например, если при вводе забудут ввести id - выведется исключение)
$category = 'Phones';
$name = 'Samsung Galaxy S8';
$weight = 0.2;
$price = 45000;
$diagonal = 5.5;
$camera = '16Mpx';

$exept_phone = new Phone($id_product, $category, $name, $weight, $price, $diagonal, $camera);
$product_array[] = $exept_phone;
#endregion

#region //Работа с корзиной

$basket = new Basket();
foreach ($product_array as $item) {
    $basket->addProduct($item);
}//Заполнили корзину - тестово, всеми товарами, которые есть
#endregion

#region //Работа с заказом

//Сразу передаем в объект "Заказ информацию как о покупках, так и о покупателе:)
$order = new Order($basket, 'Иван', 'Иванов');

#endregion
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Электроника</title>
</head>
<body>
<header class="header-container">
    <div class="header-container__h1">
        <h1 class="header-container__h1__text"><?php echo $head; ?></h1>
        <a class="header-container-link" href="index.php?pageType=1">Главная</a>
        <a class="header-container-link" href="index.php?pageType=2">Товары</a>
    </div>
</header>
<div class="main-container">
    <fieldset class="<?php echo $fieldsetClass?>">
        <?php if ($head === "Товары") { ?>
            <table class="main-container-table">
                <tr class="table-row">
                    <td class="table-cell table-header">Товары</td>
                </tr>
                <?php foreach ($product_array as $item) { ?>
                    <tr class="table-row">
                        <td class="table-cell"><?= $item->showInformation(); ?></td>
                    </tr>
                <?php } ?>
            </table>

            <br/><hr>
            <table class="main-container-table">
                <tr class="table-row">
                    <td class="table-cell table-header">Корзина</td>
                </tr>
                <?php foreach ($basket->getItems() as $item_in_basket) { ?>
                    <tr class="table-row">
                        <td class="table-cell"><?= $item_in_basket->showInformation(); ?></td>
                    </tr>
                <?php } ?>
            </table>
            <h2>Количество товаров в корзине: <?= $basket->getSize(); ?></h2>
            <h2>Общая стоимость товаров корзины: <?= $basket->getBasketSum(); ?></h2>

            <br/><hr>
            <?php $basket->delProduct(111); $basket->delProduct(333); ?>
            <table class="main-container-table">
                <tr class="table-row">
                    <td class="table-cell table-header">Корзина c удаленными товарами</td>
                </tr>
                <?php foreach ($basket->getItems() as $item_in_basket) { ?>
                    <tr class="table-row">
                        <td class="table-cell"><?= $item_in_basket->showInformation(); ?></td>
                    </tr>
                <?php } ?>
            </table>
            <h2>Количество товаров в корзине: <?= $basket->getSize(); ?></h2>
            <h2>Новая стоимость товаров корзины: <?= $basket->getBasketSum(); ?></h2>

            <br/><hr>
        <table class="main-container-table">
            <tr class="table-row">
                <td class="table-cell table-header">Заказ по первоначальной корзине</td>
            </tr>
                <tr class="table-row">
                    <td class="table-cell"><?= $order->printOrderDetails(); ?></td>
                </tr>
        </table>
        <?php } else { ?>
            <h1 class="main-container-fieldset__start__text-high">К товарам!</h1>
            <p class="main-container-fieldset__start__pic-low"><a href="index.php?pageType=2"><img class="main-container-fieldset__start__pic-arrow" src="image/arrow.png"></a></p>
        <?php } ?>
    </fieldset>
</div>
</body>
</html>
