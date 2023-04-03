<?php

require_once "Product.php";
require_once "Cart.php";
require_once "CartItem.php";

$product1 = new Product(1, "iPhone 11", 2500, 10);
$product2 = new Product(2, "M2 SSD", 400, 10);
$product3 = new Product(3, "Samsung Galaxy S20", 3200, 10);
$product4 = new Product(4, "Samsung Galaxy S30", 3500, 10);

$cart = new Cart();
$cartItem1 = $cart->addProduct($product1, 1);
$cartItem2 = $product2->addToCart($cart, 1);
$cartItem3 = $product3->addToCart($cart, 2);
$cartItem4 = $product4->addToCart($cart, 3);

$cartItem3->decreaseQuantity();
$cartItem4->increaseQuantity();

$cart->removeProduct($product1);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <div><?php echo $product1->getTitle()?></div>
        <div><?php echo $product2->getTitle()?></div>
        <div><?php echo $product3->getTitle()?></div>
    </div>
    <br>
    <br>
    <span>Cart: </span>
    <?php foreach ($cart->getItems() as $item){ ?>
            <div style="display: flex; justify-content: space-around; max-width: 250px">
                <div><?php echo $item->getProduct()->getTitle() . '( ' . $item->getQuantity() . ' )' ?></div>
                <div><?php echo $item->getProduct()->getPrice() . '( ' . $item->getQuantity() . ' )' ?></div>
            </div>
    <?php } ?>
    <br>

    <span>Total quantity: <?php echo $cart->getTotalQuantity()?></span><br><br>

    <span>Total sum: <?php echo $cart->getTotalSum()?></span>
</body>
</html>
