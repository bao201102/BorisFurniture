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
    }

    public function product()
    {
        // goi method getproductlist
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

    public function category()
    {
        // goi method getproductlist
        $category_list = $this->CategoryModel->getCategoryList();

        $this->view('category_mgmt', ['category_list' => $category_list]);
    }

    public function addProduct()
    {
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

    public function deleteProduct($id)
    {
        if (isset($_POST['deleteProduct'])) {
            $this->ProductModel->deleteProduct($id);
            header('location:' . URLROOT . '/Admin/product');
        }
    }

    public function addCategory()
    {
        if (isset($_POST['addCategory'])) {
            $name = $_POST['category'];

            $this->CategoryModel->addCategory($name);
            header('location:' . URLROOT . '/Admin/category');
        }
    }

    public function deleteCategory($id)
    {
        if (isset($_POST['deleteCategory'])) {
            $this->CategoryModel->deleteCategory($id);
            header('location:' . URLROOT . '/Admin/category');
        }
    }

    public function uploadPicture($prod_img_id)
    {
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
