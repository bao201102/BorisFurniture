<?php
class Cart extends Controller
{

    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
        $this->CategoryModel = $this->model('CategoryModel');
        $this->ImageModel = $this->model('ImageModel');
        $this->UserModel = $this->model('UserModel');
        $this->CustomerModel = $this->model('CustomerModel');
    }

    function addProductToCart()
    {
        if (isset($_POST['addToCart'])) {
            $product = array("prod_id" => $_POST['prod_id'], "prod_name" => $_POST['prod_name'], "prod_price" => $_POST['prod_price'], "prod_quantity" => $_POST['prod_quantity']);
            echo var_dump($product);
            // if (isset($_SESSION['cart'])) {
            //     $cart = $_SESSION['cart'];
            //     if (!array_key_exists($product["prod_id"], $cart)) {
            //         $cart[$product["prod_id"]] = $product; //key lay theo id san pham
            //     } else {
            //         $this->increaseQuantity($product["prod_id"], $product["prod_quantity"]);
            //     }
            //     $_SESSION['cart'] = $cart;
            // } else {
            //     $cart[$product["prod_id"]] = $product;
            //     $_SESSION['cart'] = $cart;
            // }
            // header('location:' . URLROOT . '/Home/cart');
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

    function increaseQuantity($key, $prod_quantity)
    {
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            $cart[$key]['prod_quantity'] += $prod_quantity;
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
}
