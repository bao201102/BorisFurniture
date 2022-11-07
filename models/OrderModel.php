<?php
class OrderModel
{
    function __construct()
    {
    }

    public function addOrderHaveCus($cus_id, $firstname, $lastname, $address, $city, $phone, $email, $notes)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_order (cus_id, firstname, lastname, address, city, phone, email, notes, status) 
                                                    VALUES ('$cus_id', '$firstname', '$lastname', '$address', '$city', '$phone', '$email', '$notes', b'0')");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function addOrderNoCus($firstname, $lastname, $address, $city, $phone, $email, $notes)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_order (firstname, lastname, address, city, phone, email, notes, status) 
                                                    VALUES ('$firstname', '$lastname', '$address', '$city', '$phone', '$email', '$notes', b'0')");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function getOrderId()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT order_id FROM tbl_order WHERE order_id = ( SELECT COUNT(order_id) FROM tbl_order )");
        $data = $result;
        return $data;
    }
}
