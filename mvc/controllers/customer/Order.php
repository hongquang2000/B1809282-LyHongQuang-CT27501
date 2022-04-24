<?php
class Order extends controller{
    public $userModel;
    public $orderModel;

    public function __construct(){
        $this->userModel = $this->model("UserModel");
        $this->orderModel = $this->model("OrderModel");
    }

    public function customer(){
        $hotenkh = $_SESSION['hoten'];
        $mskh = json_decode($this->userModel->getMSKH($hotenkh), true);
        
        $this->view("Customer","master2",[
            "page"=>"order",
            "order"=> $this->orderModel->getOrderByMSKH($mskh)      
        ]);
    }

    public function deleteOrder($sodondh){
        $this->orderModel->deleteDetailOrder($sodondh);
        $this->orderModel->deleteOrder($sodondh);
        $this->href('Xóa đơn hàng thành công', '/B1809282_LyHongQuang_CT27501/customer/order');
    }
}
