<?php
class Search extends Controller
{
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
        $this->ImageModel = $this->model('ImageModel');
        $this->CategoryModel = $this->model('CategoryModel');
    }

    public function index()
    {
        $category = $this->CategoryModel->getCategoryList();

        $this->view('search', ['cate' => $category]);
    }

    public function search()
    {
        //Cắt chuỗi cho $price
        $price = explode("-", $_POST['price']);

        //Từ khóa mặc định là trống nếu không được nhập vào
        $keyword = '';
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
        }

        //Category mặc định là tất cả nếu người dùng không chọn cái nào
        $cateList = array();
        if (isset($_POST['category'])) {
            $cateList = $_POST['category'];
        } else {
            $cate = $this->CategoryModel->getCategoryList();
            foreach ($cate as $value) {
                array_push($cateList, $value['category_id']);
            }
        }

        //Thực hiện truy vấn search dựa theo số lượng Category đã lựa chọn
        $prodList = array();
        foreach ($cateList as $value) {
            $prod = $this->ProductModel->searchProduct($price[0], $price[1], $value, $keyword);
            if (isset($prod)) {
                array_push($prodList, $prod);
            }
        }

        $image = array();
        foreach ($prodList as $prodListValue) {
            foreach ($prodListValue as $value) {
                $img = $this->ImageModel->getImage($value['prod_image_id'])[0];
                array_push($image, $img);
            }
        }

        $this->view('products', ['prodList' => $prodList, 'image' => $image]);
    }
}
