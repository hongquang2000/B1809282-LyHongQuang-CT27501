<?php
class Detail extends controller{
    public $productModel;
    
    public function __construct(){
        $this->productModel = $this->model("ProductModel");
    }

    public function detailProduct($mshh){
        $arr = json_decode($this->productModel->getProduct($mshh), true);

        $maloaihang =  $arr[0]['maloaihang'];

        $this->view("Customer","master2",[
            "page"=>"detail",
            "product"=> $this->productModel->getProduct($mshh),
            "related"=> $this->productModel->relatedProducts($mshh, $maloaihang)
        ]);
    }

}
?>