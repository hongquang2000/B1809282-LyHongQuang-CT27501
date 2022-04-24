<?php
$arr = json_decode($data['dh'], true);
$trangthai = array("Chờ duyệt", "Đã duyệt", "Đã giao");
?>

<h3>Cập nhật đơn hàng</h3>
<form action="/B1809282_LyHongQuang_CT27501/admin/order/updateOrder/<?php echo $arr[0]['sodondh'] ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Ngày giao hàng</label>
        <input type="date" class="form-control" name="ngaygh" min="<?php echo date("Y-m-d") ?>" value="<?php echo $arr[0]['ngaygh'] ?>">
    </div>

    <div class="mb-3">
        <select class="form-select" name="trangthaidh">
            <option selected>Chọn trạng thái</option>
            <?php
            for ($i = 0; $i < count($trangthai); $i++) {
                if (
                    $trangthai[$i] ==
                    $arr[0]['trangthaidh']
                ) {
            ?>
                    <option selected value="<?php echo $trangthai[$i] ?>">
                        <?php echo $trangthai[$i] ?>
                    </option>
                <?php
                } else {
                ?>
                    <option value="<?php echo  $trangthai[$i] ?>">
                        <?php echo $trangthai[$i] ?>
                    </option>
            <?php
                }
            }
            ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary" name="btnUpdateOrder">Cập nhật</button>
</form>

<script>
    const arrOptions = document.getElementsByTagName('option');
    for (let i = 0; i < arrOptions.length; i++) {
        arrOptions[i].style.display = 'none';
        if(arrOptions[i].selected == true){
            break;
        }
    }
</script>