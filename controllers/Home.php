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
        $prod = $this->ProductModel->getProductListLatest();
        $image = array();
        foreach ($prod as $value) {
            $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
            array_push($image, $img);
        }

        $this->view('index', ['prod' => $prod, 'image' => $image]);
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
        $prodByCate = $this->ProductModel->getProductByCategory($prod[0]['category_id']);
        $image = $this->ImageModel->getImage($this->ProductModel->getImageId($prod_id));
        $imageByCate = array();
        foreach ($prodByCate as $value) {
            $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
            array_push($imageByCate, $img);
        }
        $this->view('details', ['prod' => $prod, 'cate' => $category, 'prodByCate' => $prodByCate, 'imageByCate' => $imageByCate, 'img' => $image]);
    }
}
