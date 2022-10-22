<?php
class Search extends Controller
{
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
        $this->ImageModel = $this->model('ImageModel');
    }

    public function searchByPrice()
    {
        if (isset($_POST['price'])) {
            if ($_POST['price'] == "all") {
                $prod = $this->ProductModel->getProductList();
                $image = array();
                foreach ($prod as $value) {
                    $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                    array_push($image, $img);
                }
                $this->view('search', ['prod' => $prod, 'image' => $image]);
            } else {
                $s = explode("-", $_POST['price']);
                $prod = $this->ProductModel->getProductByPrice($s[0], $s[1]);
                $image = array();
                foreach ($prod as $value) {
                    $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                    array_push($image, $img);
                }
                $this->view('search', ['prod' => $prod, 'image' => $image]);
            }
        }
    }

    public function searchByCategory()
    {
        if (isset($_POST['category'])) {
            switch ($_POST['category']) {
                case "Lamp": {
                        $prod = $this->ProductModel->getProductByCategory("1");
                        $image = array();
                        foreach ($prod as $value) {
                            $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                            array_push($image, $img);
                        }

                        $this->view('search', ['prod' => $prod, 'image' => $image]);
                    }
                case "Chair": {
                        $prod = $this->ProductModel->getProductByCategory("2");
                        $image = array();
                        foreach ($prod as $value) {
                            $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                            array_push($image, $img);
                        }

                        $this->view('search', ['prod' => $prod, 'image' => $image]);
                    }
                case "Accessories": {
                        $prod = $this->ProductModel->getProductByCategory("3");
                        $image = array();
                        foreach ($prod as $value) {
                            $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                            array_push($image, $img);
                        }

                        $this->view('search', ['prod' => $prod, 'image' => $image]);
                    }
                case "Table": {
                        $prod = $this->ProductModel->getProductByCategory("4");
                        $image = array();
                        foreach ($prod as $value) {
                            $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                            array_push($image, $img);
                        }

                        $this->view('search', ['prod' => $prod, 'image' => $image]);
                    }
            }
        }
    }

    public function searchByName()
    {
        if (isset($_POST['name'])) {
            $prod = $this->ProductModel->getProductByName($_POST['name']);
            $image = array();
            foreach ($prod as $value) {
                $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                array_push($image, $img);
            }

            $this->view('search', ['prod' => $prod, 'image' => $image]);
        }
    }
}
