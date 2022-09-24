<?php
class Checkout extends Controller
{
    public function __construct()
    {
        
    }

    public function show()
    {
        $this->view('checkout', []);
    }
}
