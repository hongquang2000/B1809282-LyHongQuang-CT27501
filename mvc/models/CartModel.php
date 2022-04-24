<?php
class CartModel extends DB{
    public function getProduct($mshh){
        $qr = "SELECT * FROM hanghoa WHERE mshh = $mshh";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function insertCheckOut($mskh, $msnv, $ngayDH, $diaChiGH){
        $qr = "INSERT INTO dathang(MSKH, MSNV, NgayDH, DiaChiGH) VALUES ('$mskh', '$msnv', '$ngayDH', '$diaChiGH')";
        mysqli_query($this->con, $qr);
        $soDonDH = mysqli_insert_id($this->con);
        return json_encode($soDonDH);

    } 
    
    public function insertDetailCheckOut($soDonDH, $mshh, $soLuong, $giaDH){
        $qr = "INSERT INTO chitietdathang(SoDonDH, MSHH, SoLuong, GiaDH) VALUES ('$soDonDH', '$mshh', '$soLuong', '$giaDH');";
        mysqli_query($this->con, $qr);
        return $qr;
    }
}
?>