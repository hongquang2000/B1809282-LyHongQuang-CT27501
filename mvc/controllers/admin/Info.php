<?php
class Info extends controller{
    public $userModel;

    public function __construct(){
        $this->userModel = $this->model("UserModel");
    }

    public function admin(){
        $hotennv = $_SESSION['admin'];
        $this->view("admin", "master2", [
            "page" => "info",
            "info" => $this->userModel->infoAdmin($hotennv)
        ]);
    }

    public function updateInfo(){
        if(isset($_POST['btnUpdateInfo'])){
            $hotennv = $_POST['hotennv'];
            $diachi  = $_POST['diachi'];
            $sodienthoai = $_POST['sodienthoai'];
            $email = $_POST['email'];

            $this->userModel->updateInfoAdmin($hotennv, $diachi, $sodienthoai, $email);
            $this->href("Cập nhật thông tin thành công", "B1809282_LyHongQuang_CT27501/admin/info");
        }

        $this->view('admin', "master2", [
            "page"=>"info",
            "info"=> $this->userModel->infoAdmin( $_SESSION['admin'])
        ]);
    }
}
?>