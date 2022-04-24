<?php
class Product extends controller{
    public $userModel;
    public $productModel;
    public $categoryModel;

    public function __construct(){
        $this->userModel = $this->model("UserModel");
        $this->productModel = $this->model("ProductModel");
        $this->categoryModel = $this->model("CategoryModel");
    }

    public function admin(){
        $this->view("admin", "master2", [
            "page"=> "product",
            "hh"=> $this->productModel->listAll()
        ]);
    }
    
    public function addProduct(){
        if(isset($_POST['btnAddProduct'])){
            $tenhh = $_POST['tenhh'];
            $hinh = $_FILES['hinh']['name'];
            $hinh_tmp = $_FILES['hinh']['tmp_name'];
            $mota = $_POST['mota'];
            $soluonghang = $_POST['soluong'];
            $dongia = $_POST['dongia'];
            $maloaihang = $_POST['maloaihang'];

            $this->productModel->addProduct($tenhh, $mota, $soluonghang, $dongia, $hinh, $maloaihang);

            move_uploaded_file($hinh_tmp,  $_SERVER['DOCUMENT_ROOT'] .'/B1809282_LyHongQuang_CT27501/public/img/product/'.$hinh);

            $this->href("Thêm sản phẩm thành công", "/B1809282_LyHongQuang_CT27501/admin/product");
        }else{
            $this->view("admin", "master2", [
                "page"=> "addProduct",
                "lhh" => $this->categoryModel->listAll()
            ]);
        }
        
    }

    public function updateProduct($mshh){
        if(isset($_POST['btnUpdateProduct'])){
            $tenhh = $_POST['tenhh'];
            $hinh = $_FILES['hinh']['name'];
            $hinh_tmp = $_FILES['hinh']['tmp_name'];
            $mota = $_POST['mota'];
            $soluonghang = $_POST['soluong'];
            $dongia = $_POST['dongia'];
            $maloaihang = $_POST['maloaihang'];
           
            if($hinh != ''){
                $arr = json_decode($this->productModel->getProduct($mshh), true);

                move_uploaded_file($hinh_tmp, $_SERVER['DOCUMENT_ROOT'] .'/B1809282_LyHongQuang_CT27501/public/img/product/'.$hinh);
                $this->productModel->updateProduct($mshh, $tenhh, $mota, $soluonghang, $dongia, $hinh, $maloaihang);

                unlink($_SERVER['DOCUMENT_ROOT'] .'/B1809282_LyHongQuang_CT27501/public/img/product/'.$arr[0]['hinh']);

                $this->href("Cập nhật thành công", "/B1809282_LyHongQuang_CT27501/admin/product/");
            }else{
                $this->productModel->updateProductNoImg($mshh, $tenhh, $mota, $soluonghang, $dongia, $maloaihang);
                $this->href("Cập nhật thành công", "/B1809282_LyHongQuang_CT27501/admin/product/");
            }
        }else{
            $this->view("admin", "master2", [
                "page"=> "updateProduct",
                "hh"=> $this->productModel->getProduct($mshh),
                "lhh" => $this->categoryModel->listAll()
            ]);
        }
    }

    public function deleteProduct($mshh){
        $arr = json_decode($this->productModel->getProduct($mshh), true);
        $hinh = $arr[0]['hinh'];
        unlink($_SERVER['DOCUMENT_ROOT'] .'/B1809282_LyHongQuang_CT27501/public/img/product/'. $hinh);
        $this->productModel->deleteProduct($mshh);
        $this->href("Xóa sản phẩm thành công", "/B1809282_LyHongQuang_CT27501/admin/product");
    }

}
