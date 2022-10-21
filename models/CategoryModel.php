<?php
class CategoryModel
{
    var $category_id;
    var $category_name;

    public function getId()
    {
        return $this->category_id;
    }
    public function getName()
    {
        return $this->category_name;
    }

    public function __contruct($category_id, $category_name)
    {
        $this->category_id = $category_id;
        $this->category_name = $category_name;
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
        $result = chayTruyVanTraVeDL($link, "select category_name from tbl_category where category_id = '$id'");
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
        $result = chayTruyVanTraVeDL($link, "SELECT COUNT(category_id) AS 'count' FROM tbl_product where category_id = '$category_id' GROUP BY category_id");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }
}
