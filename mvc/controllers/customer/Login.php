<?php
class Login extends controller{
    public $categoryModel;
    public $productModel;
    public $userModel;
    public function __construct(){
        $this->categoryModel = $this->model("CategoryModel");
        $this->productModel = $this->model("ProductModel");
        $this->userModel = $this->model("UserModel");
    }

    public function customer(){
        $this->view("Customer", "master1",[
            "page"=>"login",
            "lhh"=>$this->categoryModel->ListAll()
        ]);
    }

    public function loginCustomer(){
        if(isset($_POST["btnLogin"])){
            $sodienthoai = $_POST["sodienthoai"];
            $password = $_POST["password"];

            $kq = $this->userModel->accountLogin($sodienthoai, $password);
            
            $hoten = json_decode($kq,true);

            if($hoten == ''){
                $this->view("Customer", "master1",[
                    "page"=>"login",
                    "lhh"=>$this->categoryModel->ListAll(),
                    "result"=>$hoten
                ]);
            }else{
                $this->view("Customer", "master1",[
                    "page"=>"product",
                    "lhh"=>$this->categoryModel->ListAll(),
                    "hh"=> $this->productModel->ListAll(),
                    "result"=>$hoten
                ]);
            }
        }       
    }
}
?>