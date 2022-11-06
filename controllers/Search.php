<?php
class Search extends Controller
{
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
        $this->ImageModel = $this->model('ImageModel');
    }

    private function priceIsSet()
    {
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

    private function categoryIsSet()
    {
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

    public function nameIsSet()
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

    public function search($price1, $price2, $name)
    {
        switch ($_POST['category']) {
            case "Lamp": {
                    $prod = $this->ProductModel->searchForProduct($price1, $price2, "1", $name);
                    $image = array();
                    foreach ($prod as $value) {
                        $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                        array_push($image, $img);
                    }

                    $this->view('search', ['prod' => $prod, 'image' => $image]);
                }
            case "Chair": {
                    $prod = $this->ProductModel->searchForProduct($price1, $price2, "2", $name);
                    $image = array();
                    foreach ($prod as $value) {
                        $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                        array_push($image, $img);
                    }

                    $this->view('search', ['prod' => $prod, 'image' => $image]);
                }
            case "Accessories": {
                    $prod = $this->ProductModel->searchForProduct($price1, $price2, "3", $name);
                    $image = array();
                    foreach ($prod as $value) {
                        $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                        array_push($image, $img);
                    }

                    $this->view('search', ['prod' => $prod, 'image' => $image]);
                }
            case "Table": {
                    $prod = $this->ProductModel->searchForProduct($price1, $price2, "4", $name);
                    $image = array();
                    foreach ($prod as $value) {
                        $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                        array_push($image, $img);
                    }

                    $this->view('search', ['prod' => $prod, 'image' => $image]);
                }
        }
    }
    public function search_result()
    {
        if (isset($_POST['price']) && isset($_POST['category']) && isset($_POST['name'])) {
            if ($_POST['price'] == "all") {
                $this->search(0, 10000,$_POST['name']);
            } else {
                $s = explode("-", $_POST['price']);
                $this->search($s[0], $s[1],$_POST['name']);
            }
        } else if (isset($_POST['price']) && isset($_POST['category'])) {
            if ($_POST['price'] == "all") {
                $this->search(0, 10000,"");
            } else {
                $s = explode("-", $_POST['price']);
                $this->search($s[0], $s[1],"");
            }
        } else if (isset($_POST['price'])) {
            $this->priceIsSet();
        } else if (isset($_POST['category'])) {
            $this->categoryIsSet();
        } else if (isset($_POST['name'])) {
            $this->nameIsSet();
        }
    }
}
