<?php
class ProductModel
{
    var $prod_id;
    var $prod_name;
    var $prod_quantity;
    var $prod_price;
    var $category_id;
    var $prod_description;
    var $prod_image_id;
    var $status;

    public function getId()
    {
        return $this->prod_id;
    }
    public function getName()
    {
        return $this->prod_name;
    }
    public function getQuantity()
    {
        return $this->prod_quantity;
    }
    public function getPrice()
    {
        return $this->prod_price;
    }
    public function getIdCategory()
    {
        return $this->category_id;
    }
    public function getDes()
    {
        return $this->prod_description;
    }
    public function getIdImage()
    {
        return $this->prod_image_id;
    }
    public function getStatus()
    {
        return $this->status;
    }

    public function __contruct($prod_id, $prod_name, $prod_quantity, $prod_price, $category_id, $prod_description, $prod_image_id, $status)
    {
        $this->prod_id = $prod_id;
        $this->prod_name = $prod_name;
        $this->prod_quantity = $prod_quantity;
        $this->prod_price = $prod_price;
        $this->category_id = $category_id;
        $this->prod_description = $prod_description;
        $this->prod_image_id = $prod_image_id;
        $this->status = $status;
    }

    public function getProductList()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "select * from tbl_product where status = 1");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getProduct($id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "select * from tbl_product where prod_id = '$id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getCategoryId($id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "select category_id from tbl_product where prod_id = $id");
        $data = $result[0]['category_id'];
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getImageId($id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "select prod_image_id from tbl_product where prod_id = '$id'");
        $data = $result[0]['prod_image_id'];
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function countProduct()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT COUNT(prod_id) FROM tbl_product");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function addProduct($id, $name, $quantity, $price, $cate_id, $description, $img_id, $status)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_product VALUES ($id, $name, $quantity, $price, $cate_id, $description, $img_id, $status)");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getProductByPrice($price)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product WHERE STATUS = 1 AND prod_price < '$price'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }
}
