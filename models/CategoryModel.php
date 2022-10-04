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
        $result = chayTruyVanTraVeDL($link, "select * from tbl_category");
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
}
