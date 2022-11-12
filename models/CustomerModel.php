<?php
class CustomerModel
{
    var $cus_id;
    var $user_id;
    var $firstname;
    var $lastname;
    var $birthday;
    var $phone;
    var $status;

    public function getCusId()
    {
        return $this->cus_id;
    }
    public function getUserId()
    {
        return $this->user_id;
    }
    public function getFirstname()
    {
        return $this->firstname;
    }
    public function getLastname()
    {
        return $this->lastname;
    }
    public function getBirthday()
    {
        return $this->phone;
    }
    public function getStatus()
    {
        return $this->status;
    }


    public function __contruct($cus_id, $user_id, $firstname, $lastname, $birthday, $phone, $status)
    {
        $this->cus_id = $cus_id;
        $this->user_id = $user_id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->birthday = $birthday;
        $this->phone = $phone;
        $this->status = $status;
    }

    public function getCustomerList()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_customer WHERE status = 1");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getCustomerByUserId($user_id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_customer JOIN tbl_user ON tbl_customer.user_id = tbl_user.user_id WHERE tbl_customer.user_id = '$user_id' AND tbl_customer.status = 1");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function addCustomer($user_id, $firstname, $lastname, $birthday, $phone)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_customer (user_id, firstname, lastname, birthday, phone, status) VALUES ('$user_id','$firstname','$lastname', '$birthday', '$phone', '1')");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function editCustomer($user_id, $firstname, $lastname, $birthday, $phone)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE tbl_customer SET firstname = '$firstname', lastname = '$lastname', birthday = '$birthday', phone = '$phone' WHERE user_id = '$user_id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCustomer($user_id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE tbl_customer SET status = b'0' WHERE user_id = '$user_id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function searchCustomerAdmin($name)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_customer WHERE STATUS = 1 AND firstname LIKE '%$name%' or lastname like '%$name%'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }
}
