<?php
$arr = json_decode($data['lhh'], true);
?>
<h3>Thêm sản phẩm</h3>
<form action="/B1809282_LyHongQuang_CT27501/admin/product/addProduct" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Tên hàng hóa</label>
        <input type="text" class="form-control" name="tenhh" required>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Hình ảnh</label>
        <input class="form-control" type="file" name="hinh" id="hinh" >
    </div>
    <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea class="form-control" rows="5" name="mota" required></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Số lượng hàng</label>
        <input type="number" class="form-control" name="soluong" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Đơn giá</label>
        <input type="text" class="form-control" name="dongia" required>
    </div>

    <div class="mb-3">
        <select class="form-select" name="maloaihang" required>
            <option selected value="">Chọn mã loại hàng</option>
            <?php
            for ($i = 0; $i < count($arr); $i++) {
            ?>
                <option value="<?php echo $arr[$i]['maloaihang'] ?>">
                    <?php echo $arr[$i]['tenloaihang'] ?>
                </option>
            <?php
            }           
            ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary" name="btnAddProduct">Thêm sản phẩm</button>
</form>