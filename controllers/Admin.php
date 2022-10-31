<?php
class Admin extends Controller
{
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
        $this->CategoryModel = $this->model('CategoryModel');
        $this->ImageModel = $this->model('ImageModel');
        $this->UserModel = $this->model('UserModel');
        $this->CustomerModel = $this->model('CustomerModel');
        $this->EmployeeModel = $this->model('EmployeeModel');
    }

    public function index()
    {
        if ($_SESSION['user_type'] == 0) {
            header('location:' . URLROOT . '/Admin/product');
        }
    }

    public function showEdit($id)
    {
        if ($_SESSION['user_type'] == 0) {
            if (isset($_POST['editEmployee'])) {
                $emp = $this->EmployeeModel->getEmployeeByUserId($id);
                $user = $this->UserModel->getUserById($id);
                $this->view('editpage', ['emp' => $emp, 'user' => $user]);
            }
        }
    }

    // Product Management

    public function product()
    {
        if ($_SESSION['user_type'] == 0) {
            $prod = $this->ProductModel->getProductList();
            $category_name = array();
            $image = array();
            $category_list = $this->CategoryModel->getCategoryList();
            foreach ($prod as $value) {
                $cate = $this->CategoryModel->getCategory($this->ProductModel->getCategoryId($value['prod_id']));
                $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                array_push($image, $img);
                array_push($category_name, $cate);
            }

            $this->view('product_mgmt', ['prod' => $prod, 'category' => $category_name, 'image' => $image, 'category_list' => $category_list]);
        }
    }

    public function addProduct()
    {
        if ($_SESSION['user_type'] == 0) {
            if (isset($_POST['addProduct'])) {
                $prod_name = $_POST['prod_name'];
                $prod_price = $_POST['prod_price'];
                $prod_quantity = $_POST['prod_quantity'];
                $description = $_POST['description'];
                $category_id = $_POST['category'];

                // echo $prod_name ;
                // echo $prod_price ;
                // echo $prod_quantity;
                // echo $description ;
                // echo $category_id ;


                $prodResult = $this->ProductModel->addProduct($prod_name, $prod_quantity, $prod_price, $category_id, $description);
                if ($prodResult) {
                    $prod_id = $this->ProductModel->getProductId();
                    if ($prod_id < 10) {
                        $prod_img_id = "img0" . $prod_id;
                    } else {
                        $prod_img_id = "img" . $prod_id;
                    }
                    $this->ProductModel->addImageIdProduct($prod_id, $prod_img_id);
                    $this->uploadPicture($prod_img_id);
                    header('location:' . URLROOT . '/Admin/product');
                }
            }
        }
    }

    public function deleteProduct($id)
    {
        if ($_SESSION['user_type'] == 0) {
            if (isset($_POST['deleteProduct'])) {
                $this->ProductModel->deleteProduct($id);
                header('location:' . URLROOT . '/Admin/product');
            }
        }
    }

    public function uploadPicture($prod_img_id)
    {
        if ($_SESSION['user_type'] == 0) {
            if (isset($_POST['addProduct'])) {
                $countfiles = count($_FILES['fileToUpload']['name']);

                for ($i = 0; $i < $countfiles; $i++) {
                    $filename = $_FILES['fileToUpload']['name'][$i];
                    $s = explode(".", $filename);
                    $this->ImageModel->addImage($prod_img_id, $prod_img_id . "-" . ($i + 1) . "." . $s[1]);
                    move_uploaded_file($_FILES['fileToUpload']['tmp_name'][$i], APPROOT . "/public/img/" . $prod_img_id . "-" . ($i + 1) . "." . $s[1]);
                }
            }
        }
    }

    // Category Management

    public function category()
    {
        if ($_SESSION['user_type'] == 0) {
            $category_list = $this->CategoryModel->getCategoryList();
            $count_prod = array();
            foreach ($category_list as $value) {
                $id = $value['category_id'];
                $count = $this->CategoryModel->countProdPerCate($id);
                array_push($count_prod, $count);
            }
            // echo var_dump($count_prod[0][0]['COUNT(category_id)']);
            $this->view('category_mgmt', ['category_list' => $category_list, 'count_prod' => $count_prod]);
        }
    }

    public function addCategory()
    {
        if ($_SESSION['user_type'] == 0) {
            if (isset($_POST['addCategory'])) {
                $name = $_POST['category'];

                $this->CategoryModel->addCategory($name);
                header('location:' . URLROOT . '/Admin/category');
            }
        }
    }

    public function deleteCategory($id)
    {
        if ($_SESSION['user_type'] == 0) {
            if (isset($_POST['deleteCategory'])) {
                $this->CategoryModel->deleteCategory($id);
                header('location:' . URLROOT . '/Admin/category');
            }
        }
    }

    public function searchByCategory()
    {
        if ($_SESSION['user_type'] == 0) {
            if (isset($_POST['category'])) {
                if ($_POST['category'] == "all") {
                    header('location:' . URLROOT . '/Admin/product');
                } else {
                    $prod = $this->ProductModel->getProductByCategory($_POST['category']);
                    $category_name = array();
                    $image = array();
                    $category_list = $this->CategoryModel->getCategoryList();
                    foreach ($prod as $value) {
                        $cate = $this->CategoryModel->getCategory($this->ProductModel->getCategoryId($value['prod_id']));
                        $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
                        array_push($image, $img);
                        array_push($category_name, $cate);
                    }

                    $this->view('product_mgmt', ['prod' => $prod, 'category' => $category_name, 'image' => $image, 'category_list' => $category_list]);
                }
            }
        }
    }

    // Employee Management

    public function employee()
    {
        if ($_SESSION['user_type'] == 0) {
            $emp = $this->EmployeeModel->getEmpList();
            $this->view("employee_mgmt", ['emp' => $emp]);
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

    public function addEmployee()
    {
        if ($_SESSION['user_type'] == 0) {
            if (isset($_POST['addEmployee'])) {
                if ($this->validateEmail()) {
                } else if ($this->validatePassword()) {
                } else {
                    $userResult = $this->UserModel->addUser($_POST['emailInput'], md5($_POST['passwordInput1']), 0);
                    if ($userResult) {
                        $user_id = $this->UserModel->getUserId($_POST['emailInput'])[0]['user_id'];
                        $EmployeeResult = $this->EmployeeModel->addEmployee($user_id, $_POST['firstNameInput'], $_POST['lastNameInput'], $_POST['birthdayInput'], $_POST['phoneInput']);
                        if ($EmployeeResult) {
                            header('location:' . URLROOT . '/Admin/employee');
                        }
                    }
                }
            }
        }
    }

    public function editProfile($id)
    {
        if (isset($_POST['editProfile'])) {
            $userResult = $this->UserModel->changeEmail($id, $_POST['emailInput']);
            if ($userResult) {
                $customerResult = $this->CustomerModel->editCustomer($_SESSION['user_id'], $_POST['firstNameInput'], $_POST['lastNameInput'], $_POST['birthdayInput'], $_POST['phoneInput']);
                if ($customerResult) {
                    header('location:' . URLROOT . '/User/profile');
                }
            }
        }
    }

    public function editAccount($id)
    {
        if (isset($_POST['editAccount'])) {
            $userResult = $this->UserModel->changePassword($_SESSION['user_id'], md5($_POST['passwordInput1']));
            if ($userResult) {
                header('location:' . URLROOT . '/User/profile');
            }
        }
    }

    public function deleteEmployee($id)
    {
        if ($_SESSION['user_type'] == 0) {
            if (isset($_POST['deleteEmployee'])) {
                $this->EmployeeModel->deleteEmployee($id);
                $this->UserModel->deleteUser($id);
                header('location:' . URLROOT . '/Admin/employee');
            }
        }
    }

    // Customer Management
    public function customer()
    {
        if ($_SESSION['user_type'] == 0) {
            $cus = $this->CustomerModel->getCustomerList();
            $this->view("customer_mgmt", ['cus' => $cus]);
        }
    }

    public function deleteCustomer($id)
    {
        if ($_SESSION['user_type'] == 0) {
            if (isset($_POST['deleteCustomer'])) {
                $this->CustomerModel->deleteCustomer($id);
                $this->UserModel->deleteUser($id);
                header('location:' . URLROOT . '/Admin/customer');
            }
        }
    }
}
