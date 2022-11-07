<?php
class OrderDetailModel
{
    function __construct()
    {
    }

    public function addOrderDetail($order_id, $prod_id, $quantity, $prod_price)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_order_detail (order_id, prod_id, quantity, prod_price, status) 
                                                    VALUES ('$order_id', '$prod_id', '$quantity', '$prod_price', b'0')");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
}
