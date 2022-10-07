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

    function addProductToCart($prod_id)
    {
        $prod = $this->ProductModel->getProduct($prod_id);
        $image = $this->ImageModel->getImage($this->ProductModel->getImageId($prod_id));

        if (isset($_POST['addToCart'])) {
            $subtotal = $_POST['prod_quantity'] * $prod[0]['prod_price'];

            $product = array(
                "prod_id" => $prod[0]['prod_id'], "prod_name" => $prod[0]['prod_name'], "prod_img" => $image[0]['img_link'], "prod_price" => $prod[0]['prod_price'],
                "prod_quantity_max" => $prod[0]['prod_quantity'], "prod_quantity_cart" => $_POST['prod_quantity'], "subtotal" => $subtotal
            );

            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];

                if (!array_key_exists($product["prod_id"], $cart)) {
                    $cart[$product["prod_id"]] = $product; //key lay theo id san pham
                } else {
                    $temp = $cart[$product["prod_id"]]['prod_quantity_cart'] + $product['prod_quantity_cart'];
                    if ($temp > $product['prod_quantity_max']) {
                        $cart[$product["prod_id"]]['prod_quantity_cart'] = $product['prod_quantity_max'];
                        $cart[$product["prod_id"]]['subtotal'] = $cart[$product["prod_id"]]['prod_quantity_cart'] * $cart[$product['prod_id']]['prod_price'];
                    } else {
                        $cart[$product["prod_id"]]['prod_quantity_cart'] = $temp;
                        $cart[$product["prod_id"]]['subtotal'] = $cart[$product["prod_id"]]['prod_quantity_cart'] * $cart[$product['prod_id']]['prod_price'];
                    }
                }
                $_SESSION['cart'] = $cart;
                $this->createSubtotal();
            } else {
                $cart[$product["prod_id"]] = $product;
                $_SESSION['cart'] = $cart;
                $this->createSubtotal();
            }
            $this->createSubtotal();
            header('location:' . URLROOT . '/Home/cart');
        }
    }

    function deleteProduct($key)
    {
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            unset($cart[$key]);
            $_SESSION['cart'] = $cart;
            $this->createSubtotal();
            header('location:' . URLROOT . '/Home/cart');
        }
    }

    function updateProduct()
    {
        echo $_POST['prod_quantity_up'];
        // if (isset($_SESSION['cart'])) {
        //     $cart = $_SESSION['cart'];
        //     for ($i = 1; $i <= sizeof($cart); $i++) {
        //         $cart[$i]['prod_quantity_cart'] =  $_POST['prod_quantity_up'];
        //         $cart[$i]['subtotal'] = $cart[$i]['prod_quantity_cart'] * $cart[$i]['prod_price'];
        //     }
        //     $_SESSION['cart'] = $cart;
        //     $this->createSubtotal();
        //     header('location:' . URLROOT . '/Home/cart');
        // }
    }

    function checkoutCart($key)
    {
        $sum = 0;
        $cart = $_SESSION['cart'];
        foreach ($cart as $v)
            $sum += $v[$key]['prod_quantity'] * $v[$key]['prod_price'];
        return $sum;
    }

    function emptyCart()
    {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
            header('location:' . URLROOT . '/Home/cart');
        }
    }

    function createSubtotal()
    {
        if (isset($_SESSION['cart'])) {
            $subtotal = 0;
            foreach ($_SESSION['cart'] as $value) {
                $subtotal += $value['subtotal'];
            }
            $_SESSION['total'] = $subtotal;
        }
    }
}
