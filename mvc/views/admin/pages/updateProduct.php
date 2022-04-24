<?php
$arr = json_decode($data['lhh'], true);

$arrProduct = json_decode($data['hh'], true);
?>
<h2>Cập nhật sản phẩm</h2>
<form action="/B1809282_LyHongQuang_CT27501/admin/product/updateProduct/<?php echo $arrProduct[0]['mshh'] ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Tên hàng hóa</label>
        <input type="text" class="form-control" name="tenhh" value="<?php echo $arrProduct[0]['tenhh'] ?>">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Hình ảnh</label>
        <input class="form-control" type="file" name="hinh">
    </div>
    <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea class="form-control" rows="5" name="mota"><?php echo $arrProduct[0]['mota'] ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Số lượng hàng</label>
        <input type="number" class="form-control" name="soluong" value="<?php echo $arrProduct[0]['soluonghang'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Đơn giá</label>
        <input type="text" class="form-control" name="dongia" value="<?php echo $arrProduct[0]['dongia'] ?>">
    </div>

    <div class="mb-3">
        <select class="form-select" name="maloaihang">
            <option selected>Chọn mã loại hàng</option>
            <?php
            for ($i = 0; $i < count($arr); $i++) {
                if ($arrProduct[0]['maloaihang'] == $arr[$i]['maloaihang']) {
            ?>
                    <option selected value="<?php echo $arr[$i]['maloaihang'] ?>">
                        <?php echo $arr[$i]['tenloaihang'] ?>
                    </option>
                <?php
                } else {
                ?>
                    <option value="<?php echo $arr[$i]['maloaihang'] ?>">
                        <?php echo $arr[$i]['tenloaihang'] ?>
                    </option>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary" name="btnUpdateProduct">Cập nhật sản phẩm</button>
</form>