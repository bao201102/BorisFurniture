<?php
class User extends Controller
{
    public function __construct()
    {
        $this->UserModel = $this->model('UserModel');
        $this->CustomerModel = $this->model('CustomerModel');
    }

    public function index($msg = [])
    {
        if (!empty($_SESSION['user_id'])) {
            header('location:' . URLROOT . '/User/profile');
        } else {
            $this->view('login_register', ['msg' => $msg]);
        }
    }

    public function profile()
    {
        $cus = $this->CustomerModel->getCustomerByUserId($_SESSION['user_id']);
        $this->view('profile', ['cus' => $cus]);
    }

    public function logout()
    {
        session_destroy();
        header('location:' . URLROOT . '/Home/index');
    }

    public function login()
    {
        if (!empty($_SESSION['signin'])) {
            header('location:' . URLROOT . '/User/profile');
        } else {
            if (isset($_POST['signin'])) {
                $user = $this->UserModel->getUser($_POST['emailInput'], md5($_POST['passwordInput']));
                if (!empty($user)) {
                    $_SESSION['user_id'] = $user[0]['user_id'];
                    $_SESSION['user_type'] = $user[0]['user_type'];
                    header('location:' . URLROOT . '/Home/index');
                }
            }
        }
    }

    public function validateEmail()
    {
        //Check if email exist
        $user = $this->UserModel->getUserList();
        foreach ($user as $value) {
            if ($value['email'] == $_POST['emailInput']) {
                return true;
            }
        }
    }

    public function validatePassword()
    {
        //Check if password is correct
        if ($_POST['passwordInput1'] != $_POST['passwordInput2']) {
            return true;
        }
    }

    public function register()
    {
        if (isset($_POST['signup'])) {

            if ($this->validateEmail()) {
                header('location:' . URLROOT . '/User/index/emailexist');
            } else if ($this->validatePassword()) {
                header('location:' . URLROOT . '/User/index/wrongpass');
            } else {
                $userResult = $this->UserModel->addUser($_POST['emailInput'], md5($_POST['passwordInput1']));
                if ($userResult) {
                    $user_id = $this->UserModel->getUserId($_POST['emailInput'])[0]['user_id'];
                    $customerResult = $this->CustomerModel->addCustomer($user_id, $_POST['firstNameInput'], $_POST['lastNameInput'], $_POST['birthdayInput'], $_POST['phoneInput']);
                    if ($customerResult) {
                        header('location:' . URLROOT . '/User/index/success');
                    }
                }
            }
        }
    }
}