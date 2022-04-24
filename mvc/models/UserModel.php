<?php
class UserModel extends DB{
    public function insertNewUser($hoten, $email, $sodienthoai, $diachi,$password){
        $qr = "INSERT INTO khachhang(hotenkh, email, sodienthoai, diachi, password) VALUES ('$hoten', '$email', '$sodienthoai', ' $diachi','$password')";
        $result = false;
       if(mysqli_query($this->con, $qr)){
           $result  = true;
       }
       return json_encode($result);
    }

    public function accountLogin($sodienthoai, $password){
        $qr = "SELECT hotenkh FROM khachhang WHERE sodienthoai = '$sodienthoai' AND password = '$password'";
        $rows = mysqli_query($this->con, $qr);
        $row = mysqli_fetch_array($rows);
        $hoten = '';
        if(mysqli_num_rows($rows) > 0){
            $hoten = $row['hotenkh'];
        }
        return json_encode($hoten);
    }

    public function accountAdminLogin($email, $password){
        $qr = "SELECT hotennv FROM nhanvien WHERE email = '$email' AND password = '$password'";
        $rows = mysqli_query($this->con, $qr);
        $row = mysqli_fetch_array($rows);
        $hoten = '';
        if(mysqli_num_rows($rows) > 0){
            $hoten = $row['hotennv'];
        }
        return json_encode($hoten);
    }

    public function countCustomer(){
        $qr = "SELECT COUNT(mskh) AS soluongkh FROM khachhang";
        $rows = mysqli_query($this->con, $qr);
        $row = mysqli_fetch_array($rows);
        $soluongkh = $row['soluongkh'];
        return json_encode($soluongkh);
    }

    public function getAddress($mskh){
        $qr = "SELECT diachi FROM khachhang WHERE mskh = $mskh";
        $rows = mysqli_query($this->con, $qr);
        $row = mysqli_fetch_array($rows);
        $diachi = $row['diachi'];
        return  json_encode($diachi);
    }

    public function getMSKH($hotenkh){
        $qr = "SELECT mskh FROM khachhang WHERE hotenkh = '$hotenkh'";
        $rows = mysqli_query($this->con, $qr);
        $row = mysqli_fetch_array($rows);
        $mskh = $row['mskh'];
        return  json_encode($mskh);

    }

    public function infoCustomer($hotenkh){
        $qr = "SELECT * FROM khachhang WHERE hotenkh = '$hotenkh'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function infoAdmin($hotennv){
        $qr = "SELECT * FROM nhanvien WHERE hotennv = '$hotennv'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)){
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function updateInfoCustomer($hotenkh, $email, $sodienthoai, $diachi){
        $qr = "UPDATE khachhang SET email= '$email', sodienthoai= '$sodienthoai', diachi= '$diachi' WHERE hotenkh = '$hotenkh'";
        mysqli_query($this->con, $qr);
    }

    public function updateInfoAdmin($hotennv, $diachi, $sodienthoai, $email){
        $qr = "UPDATE nhanvien SET diachi = '$diachi', sodienthoai= '$sodienthoai', email= '$email' WHERE hotennv = '$hotennv'";
        mysqli_query($this->con, $qr);
    }




    //Ajax
    public function checkEmailCustomer($email){
        $qr = "SELECT mskh FROM khachhang WHERE email = '$email'";
        $rows = mysqli_query($this->con, $qr);
        $kq = false;
        if(mysqli_num_rows($rows) > 0){
            $kq = true;
        }
        return json_encode($kq);
    }

    public function checkPhoneCustomer($sodienthoai){
        $qr = "SELECT mskh FROM khachhang WHERE sodienthoai = '$sodienthoai'";
        $rows = mysqli_query($this->con, $qr);
        $kq = false;
        while(mysqli_num_rows($rows) > 0){
            $kq = true;
        }
        return json_encode($kq);
    }

}
