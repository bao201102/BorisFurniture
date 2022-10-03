<?php
class Home extends Controller
{
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
        $this->CategoryModel = $this->model('CategoryModel');
    }

    public function index()
    {
        // goi method getproductlist
        $prod = $this->ProductModel->getProductList();

        //goi va show du lieu ra view
        $this->view('index', ['prod' => $prod]);
    }

    public function search()
    {
        // goi method getproductlist
        $prod = $this->ProductModel->getProductList();

        //goi va show du lieu ra view
        $this->view('search', ['prod' => $prod]);
    }

    public function cart()
    {
        $this->view('cart', []);
    }

    public function login_register()
    {
        $this->view('login_register');
    }

    public function checkout()
    {
        $this->view('checkout', []);
    }

    public function details($prod_id)
    {
        $prod = $this->ProductModel->getProduct($prod_id);
        // $category = $this->CategoryModel->getCategory($prod[0]->getIdCategory());
        $this->view('details', ['prod' => $prod]);
    }
}
