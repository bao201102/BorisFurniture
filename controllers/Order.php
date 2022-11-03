<?php
class Order extends Controller
{
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
        $this->UserModel = $this->model('UserModel');
        $this->CustomerModel = $this->model('CustomerModel');
        $this->OrderModel = $this->model('OrderModel');
        $this->OrderDetailModel = $this->model('OrderDetailModel');
    }

    public function addOrder()
    {
        if (isset($_POST['order'])) {
            $cus_id = $_POST['cus_id'];
            $firstname = $_POST['firstNameInput'];
            $lastname = $_POST['lastNameInput'];
            $street = $_POST['streetInput'];
            $town = $_POST['townInput'];
            $phone = $_POST['phoneInput'];
            $email = $_POST['emailInput'];
            $notes = $_POST['notesInput'];

            // echo $cus_id;
            $order_result = $this->OrderModel->addOrder($cus_id, $firstname, $lastname, $street, $town, $phone, $email, $notes);
            if ($order_result) {
                echo "ss";
            } else {
                echo "f";
            }
        }
    }
}
