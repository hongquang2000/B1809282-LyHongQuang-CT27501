<?php
if (isset($data['result']) && $data['result'] != '') {
    $_SESSION['admin'] = $data['result'];
}
?>
<div class="mt-3 d-flex justify-content-end">
    <div class="dropdown">
        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <?php
            if (isset($_SESSION['admin'])) {
                echo $_SESSION['admin'];
            } else {
                header('Location: /B1809282_LyHongQuang_CT27501/admin/login');
            } ?>
        </a>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="/B1809282_LyHongQuang_CT27501/admin/info">Tài khoản</a></li>
            <li><a class="dropdown-item" href="/B1809282_LyHongQuang_CT27501/admin/logout/logoutAdmin">Đăng xuất</a></li>          
        </ul>
    </div>

</div>