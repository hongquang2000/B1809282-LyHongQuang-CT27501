<?php
class Login extends controller{
    public $userModel;
    public $productModel;
    public function __construct(){
        $this->userModel = $this->model("UserModel");
        $this->productModel = $this->model("ProductModel");
    }

    public function admin(){
        $this->view("admin", "master1", []);
    }

    public function loginAdmin(){
        if(isset($_POST['btnAdminLogin'])){
            $email = $_POST["email"];
            $password = $_POST["password"];

            $kq = $this->userModel->accountAdminLogin($email, $password);
            $hoten = json_decode($kq,true);

            $soluongkh = $this->userModel->countCustomer();
            $soluongkh = json_decode($soluongkh,true);
            
            $soluonghh = $this->productModel->countProduct();
            $soluonghh = json_decode($soluonghh,true);

            $this->view("admin", "master2",[
                "page" => "dashboard",
                "result"=>$hoten,
                "slkh" => $soluongkh,
                "slhh" => $soluonghh
            ]);
        }
    }
}
?>