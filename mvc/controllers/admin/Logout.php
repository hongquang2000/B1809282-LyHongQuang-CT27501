<?php
class Logout extends controller{
    public $userModel;
    public function __construct(){
        $this->userModel = $this->model("UserModel");
    }

    public function logoutAdmin(){
        unset($_SESSION['admin']);
        $this->href("Đăng xuất thành công", "/B1809282_LyHongQuang_CT27501/admin/login");
    }
}
?>