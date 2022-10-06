<?php
class UserModel
{
    var $user_id;
    var $email;
    var $user_password;
    var $created_date;
    var $user_type;
    var $status;


    public function getId()
    {
        return $this->user_id;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->user_password;
    }
    public function getCreateDate()
    {
        return $this->created_date;
    }
    public function getUserType()
    {
        return $this->user_type;
    }
    public function getStatus()
    {
        return $this->status;
    }

    public function __contruct($user_id, $email, $user_password, $created_date, $user_type, $status)
    {
        $this->user_id = $user_id;
        $this->email = $email;
        $this->user_password = $user_password;
        $this->created_date = $created_date;
        $this->user_type = $user_type;
        $this->status = $status;
    }

    public function getUserList()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "select * from tbl_user");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getUserId($email)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "select user_id from tbl_user where email = '$email' and status = '1'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getUser($email, $password)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "select * from tbl_user where email = '$email' and user_password = '$password' and status = '1'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function addUser($email, $password)
    {
        $link = null;
        taoKetNoi($link);
        $date = date('Y-m-d');
        $result = chayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_user (email, user_password, created_date, user_type, status) VALUES ('$email','$password','$date', '1', '1')");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
}
