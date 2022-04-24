<?php
class Register extends controller{
    public $categoryModel;
    public $userModel;
    public function __construct(){
        $this->categoryModel = $this->model("CategoryModel");
        $this->userModel = $this->model("UserModel");
    }

    public function customer(){
        $this->view("Customer", "master1",[
            "page"=>"register",
            "lhh"=>$this->categoryModel->ListAll()
        ]);
    }

    public function registerCustomer(){
        if(isset($_POST["btnRegister"])){
            $hoten = $_POST['hoten'];
            $email = $_POST['email'];
            $sodienthoai = $_POST['sodienthoai'];
            $diachi = $_POST['diachi'];
            $password = $_POST['password'];
   
            $kq = $this->userModel->insertNewUser($hoten, $email, $sodienthoai, $diachi, $password);

            $this->view("Customer", "master1",[
                "page"=>"register",
                "lhh"=>$this->categoryModel->ListAll(),
                "result"=>$kq
            ]);
        }
    }


}
?>