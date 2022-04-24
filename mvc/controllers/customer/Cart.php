<?php
class Cart extends controller
{
    public $userModel;
    public $cartModel;
    public function __construct()
    {
        $this->userModel = $this->model("UserModel");
        $this->cartModel = $this->model("CartModel");
    }

    public function customer()
    {
        $this->view("customer", "master2", [
            "page" => "cart"
        ]);
    }

    public function addCart($mshh)
    {
        $arr = json_decode($this->cartModel->getProduct($mshh), true);

        $mshh = $arr[0]['mshh'];
        $tenhh = $arr[0]['tenhh'];
        $mota = $arr[0]['mota'];
        $soluonghang = $arr[0]['soluonghang'];
        $dongia = $arr[0]['dongia'];
        $hinh = $arr[0]['hinh'];

        if (!empty($_SESSION["cart"])) {
            $cart = $_SESSION['cart'];
            if (array_key_exists($mshh, $cart)) {
                $cart[$mshh] = array(
                    'mshh' => $mshh,
                    'tenhinh' => $hinh,
                    'tenhh' => $tenhh,
                    'soluong' => (int)$cart[$mshh]['soluong'] + 1,
                    'gia' => $dongia
                );
            } else {
                $cart[$mshh] = array(
                    'mshh' => $mshh,
                    'tenhinh' => $hinh,
                    'tenhh' => $tenhh,
                    'soluong' => 1,
                    'gia' => $dongia
                );
            }
        } else {
            $cart[$mshh] = array(
                'mshh' => $mshh,
                'tenhinh' => $hinh,
                'tenhh' => $tenhh,
                'soluong' => 1,
                'gia' => $dongia
            );
        }
        $_SESSION['cart'] = $cart;

        $this->href('','/B1809282_LyHongQuang_CT27501/customer/cart');
    }

    public function deleteItemCart($mshh)
    {
        unset($_SESSION['cart'][$mshh]);
        $this->href('','/B1809282_LyHongQuang_CT27501/customer/cart');
    }


    public function updateItemCart()
    {
        foreach ($_SESSION['cart'] as $key => $value) {
            $quantityNew = $_POST['quantity' . $_SESSION['cart'][$key]['mshh']];

            $arr = json_decode($this->cartModel->getProduct($_SESSION['cart'][$key]['mshh']), true);
            $tenhh = $arr[0]['tenhh'];
            $soluonghang = $arr[0]['soluonghang'];


            if ($quantityNew <= $soluonghang) {
                $cart[$_SESSION['cart'][$key]['mshh']] = array(
                    'mshh' => $_SESSION['cart'][$key]['mshh'],
                    'tenhinh' => $_SESSION['cart'][$key]['tenhinh'],
                    'tenhh' => $_SESSION['cart'][$key]['tenhh'],
                    'soluong' => $quantityNew,
                    'gia' => $_SESSION['cart'][$key]['gia']
                );
            } else {
                $cart[$_SESSION['cart'][$key]['mshh']] = array(
                    'mshh' => $_SESSION['cart'][$key]['mshh'],
                    'tenhinh' => $_SESSION['cart'][$key]['tenhinh'],
                    'tenhh' => $_SESSION['cart'][$key]['tenhh'],
                    'soluong' => $_SESSION['cart'][$key]['soluong'],
                    'gia' => $_SESSION['cart'][$key]['gia']
                );
                echo "<script>alert('Sản phẩm " . $tenhh . " không vượt quá " . $soluonghang . "');</script>";
                break;
            }
        }
        $_SESSION['cart'] = $cart;

        $this->href('','/B1809282_LyHongQuang_CT27501/customer/cart');
    }

    public function checkOut()
    {
        if (isset($_SESSION['hoten'])) {
            $hotenkh = $_SESSION['hoten'];
            $mskh = json_decode($this->userModel->getMSKH($hotenkh), true);
            $msnv = 1;
            $ngayDH = date("Y-m-d");           
            $diaChiGH = json_decode($this->userModel->getAddress($mskh), true);

            if (isset($_SESSION['cart']) || $_SESSION['cart'] != null) {
                $soDonDH = json_decode($this->cartModel->insertCheckOut($mskh, $msnv, $ngayDH, $diaChiGH), true);

                foreach ($_SESSION['cart'] as $key => $value) {
                    $mshh = $_SESSION['cart'][$key]['mshh'];
                    $soLuong = $_SESSION['cart'][$key]['soluong'];
                    $giaDH = $_SESSION['cart'][$key]['soluong'] * $_SESSION['cart'][$key]['gia'];

                    $this->cartModel->insertDetailCheckOut($soDonDH, $mshh, $soLuong, $giaDH);
                }
                unset($_SESSION['cart']);
                $this->href('Đặt hàng thành công', '/B1809282_LyHongQuang_CT27501/customer/cart');
            }
        } else {
            $this->href('Vui lòng đăng nhập!', '/B1809282_LyHongQuang_CT27501/customer/login');
        }
    }

    public function action()
    {
        if (isset($_POST['btnUpdateCart'])) {
            $this->updateItemCart();
        } else if (isset($_POST['btnCheckOut'])) {
            $this->checkOut();
        }
    }
}
