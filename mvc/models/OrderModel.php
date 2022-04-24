<?php
class OrderModel extends DB{
    public function listAll(){
        $qr = "SELECT DH.sodondh, GROUP_CONCAT(HH.TENHH ORDER BY TENHH ASC SEPARATOR '<br/>')AS tenhh, GROUP_CONCAT(CT.giadh ORDER BY GIADH ASC SEPARATOR ',')AS giadh, GROUP_CONCAT(CT.soluong ORDER BY soluong ASC SEPARATOR '<br/>')AS soluong, ngaydh, ngaygh, diachigh, trangthaidh, mskh FROM DATHANG AS DH JOIN CHITIETDATHANG AS CT ON DH.SODONDH = CT.SODONDH JOIN HANGHOA AS HH ON CT.MSHH=HH.MSHH GROUP BY DH.SoDonDH";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getOrderByMSKH($mskh){
        $qr = "SELECT DH.sodondh, GROUP_CONCAT(HH.TENHH ORDER BY TENHH ASC SEPARATOR '<br/>')AS tenhh, GROUP_CONCAT(CT.giadh ORDER BY GIADH ASC SEPARATOR ',')AS giadh, GROUP_CONCAT(CT.soluong ORDER BY soluong ASC SEPARATOR '<br/>')AS soluong, ngaydh, ngaygh, trangthaidh, mskh FROM DATHANG AS DH JOIN CHITIETDATHANG AS CT ON DH.SODONDH = CT.SODONDH JOIN HANGHOA AS HH ON CT.MSHH=HH.MSHH GROUP BY DH.SoDonDH HAVING MSKH = $mskh";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getOrderBySodondh($sodondh){
        $qr = "SELECT * FROM dathang WHERE sodondh = $sodondh";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function updateOrder($sodondh, $ngaygh, $trangthaidh){
        $qr= "UPDATE dathang SET ngaygh= '$ngaygh', trangthaidh='$trangthaidh' WHERE sodondh = $sodondh";

        mysqli_query($this->con, $qr);
    }

    public function deleteDetailOrder($sodondh){
        $qr = "DELETE FROM chitietdathang WHERE sodondh = $sodondh ";
        mysqli_query($this->con, $qr);
    }

    public function deleteOrder($sodondh){
        $qr = "DELETE FROM dathang WHERE sodondh = $sodondh";
        mysqli_query($this->con, $qr);
    }
}
?>