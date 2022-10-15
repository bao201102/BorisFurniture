<?php
class Search extends Controller
{
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
    }

    public function searchByPrice()
    {
        /*switch (isset($_POST['price'])) {
            case "500": {
                    $prod = $this->ProductModel->getProductByPrice(500);
                    $image = array();
                    foreach ($prod as $value) {
                        $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                        array_push($image, $img);
                    }
                }
            case "1000": {
                    $prod = $this->ProductModel->getProductByPrice(1000);
                    $image = array();
                    foreach ($prod as $value) {
                        $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                        array_push($image, $img);
                    }
                }
            case "2000": {
                    $prod = $this->ProductModel->getProductByPrice(2000);
                    $image = array();
                    foreach ($prod as $value) {
                        $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                        array_push($image, $img);
                    }
                }
            default: {
                    $prod = $this->ProductModel->getProductList();
                    $image = array();
                    foreach ($prod as $value) {
                        $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                        array_push($image, $img);
                    }
                }
        }*/

        $prod = $this->ProductModel->getProductByPrice();
                    $image = array();
                    foreach ($prod as $value) {
                        $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                        array_push($image, $img);
                    }

        $this->view('search', ['prod' => $prod, 'image' => $image]);
    }
}
