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

    public function product_mgmt()
    {
        // goi method getproductlist
        $prod = $this->ProductModel->getProductList();
        $category_name = array();
        $image = array();
        foreach ($prod as $value) {
            $cate = $this->CategoryModel->getCategory($this->ProductModel->getCategoryId($value['prod_id']));
            $img = $this->ImageModel->getImage($this->ProductModel->getImageId($value['prod_id']))[0];
            array_push($image, $img);
            array_push($category_name, $cate);
        }

        //goi va show du lieu ra view
        $this->view('product_mgmt', ['prod' => $prod, 'category' => $category_name, 'image' => $image]);
    }

    public function addProduct()
    {
        if (isset($_POST['addProduct'])) {
            // $prod = $this->ProductModel->addProduct($id, $name, $quantity, $price, $cate_id, $description, $img_id, $status);
            // $product = array(
            //     "prod_name" => $_POST['prod_name'], "prod_img" => $_POST['image'], "prod_price" => $_POST['prod_price'],
            //     "prod_quantity" => $_POST['prod_quantity'], "description" => $_POST['description'], "category" => $_POST['category']
            // );
            $prod_name = $_POST['prod_name'];
            $prod_img = $_POST['image'];
            $prod_price = $_POST['prod_price'];
            $prod_quantity = $_POST['prod_quantity'];
            $description = $_POST['description'];
            $category_id = $_POST['category'];
        }
    }
}
