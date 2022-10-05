<?php
class CustomerModel
{
    public function __contruct()
    {
        
    }

    public function getCustomerByUserId($user_id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_customer JOIN tbl_user ON tbl_customer.user_id = tbl_user.user_id WHERE tbl_customer.user_id = '$user_id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }
}
