<?php
class Order extends controller{
    public $userModel;
    public $productModel;
    public $categoryModel;
    public $orderModel;
    public function __construct(){
        $this->userModel = $this->model("UserModel");
        $this->productModel = $this->model("ProductModel");
        $this->categoryModel = $this->model("CategoryModel");
        $this->orderModel = $this->model("OrderModel");
    }

    public function admin(){
        $this->view("admin", "master2", [
            "page"=> "order",
            "dh"=> $this->orderModel->listAll()
        ]);
    }

    public function updateOrder($sodondh){
        if(isset($_POST['btnUpdateOrder'])){

            $ngaygh = $_POST['ngaygh'];
            $trangthaidh = $_POST['trangthaidh'];
            $this->orderModel->updateOrder($sodondh, $ngaygh, $trangthaidh);
            $this->href("Cập nhật đơn hàng thành công", "/B1809282_LyHongQuang_CT27501/admin/order/");
        }else{
            $this->view("admin", "master2", [
                "page" => "updateOrder",
                "dh" => $this->orderModel->getOrderBySodondh($sodondh)
            ]);
        }

    }

    public function deleteOrder($sodondh){
        $this->orderModel->deleteDetailOrder($sodondh);
        $this->orderModel->deleteOrder($sodondh);
        $this->href("Xóa đơn hàng thành công", "/B1809282_LyHongQuang_CT27501/admin/order/");

    }
}
?>