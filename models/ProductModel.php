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
    var $STATUS;

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
    public function getSTATUS()
    {
        return $this->STATUS;
    }

    public function __contruct($prod_id, $prod_name, $prod_quantity, $prod_price, $category_id, $prod_description, $prod_image_id, $STATUS)
    {
        $this->prod_id = $prod_id;
        $this->prod_name = $prod_name;
        $this->prod_quantity = $prod_quantity;
        $this->prod_price = $prod_price;
        $this->category_id = $category_id;
        $this->prod_description = $prod_description;
        $this->prod_image_id = $prod_image_id;
        $this->STATUS = $STATUS;
    }

    public function getProductList()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product WHERE STATUS = 1");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getProduct($id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product WHERE prod_id = '$id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getProductId()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT prod_id FROM tbl_product WHERE prod_image_id is NULL");
        $data = $result[0]['prod_id'];
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getCategoryId($id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT category_id FROM tbl_product WHERE prod_id = '$id'");
        $data = $result[0]['category_id'];
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getImageId($id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT prod_image_id FROM tbl_product WHERE prod_id = '$id'");
        $data = $result[0]['prod_image_id'];
        giaiPhongBoNho($link, $result);
        return $data;
    }

    // public function countProduct()
    // {
    //     $link = null;
    //     taoKetNoi($link);
    //     $result = chayTruyVanTraVeDL($link, "SELECT COUNT(prod_id) FROM tbl_product");
    //     $data = $result;
    //     giaiPhongBoNho($link, $result);
    //     return $data;
    // }

    public function addProduct($name, $quantity, $price, $cate_id, $description)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_product (prod_name, prod_quantity, prod_price, category_id, prod_description, STATUS) 
                                                    VALUES ('$name', '$quantity', '$price', '$cate_id', '$description', '1')");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteProduct($id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE tbl_product SET STATUS = b'0' WHERE prod_id = '$id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function addImageIdProduct($id, $prod_image_id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE tbl_product SET prod_image_id = '$prod_image_id' WHERE prod_id = '$id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function getProductByPrice($price1, $price2)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product WHERE STATUS = 1 AND prod_price BETWEEN '$price1' AND '$price2'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getProductByCategory($category)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product WHERE STATUS = 1 AND category_id = '$category'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getProductByName($name)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product WHERE STATUS = 1 AND prod_name LIKE '%$name%'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function searchForProduct($price1,$price2,$category,$name)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product WHERE STATUS = 1 AND prod_name LIKE '%$name%' AND category_id = '$category' AND prod_price BETWEEN '$price1' AND '$price2'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function countPage()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT count(*) FROM tbl_product");
        $num_on_page = 10;
        $total = ceil($result[0] / $num_on_page);
        return $total;
    }

    public function pagination($page)
    {
        $link = null;
        taoKetNoi($link);
        // $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $page = is_numeric($page) ? $page : 1;
        $num_on_page = 10;
        $FROM = ($page - 1) * $num_on_page;

        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product LIMIT " . $FROM . ", " . $num_on_page);
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }
}
