<?php
class Home extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        $this->view('index', []);
    }

    public function search()
    {
        $this->view('search');
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
