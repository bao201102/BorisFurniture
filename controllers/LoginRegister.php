<?php
class LoginRegister extends Controller
{
    public function __construct()
    {
        $this->UserModel = $this->model('UserModel');
    }

    public function index()
    {
        $this->view('login_register');
    }

    public function login()
    {
        if (isset($_POST['submit'])) {
            $result = $this->UserModel->getUser($_POST['emailInput'], md5($_POST['passwordInput']));
            if (!empty($result)) {
                header('location:' . URLROOT . '/Home/index');
            }
            else {

            }
        }
    }
}
