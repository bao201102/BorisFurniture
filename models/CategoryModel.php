<?php
class CategoryModel
{
    var $category_id;
    var $category_name;
    var $status;

    public function getId()
    {
        return $this->category_id;
    }
    public function getName()
    {
        return $this->category_name;
    }

    public function getStatus()
    {
        return $this->status;
    }


    public function __contruct($category_id, $category_name, $status)
    {
        $this->category_id = $category_id;
        $this->category_name = $category_name;
        $this->status = $status;
    }

    public function getCategoryList()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_category WHERE status = '1'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getCategory($id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT category_name FROM tbl_category WHERE category_id = '$id' AND status = '1'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function addCategory($name)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_category (category_name, status) VALUES ('$name','1')");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCategory($category_id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE tbl_category SET status = b'0' WHERE category_id = '$category_id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    // public function getCategoryId()
    // {
    //     $link = null;
    //     taoKetNoi($link);
    //     $result = chayTruyVanTraVeDL($link, "select category_id from tbl_category where ");
    //     $data = $result[0]['prod_id'];
    //     giaiPhongBoNho($link, $result);
    //     return $data;
    // }

    public function countProdPerCate($category_id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT COUNT(category_id) AS 'count' FROM tbl_product WHERE category_id = '$category_id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }
}
