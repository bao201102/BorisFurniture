<?php
class Search extends Controller
{
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
        $this->ImageModel = $this->model('ImageModel');
        $this->CategoryModel = $this->model('CategoryModel');
    }

    public function index()
    {
        $prod = $this->ProductModel->getProductList();
        $image = array();
        $category = $this->CategoryModel->getCategoryList();
        foreach ($prod as $value) {
            $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
            array_push($image, $img);
        }

        $this->view('search', ['prod' => $prod, 'image' => $image, 'cate' => $category]);
    }

    public function search()
    {
        $price = explode("-", $_POST['price']);
        $cateList = array();
        $keyword = '';
        if (isset($_POST['search-box'])) {
            $keyword = $_POST['search-box'];
        }

        if (isset($_POST['category'])) {
            $cateList = $_POST['category'];
        } else {
            $cate = $this->CategoryModel->getCategoryList();
            foreach ($cate as $value) {
                array_push($cateList, $value['category_id']);
            }
        }

        $prodList = array();
        foreach ($cateList as $value) {
            $prod = $this->ProductModel->searchProduct($price[0], $price[1], $value, $keyword);
            if (isset($prod)) {
                array_push($prodList, $prod);
            }
        }

        $image = array();
        foreach ($prodList as $prodListValue) {
            foreach ($prodListValue as $value) {
                $img = $this->ImageModel->getImage($value['prod_image_id'])[0];
                array_push($image, $img);
            }
        }
        $this->view('products', ['prodList' => $prodList, 'image' => $image]);
    }
}
