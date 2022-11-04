<?php
class OrderModel
{
    var $order_id;
    var $cus_id;
    var $firstname;
    var $lastname;
    var $address;
    var $city;
    var $phone;
    var $email;
    var $notes;
    var $status;

    public function getOderId()
    {
        return $this->order_id;
    }
    public function getCustomerId()
    {
        return $this->cus_id;
    }
    public function getFirstname()
    {
        return $this->firstname;
    }
    public function getLastname()
    {
        return $this->lastname;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function getCity()
    {
        return $this->city;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getNotes()
    {
        return $this->notes;
    }
    public function getStatus()
    {
        return $this->status;
    }


    function OrderModel($_order_id, $_cus_id, $_firstname, $_lastname, $_address, $_city, $_phone, $_email, $_notes, $_status)
    {
        $this->order_id = $_order_id;
        $this->cus_id = $_cus_id;
        $this->firstname = $_firstname;
        $this->lastname = $_lastname;
        $this->address = $_address;
        $this->city = $_city;
        $this->phone = $_phone;
        $this->email = $_email;
        $this->notes = $_notes;
        $this->status = $_status;
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
