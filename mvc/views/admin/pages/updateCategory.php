<?php
$arrCategory = json_decode($data['lhh'], true);
?>
<h2>Cập nhật danh mục</h2>
<form action="/B1809282_LyHongQuang_CT27501/admin/category/updateCategory/<?php echo $arrCategory[0]['maloaihang'] ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" name="tenloaihang" value="<?php echo $arrCategory[0]['tenloaihang'] ?>">
    </div>

    <button type="submit" class="btn btn-primary" name="btnUpdateCategory">Cập nhật danh mục</button>
</form>