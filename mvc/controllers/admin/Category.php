<?php
class Category extends controller{
    public $categoryModel;

    public function __construct(){
        $this->categoryModel = $this->model("CategoryModel");
    }

    public function admin(){
        $this->view("admin", "master2", [
            "page"=> "category",
            "lhh" => $this->categoryModel->listAll()
        ]);
    }

    public function addCategory(){
        if(isset($_POST["btnAddCategory"])){
            $tenloaihang = $_POST["tenloaihang"];
            $this->categoryModel->addCategory($tenloaihang);
            $this->href("Thêm danh mục thành công", "/B1809282_LyHongQuang_CT27501/admin/category");
        }

        $this->view("admin", "master2", [
            "page"=> "addCategory",
            "lhh" => $this->categoryModel->listAll()
        ]);
    }

    public function updateCategory($maloaihang){
        if(isset($_POST["btnUpdateCategory"])){
            $tenloaihang = $_POST["tenloaihang"];
            $this->categoryModel->updateCategory($maloaihang, $tenloaihang);
            $this->href("Cập nhật danh mục thành công", "/B1809282_LyHongQuang_CT27501/admin/category");
        }

        $this->view("admin", "master2", [
            "page"=> "updateCategory",
            "lhh" => $this->categoryModel->getCategory($maloaihang),
        ]);
    }

    public function deleteCategory($maloaihang){
        $this->categoryModel->deleteCategory($maloaihang);
        $this->href("Xóa danh mục thành công", "/B1809282_LyHongQuang_CT27501/admin/category");
    }
}
?>