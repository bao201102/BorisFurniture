<?php
class User extends Controller
{
    public function __construct()
    {
        $this->UserModel = $this->model('UserModel');
        $this->CustomerModel = $this->model('CustomerModel');
    }

    public function index()
    {
        if (!empty($_SESSION['user_id'])) {
            header('location:' . URLROOT . '/User/profile');
        } else {
            $this->view('login_register');
        }
    }

    public function profile()
    {
        $cus = $this->CustomerModel->getCustomerByUserId($_SESSION['user_id']);
        $this->view('profile', ['cus' => $cus]);
    }

    public function login()
    {
        if (!empty($_SESSION['user_id'])) {
            header('location:' . URLROOT . '/User/profile');
        } else {
            if (isset($_POST['submit'])) {
                $user = $this->UserModel->getUser($_POST['emailInput'], md5($_POST['passwordInput']));
                if (!empty($user)) {
                    $_SESSION['user_id'] = $user[0]['user_id'];
                    $_SESSION['user_type'] = $user[0]['user_type'];
                    header('location:' . URLROOT . '/Home/index');
                }
            }
        }
    }
}
