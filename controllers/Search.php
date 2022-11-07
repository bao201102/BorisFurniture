<?php
class Search extends Controller
{
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
        $this->ImageModel = $this->model('ImageModel');
        $this->CategoryModel = $this->model('CategoryModel');
    }

    private function priceIsSet()
    {
        if ($_POST['price'] == "all") {
            $prod = $this->ProductModel->getProductList();
            $image = array();
            $category = $this->CategoryModel->getCategoryList();
            foreach ($prod as $value) {
                $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                array_push($image, $img);
            }
            $this->view('search', ['prod' => $prod, 'image' => $image, 'cate' => $category]);
        } else {
            $s = explode("-", $_POST['price']);
            $prod = $this->ProductModel->getProductByPrice($s[0], $s[1]);
            $image = array();
            $category = $this->CategoryModel->getCategoryList();
            foreach ($prod as $value) {
                $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                array_push($image, $img);
            }
            $this->view('search', ['prod' => $prod, 'image' => $image, 'cate' => $category]);
        }
    }

    private function categoryIsSet()
    {
        if (isset($_POST['category'])) {
            $prod = $this->ProductModel->getProductByCategory($_POST['category']);
            $image = array();
            $category = $this->CategoryModel->getCategoryList();
            foreach ($prod as $value) {
                $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                array_push($image, $img);
            }

            $this->view('search', ['prod' => $prod, 'image' => $image, 'cate' => $category]);
        }
    }

    public function nameIsSet()
    {
        if (isset($_POST['name'])) {
            $prod = $this->ProductModel->getProductByName($_POST['name']);
            $image = array();
            $category = $this->CategoryModel->getCategoryList();
            foreach ($prod as $value) {
                $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                array_push($image, $img);
            }

            $this->view('search', ['prod' => $prod, 'image' => $image, 'cate' => $category]);
        }
    }

    public function search($price1, $price2, $name)
    {
        if (isset($_POST['category'])) {
            $prod = $this->ProductModel->searchForProduct($price1, $price2, $_POST['category'], $name);
            $image = array();
            $category = $this->CategoryModel->getCategoryList();
            foreach ($prod as $value) {
                $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                array_push($image, $img);
            }

            $this->view('search', ['prod' => $prod, 'image' => $image, 'cate' => $category]);
        }
    }
    public function search_result()
    {
        if (isset($_POST['price']) && isset($_POST['category']) && isset($_POST['name'])) {
            if ($_POST['price'] == "all") {
                $this->search(0, 10000, $_POST['name']);
            } else {
                $s = explode("-", $_POST['price']);
                $this->search($s[0], $s[1], $_POST['name']);
            }
        } else if (isset($_POST['price']) && isset($_POST['category'])) {
            if ($_POST['price'] == "all") {
                $this->search(0, 10000, "");
            } else {
                $s = explode("-", $_POST['price']);
                $this->search($s[0], $s[1], "");
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
