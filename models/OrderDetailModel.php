<?php
class OrderDetailModel
{
    var $order_detail_id;
    var $order_id;
    var $prod_id;
    var $quantity;
    var $prod_price;
    var $status;

    public function getOderDetailId()
    {
        return $this->order_detail_id;
    }
    public function getOderId()
    {
        return $this->order_id;
    }
    public function getProdId()
    {
        return $this->prod_id;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public function getProdPrice()
    {
        return $this->prod_price;
    }
    public function getStatus()
    {
        return $this->status;
    }


    function OrderDetailModel($_order_detail_id, $_order_id, $_prod_id, $_quantity, $_prod_price, $_status)
    {
        $this->order_detail_id = $_order_detail_id;
        $this->order_id = $_order_id;
        $this->prod_id = $_prod_id;
        $this->quantity = $_quantity;
        $this->prod_price = $_prod_price;
        $this->status = $_status;
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
