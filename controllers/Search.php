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
            switch ($_POST['price']) {
                case "500": {
                        $prod = $this->ProductModel->getProductByPrice(500);
                        $image = array();
                        foreach ($prod as $value) {
                            $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                            array_push($image, $img);
                        }
                        $this->view('search', ['prod' => $prod, 'image' => $image]);
                    }
                case "1000": {
                        $prod = $this->ProductModel->getProductByPrice(1000);
                        $image = array();
                        foreach ($prod as $value) {
                            $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                            array_push($image, $img);
                        }
                        $this->view('search', ['prod' => $prod, 'image' => $image]);
                    }
                case "2000": {
                        $prod = $this->ProductModel->getProductByPrice(2000);
                        $image = array();
                        foreach ($prod as $value) {
                            $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                            array_push($image, $img);
                        }
                        $this->view('search', ['prod' => $prod, 'image' => $image]);
                    }
                default: {
                        $prod = $this->ProductModel->getProductList();
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

    public function searchByCategory()
    {
        if (isset($_POST['category'])) {
            switch ($_POST['category']) {
                case "Table": {
                        $prod = $this->ProductModel->getProductByCategory("Table");
                        $image = array();
                        foreach ($prod as $value) {
                            $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                            array_push($image, $img);
                        }
                        
                        $this->view('search', ['prod' => $prod, 'image' => $image]);
                    }
                case "Chair": {
                        $prod = $this->ProductModel->getProductByCategory("Chair");
                        $image = array();
                        foreach ($prod as $value) {
                            $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                            array_push($image, $img);
                        }

                        $this->view('search', ['prod' => $prod, 'image' => $image]);
                    }
                case "Cooking_tool": {
                        $prod = $this->ProductModel->getProductByCategory("Cooking_tool");
                        $image = array();
                        foreach ($prod as $value) {
                            $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                            array_push($image, $img);
                        }

                        $this->view('search', ['prod' => $prod, 'image' => $image]);
                    }
                case "Electric_device": {
                        $prod = $this->ProductModel->getProductByCategory("Electric_device");
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
}
