<?php
class Detail extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        $this->view('index', []);
    }

    public function product()
    {
        $this->view('details');
    }

}
