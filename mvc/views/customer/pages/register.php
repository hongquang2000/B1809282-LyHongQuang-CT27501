<div class="form">
    <h2 class="header-form">Đăng ký</h2>
    <form action="/B1809282_LyHongQuang_CT27501/customer/Register/registerCustomer" method="POST">
        <div class="mb-3 form-group">
            <label class="form-label">Họ tên</label>
            <input type="text" id="hoten"  name="hoten" class="form-control" placeholder="Nhập họ tên" required>
        </div>
        <div class="mb-3 form-group">
            <label class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Nhập email" required>
            <div id="messageEmail"></div>
        </div>
        <div class="mb-3 form-group">
            <label class="form-label">Số điện thoại</label>
            <input type="text" id="sodienthoai" name="sodienthoai" class="form-control" placeholder="Nhập số điện thoại" required>
            <div id="messagePhone"></div>
        </div>
        <div class="mb-3 form-group">
            <label class="form-label">Địa chỉ</label>
            <input type="text" name="diachi" class="form-control" placeholder="Nhập Địa chỉ" required>
        </div>
        <div class="mb-3 form-group">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Nhập password" required>
        </div>
        <button type="submit" name="btnRegister" class="btn btn-primary">Đăng ký</button>
    </form>
</div>
<?php
if (isset($data['result'])) {
?>
    <h3>
        <?php
        if ($data['result']) {
            echo "Đăng ký thành công";
        } else {
            echo "Đăng ký thất bại";
        }
        ?>
    </h3>
<?php } ?>