<h2>Sản phẩm</h2>
<a href="/B1809282_LyHongQuang_CT27501/admin/product/addProduct" class="mt-3 btn btn-primary">Thêm sản phẩm</a>
<table class="mt-3 table table-striped">
  <thead>
    <tr>
      <th>Tên sản phẩm</th>
      <th>Hình ảnh</th>
      <th>Mô tả</th>
      <th>Số lượng</th>
      <th>Đơn giá</th>
      <th>thao tác</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $arr = json_decode($data['hh'], true);
    for ($i = 0; $i < count($arr); $i++) {
    ?>
      <tr>
        <td>
          <?php echo $arr[$i]['tenhh'] ?>
        </td>
        <td>
          <img src="/B1809282_LyHongQuang_CT27501/public/img/product/<?php echo $arr[$i]['hinh'] ?>" alt="" width="70px">
        </td>
        <td style="width: 300px">
          <?php echo $arr[$i]['mota'] ?>
        </td>
        <td>
          <?php echo $arr[$i]['soluonghang'] ?>
        </td>
        <td>
          <?php echo number_format($arr[$i]['dongia'], 0, ',', '.') ?> VND
        </td>
        <td>
          <a clasS="mx-2" href="/B1809282_LyHongQuang_CT27501/admin/product/updateProduct/<?php echo $arr[$i]['mshh'] ?>">
            <i class="fas fa-solid fa-pen"></i>
          </a>
          <a href="/B1809282_LyHongQuang_CT27501/admin/product/deleteProduct/<?php echo $arr[$i]['mshh'] ?>">
            <i class="fas fa-trash-alt"></i>
          </a>
        </td>

      </tr>
    <?php
    }
    ?>
  </tbody>
</table>