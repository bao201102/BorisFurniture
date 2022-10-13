<?php
class ImageModel
{
    var $img_id;
    var $prod_image_id;
    var $img_link;

    public function getImgId()
    {
        return $this->img_id;
    }
    public function getProdImgId()
    {
        return $this->prod_image_id;
    }

    public function getImgLink()
    {
        return $this->img_link;
    }

    public function __contruct($img_id, $prod_image_id, $img_link)
    {
        $this->img_id = $img_id;
        $this->prod_image_id = $prod_image_id;
        $this->img_link = $img_link;
    }

    public function getImage($id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "select img_link from tbl_image where prod_image_id = '$id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function addImage($id, $link)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_image (prod_image_id, img_link) VALUES ($id, $link)");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }
}
