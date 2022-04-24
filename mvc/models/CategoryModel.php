<?php
class CategoryModel extends DB{
    public function ListAll(){
        $qr = "SELECT * FROM loaihanghoa";
        $rows =  mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getCategory($maloaihang){
        $qr = "SELECT * FROM loaihanghoa WHERE maloaihang = $maloaihang";
        $rows =  mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }


    public function addCategory($tenloaihang){
        $qr = "INSERT INTO loaihanghoa (tenloaihang) VALUES ('$tenloaihang')";
        mysqli_query($this->con, $qr);
    } 

    public function updateCategory($maloaihang, $tenloaihang){
        $qr = "UPDATE loaihanghoa SET tenloaihang= '$tenloaihang' WHERE maloaihang  = $maloaihang";
        mysqli_query($this->con, $qr);
    } 

    public function deleteCategory($maloaihang){
        $qr = "DELETE FROM loaihanghoa WHERE maloaihang = $maloaihang";
        mysqli_query($this->con, $qr);
    } 

    public function countCategory()
    {
        $qr = "SELECT COUNT(maloaihang) AS soluonglhh FROM loaihanghoa";
        $rows = mysqli_query($this->con, $qr);
        $row = mysqli_fetch_array($rows);
        $soluonglhh = $row['soluonglhh'];
        return json_encode($soluonglhh);
    }

}
?>