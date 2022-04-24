<?php
class Info extends controller{
    public $userModel;

    public function __construct(){
        $this->userModel = $this->model('UserModel');
    }

    public function customer(){
        $hotenkh = $_SESSION['hoten'];
        $this->view('customer', "master2", [
            "page"=>"info",
            "info"=> $this->userModel->infoCustomer($hotenkh)
        ]);
    }

    public function updateInfo(){
        if(isset($_POST['update'])){
            $hotenkh = $_SESSION['hoten'];
            $email = $_POST['email'];
            $sodienthoai = $_POST['sodienthoai'];
            $diachi = $_POST['diachi'];

            $this->userModel-> updateInfoCustomer($hotenkh, $email, $sodienthoai, $diachi); 
        }

        $this->view('customer', "master2", [
            "page"=>"info",
            "info"=> $this->userModel->infoCustomer($hotenkh)
        ]);
    }
}
