<?php
class ProductModel extends DB
{
    public function listAll()
    {
        $qr = "SELECT * FROM hanghoa";
        $rows =  mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function countProduct()
    {
        $qr = "SELECT COUNT(mshh) AS soluonghh FROM hanghoa";
        $rows = mysqli_query($this->con, $qr);
        $row = mysqli_fetch_array($rows);
        $soluonghh = $row['soluonghh'];
        return json_encode($soluonghh);
    }

    public function getProduct($mshh)
    {
        $qr = "SELECT * FROM hanghoa WHERE mshh = $mshh";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function relatedProducts($mshh, $maloaihang)
    {
        $qr = "SELECT * FROM hanghoa WHERE maloaihang = $maloaihang AND NOT mshh = $mshh LIMIT 4";

        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }


    public function addProduct($tenhh, $mota, $soluonghang, $dongia, $hinh, $maloaihang)
    {
        $qr = "INSERT INTO hanghoa(tenhh, mota, soluonghang, dongia, hinh, maloaihang) VALUES ('$tenhh', '$mota', '$soluonghang', '$dongia', '$hinh', $maloaihang)";
        mysqli_query($this->con, $qr);
    }

    public function updateProduct($mshh, $tenhh, $mota, $soluonghang, $dongia, $hinh, $maloaihang)
    {
        $qr = "UPDATE hanghoa SET tenhh= '$tenhh',mota='$mota',soluonghang='$soluonghang',dongia='$dongia',hinh='$hinh',maloaihang=$maloaihang WHERE mshh = $mshh";
        mysqli_query($this->con, $qr);
    }

    public function updateProductNoImg($mshh, $tenhh, $mota, $soluonghang, $dongia, $maloaihang){
        $qr = "UPDATE hanghoa SET tenhh= '$tenhh',mota='$mota',soluonghang='$soluonghang',dongia='$dongia',maloaihang=$maloaihang WHERE mshh = $mshh";
        mysqli_query($this->con, $qr);
    }

    public function deleteProduct($mshh){
        $qr="DELETE FROM hanghoa WHERE mshh = $mshh";
        mysqli_query($this->con, $qr);
    }

    public function getProductByCategory($maloaihang){
        $qr = "SELECT * FROM hanghoa WHERE maloaihang = $maloaihang";
        $rows =  mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getProductBySearch($searchName){
        $qr = "SELECT * FROM hanghoa WHERE tenhh LIKE '%$searchName%'";
        $rows =  mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }
}
