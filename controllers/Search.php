<?php
class Search extends Controller
{
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
    }

    public function searchByPrice()
    {
        if (isset($_POST['under_500'])) {
            $prod = $this->ProductModel->getProductByPrice(500);
            $image = array();
            foreach ($prod as $value) {
                $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                array_push($image, $img);
            }
        } else if (isset($_POST['under_1000'])) {
            $prod = $this->ProductModel->getProductByPrice(1000);
            $image = array();
            foreach ($prod as $value) {
                $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                array_push($image, $img);
            }
        } else if (isset($_POST['under_2000'])) {
            $prod = $this->ProductModel->getProductByPrice(2000);
            $image = array();
            foreach ($prod as $value) {
                $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                array_push($image, $img);
            }
        } else {
            $prod = $this->ProductModel->getProductList();
            $image = array();
            foreach ($prod as $value) {
                $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                array_push($image, $img);
            }
        }

        $this->view('search', ['prod' => $prod, 'image' => $image]);
    }
}
