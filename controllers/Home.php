<?php
class Home extends Controller
{
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
        $this->CategoryModel = $this->model('CategoryModel');
        $this->ImageModel = $this->model('ImageModel');
        $this->CustomerModel = $this->model('CustomerModel');
    }

    public function index()
    {
        $prod = $this->ProductModel->getProductList();
        $image = array();
        foreach ($prod as $value) {
            $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
            array_push($image, $img);
        }

        $this->view('index', ['prod' => $prod, 'image' => $image]);
    }

    public function search()
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

    public function cart()
    {
        $this->view('cart', []);
    }

    public function checkout()
    {
        if (!empty($_SESSION['user_id'])) {
            if ($_SESSION['user_type'] == 1) {
                $cus = $this->CustomerModel->getCustomerByUserId($_SESSION['user_id']);
                $this->view('checkout', ['cus' => $cus]);
            }
        } else {
            $this->view('checkout', []);
        }
    }

    public function details($prod_id)
    {
        $prod = $this->ProductModel->getProduct($prod_id);
        $category = $this->CategoryModel->getCategory($this->ProductModel->getCategoryId($prod_id)); // prod[0]['category_id']
        $image = $this->ImageModel->getImage($this->ProductModel->getImageId($prod_id));
        $this->view('details', ['prod' => $prod, 'cate' => $category, 'img' => $image]);
    }
}
