<?php
/*
    $cart = array($key=>array(id,soluong,dongia,...))
    Session gio hang:
        $_SESSION['cart'] = $cart
*/

function addProductToCart($product)
{
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        if (!array_key_exists($product["prod_id"], $cart)) {
            $cart[$product["prod_id"]] = $product; //key lay theo id san pham
        }
        $_SESSION['cart'] = $cart;
    } else {
        $cart[$product["prod_id"]] = $product;
        $_SESSION['cart'] = $cart;
    }
}

function deleteProduct($key)
{
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        unset($cart[$key]);
        $_SESSION['cart'] = $cart;
    }
}

function updateProduct($key, $prod_quantity)
{
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        $cart[$key]['prod_quantity'] = $prod_quantity;
        $_SESSION['cart'] = $cart;
    }
}

function checkoutCart()
{
    $sum = 0;
    $cart = $_SESSION['cart'];
    foreach ($cart as $v)
        $sum += $v['prod_quantity'] * $v['prod_price'];
    return number_format($sum);
}
?>