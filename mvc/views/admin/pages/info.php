<?php
$arr = json_decode($data['info'], true);
?>
<h3>Thông tin tài khoản</h3>
<form action="/B1809282_LyHongQuang_CT27501/admin/info/updateInfo" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Họ và tên</label>
        <input type="text" class="form-control" name="hotennv" value="<?php echo $arr[0]['hotennv'] ?>" readonly>
    </div>

    <div class="mb-3">
        <label class="form-label">Chức vụ</label>
        <input type="text" class="form-control" name="chucvu" value="<?php echo $arr[0]['chucvu'] ?>" readonly>
    </div>

    <div class="mb-3">
        <label class="form-label">Địa chỉ</label>
        <input type="text" class="form-control" name="diachi" value="<?php echo $arr[0]['diachi'] ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Số điện thoại</label>
        <input type="text" class="form-control" name="sodienthoai" value="<?php echo $arr[0]['sodienthoai'] ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $arr[0]['email'] ?>">
    </div>

    <button type="submit" class="btn btn-primary" name="btnUpdateInfo">Cập nhật</button>
</form>