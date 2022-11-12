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
            // $category_list = $this->CategoryModel->getCategoryList();
            // $this->view('product_mgmt', ['category_list' => $category_list]);
        }
    }

    public function showEdit($id)
    {
        if ($_SESSION['user_type'] == 0) {
            if (isset($_POST['editEmployee'])) {
                $emp = $this->EmployeeModel->getEmployeeByUserId($id);
                $this->view('editpage', ['emp' => $emp]);
            } else if (isset($_POST['editProduct'])) {
                $prod = $this->ProductModel->getProduct($id);
                $category_list = $this->CategoryModel->getCategoryList();
                $this->view('editpage', ['prod' => $prod, 'category_list' => $category_list]);
            } else if (isset($_POST['editCategory'])) {
                $cate = $this->CategoryModel->getCategory($id);
                $this->view('editpage', ['cate' => $cate]);
            } else if (isset($_POST['editCustomer'])) {
                $cus = $this->CustomerModel->getCustomerByUserId($id);
                $this->view('editpage', ['cus' => $cus]);
            }
        }
    }

    // Product Management

    public function product()
    {
        if ($_SESSION['user_type'] == 0) {
            $category_list = $this->CategoryModel->getCategoryList();

            $this->view('product_mgmt', ['category_list' => $category_list]);

            // $prod = $this->ProductModel->getProductList();
            // $category_name = array();
            // $image = array();
            // $category_list = $this->CategoryModel->getCategoryList();
            // foreach ($prod as $value) {
            //     $cate = $this->CategoryModel->getCategory($this->ProductModel->getCategoryId($value['prod_id']));
            //     $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
            //     array_push($image, $img);
            //     array_push($category_name, $cate);
            // }

            // $this->view('product_mgmt', ['prod' => $prod, 'category' => $category_name, 'image' => $image, 'category_list' => $category_list]);
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

    public function search()
    {
        $keyword = '';
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
        }

        $cateArray = array();

        $cateList = array();
        if ($_POST['category'] == 'all') {
            $cateList = $this->CategoryModel->getCategoryIdList();
        } else {
            $cateArray['category_id'] = $_POST['category'];
            array_push($cateList, $cateArray);
        }

        $category_name = array();
        $prodList = $this->ProductModel->searchProductAdmin($keyword, $cateList);
        foreach ($prodList as $value) {
            $cate = $this->CategoryModel->getCategory($value['category_id']);
            array_push($category_name, $cate);
        }

        $image = array();
        foreach ($prodList as $value) {
            $img = $this->ImageModel->getImage($value['prod_image_id'])[0];
            array_push($image, $img);
        }

        $this->view('product_mgmt_sub', ['prodList' => $prodList, 'image' => $image, 'category' => $category_name]);
    }

    public function editProduct()
    {
        if ($_SESSION['user_type'] == 0) {
            if (isset($_POST['editProduct'])) {
                switch ($_POST['editProduct']) {
                    case 'edit':
                        $this->ProductModel->editProduct($_POST['prod_id'], $_POST['prod_name'], $_POST['prod_quantity'], $_POST['category'], $_POST['prod_price'], $_POST['description']);
                        header('location:' . URLROOT . '/Admin/product');
                        break;

                    case 'cancel':
                        header('location:' . URLROOT . '/Admin/product');
                        break;

                    default:
                        break;
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
                $check = $this->CategoryModel->duplicateCategory($name);
                if ($name == $check) {
                    $this->CategoryModel->editStatusCategory($name);
                    header('location:' . URLROOT . '/Admin/category');
                } else {
                    $this->CategoryModel->addCategory($name);
                    header('location:' . URLROOT . '/Admin/category');
                }
            }
        }
    }

    public function editCategory()
    {
        if ($_SESSION['user_type'] == 0) {
            if (isset($_POST['editCategory'])) {
                switch ($_POST['editCategory']) {
                    case 'edit':
                        $this->CategoryModel->editCategory($_POST['cate_id'], $_POST['category_name']);
                        header('location:' . URLROOT . '/Admin/category');
                        break;

                    case 'cancel':
                        header('location:' . URLROOT . '/Admin/category');
                        break;

                    default:
                        break;
                }
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

    public function editProfile()
    {
        if ($_SESSION['user_type'] == 0) {
            if (isset($_POST['editProfile'])) {
                switch ($_POST['editProfile']) {
                    case 'edit':
                        $this->UserModel->changeEmail($_POST['user_id'], $_POST['emailInput']);
                        $this->EmployeeModel->editEmployee($_POST['user_id'], $_POST['firstNameInput'], $_POST['lastNameInput'], $_POST['birthdayInput'], $_POST['phoneInput']);
                        header('location:' . URLROOT . '/Admin/employee');
                        break;

                    case 'cancel':
                        header('location:' . URLROOT . '/Admin/employee');
                        break;

                    default:
                        break;
                }
            }
        }
    }

    public function editAccount()
    {
        if ($_SESSION['user_type'] == 0) {
            if (isset($_POST['editAccount'])) {
                switch ($_POST['editAccount']) {
                    case 'edit':
                        if ($this->validatePassword()) {
                            echo "unmatch password";
                        } else {
                            $this->UserModel->changePassword($_POST['user_id'], md5($_POST['passwordInput1']));
                            header('location:' . URLROOT . '/Admin/employee');
                        }
                        break;

                    case 'cancel':
                        header('location:' . URLROOT . '/Admin/employee');
                        break;

                    default:
                        break;
                }
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

    public function editCustomer()
    {
        if ($_SESSION['user_type'] == 0) {
            if (isset($_POST['editCustomer'])) {
                switch ($_POST['editCustomer']) {
                    case 'edit':
                        $this->CustomerModel->editCustomer($_POST['user_id'], $_POST['firstNameInput'], $_POST['lastNameInput'], $_POST['birthdayInput'], $_POST['phoneInput']);
                        $this->UserModel->changeEmail($_POST['user_id'], $_POST['emailInput']);
                        header('location:' . URLROOT . '/Admin/customer');
                        break;

                    case 'cancel':
                        header('location:' . URLROOT . '/Admin/customer');
                        break;

                    default:
                        break;
                }
            }
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
