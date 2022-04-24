<h2>Danh mục</h2>
<a href="/B1809282_LyHongQuang_CT27501/admin/category/addCategory" class="mt-3 btn btn-primary">Thêm danh mục</a>
<table class="mt-3 table table-striped">
  <thead>
    <tr>
      <th>Tên danh mục</th>
      <th>Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $arr = json_decode($data['lhh'], true);
    for ($i = 0; $i < count($arr); $i++) {
    ?>
      <tr>
        <td>
          <?php echo $arr[$i]['tenloaihang'] ?>
        </td>
        <td>
          <a clasS="mx-2" href="/B1809282_LyHongQuang_CT27501/admin/category/updateCategory/<?php echo $arr[$i]['maloaihang'] ?>">
            <i class="fas fa-solid fa-pen"></i>
          </a>
          <a href="/B1809282_LyHongQuang_CT27501/admin/category/deleteCategory/<?php echo $arr[$i]['maloaihang'] ?>">
            <i class="fas fa-trash-alt"></i>
          </a>
        </td>

      </tr>
    <?php
    }
    ?>
  </tbody>
</table>