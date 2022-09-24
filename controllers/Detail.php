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

    public function product($prod_id)
    {
        $prod = $this->ProductModel->getProduct($prod_id);
        $this->view('details', ['prod' => $prod]);
    }

}
