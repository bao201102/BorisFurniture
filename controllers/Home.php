<?php
class Home extends Controller
{
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
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

    public function shopping_cart()
    {
        $this->view('shopping_cart');
    }

    public function login_register()
    {
        $this->view('login_register');
    }
}
