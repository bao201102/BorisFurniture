<?php
class Detail extends Controller
{
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
    }

    public function index()
    {
        $this->view('index', []);
    }

    public function allProduct()
    {
        $this->ProductModel->getProductList();
        $this->view('details');
    }

}
