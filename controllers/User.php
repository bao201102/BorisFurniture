<?php
class User extends Controller
{
    public function __construct()
    {
        $this->UserModel = $this->model('UserModel');
        $this->CustomerModel = $this->model('CustomerModel');
        $this->EmployeeModel = $this->model('EmployeeModel');
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
        if (!empty($_SESSION['user_id'])) {
            if ($_SESSION['user_type'] == 0) {
                header('location:' . URLROOT . '/Admin/product_mgmt');
            } else if ($_SESSION['user_type'] == 1) {
                $cus = $this->CustomerModel->getCustomerByUserId($_SESSION['user_id']);
                $this->view('profile', ['cus' => $cus]);
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header('location:' . URLROOT . '/Home/index');
    }

    public function login()
    {
        if (!empty($_SESSION['signin'])) {
            header('location:' . URLROOT . '/Home/index');
        } else {
            if (isset($_POST['signin'])) {
                $user = $this->UserModel->getUser($_POST['emailInput'], md5($_POST['passwordInput']));
                if (!empty($user)) {
                    $_SESSION['user_id'] = $user[0]['user_id'];
                    $_SESSION['user_type'] = $user[0]['user_type'];
                    $_SESSION['user_email'] = $user[0]['email'];  

                    if ($_SESSION['user_type'] == 0) {
                        $employee = $this->EmployeeModel->getEmployeeByUserId($_SESSION['user_id']);
                        $_SESSION['user_name'] = $employee[0]['lastname'] . " " . $employee[0]['firstname'];
                        header('location:' . URLROOT . '/Admin/index');
                    } else if ($_SESSION['user_type'] == 1) {
                        header('location:' . URLROOT . '/User/index');
                    }
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
                $userResult = $this->UserModel->addUser($_POST['emailInput'], md5($_POST['passwordInput1']), 1);
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

    public function editProfile()
    {
        if (isset($_POST['editProfile'])) {
            $userResult = $this->UserModel->changeEmail($_SESSION['user_id'], $_POST['emailInput']);
            if ($userResult) {
                $customerResult = $this->CustomerModel->editCustomer($_SESSION['user_id'], $_POST['firstNameInput'], $_POST['lastNameInput'], $_POST['birthdayInput'], $_POST['phoneInput']);
                if ($customerResult) {
                    header('location:' . URLROOT . '/User/profile');
                }
            }
        }
    }

    public function editAccount()
    {
        if (isset($_POST['editAccount'])) {
            $user = $this->UserModel->getUser($_SESSION['user_email'], md5($_POST['oldPasswordInput']));
            if (!empty($user)) {
                if ($this->validatePassword()) {
                    echo "unmatch password";
                } else {
                    $userResult = $this->UserModel->changePassword($_SESSION['user_id'], md5($_POST['passwordInput1']));
                    if ($userResult) {
                        header('location:' . URLROOT . '/User/profile');
                    } else {
                        echo "change failed";
                    }
                }
            } else {
                echo "empty user";
            }
        }
    }
}
