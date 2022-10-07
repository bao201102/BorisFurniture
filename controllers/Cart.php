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
            $product = array("prod_id" => $prod[0]['prod_id'], "prod_name" => $prod[0]['prod_name'], "prod_img" => $image[0]['img_link'], "prod_price" => $prod[0]['prod_price'], "prod_quantity_max" => $prod[0]['prod_quantity'], "prod_quantity_cart" => $_POST['prod_quantity']);

            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
                if (!array_key_exists($product["prod_id"], $cart)) {
                    $cart[$product["prod_id"]] = $product; //key lay theo id san pham
                } else {
                   $temp= $cart[$product["prod_id"]]['prod_quantity_cart'] + $product['prod_quantity_cart'];
                    if ($temp > $product['prod_quantity_max']) {
                        $cart[$product["prod_id"]]['prod_quantity_cart'] = $product['prod_quantity_max'];
                    }
                    else{
                        $cart[$product["prod_id"]]['prod_quantity_cart']=$temp;
                    }
                }
                $_SESSION['cart'] = $cart;
            } else {
                $cart[$product["prod_id"]] = $product;
                $_SESSION['cart'] = $cart;
            }
            header('location:' . URLROOT . '/Home/cart');
        }
    }

    function deleteProduct($key)
    {
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            unset($cart[$key]);
            $_SESSION['cart'] = $cart;
            header('location:' . URLROOT . '/Home/cart');
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
}
