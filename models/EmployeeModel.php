<?php
class EmployeeModel
{
    public function __contruct()
    {
    }

    public function getEmpList()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_employee WHERE STATUS = 1");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getEmployeeByUserId($user_id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_employee WHERE user_id = '$user_id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function addEmployee($user_id, $firstname, $lastname, $birthday, $phone)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_employee (user_id, firstname, lastname, birthday, phone, status) VALUES ('$user_id','$firstname','$lastname', '$birthday', '$phone', '1')");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteEmployee($emp_id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE tbl_employee SET status = b'0' WHERE emp_id = '$emp_id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
}
