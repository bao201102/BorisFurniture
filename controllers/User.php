<?php
class User extends Controller
{
    public function __construct()
    {
        $this->UserModel = $this->model('UserModel');
    }

    public function index()
    {
        if (!empty($_SESSION['user_id'])) {
            header('location:' . URLROOT . '/User/profile');
        }
        else {
            $this->view('login_register');
        }
    }

    public function profile()
    {
        $this->view('profile');
    }

    public function login()
    {
        if (isset($_POST['submit'])) {
            $result = $this->UserModel->getUser($_POST['emailInput'], md5($_POST['passwordInput']));
            if (!empty($result)) {
                $_SESSION['user_id'] = $result[0]['user_id'];
                $_SESSION['user_type'] = $result[0]['user_type'];
                header('location:' . URLROOT . '/Home/index');
            }
            else {
                
            }
        }
    }
}
