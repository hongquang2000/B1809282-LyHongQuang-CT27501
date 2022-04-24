<h2>Danh mục</h2>
<ul class="list-group">
  <li class="list-group-item" aria-current="true" style="background-color: #0d6efd94;">
    <a href="/B1809282_LyHongQuang_CT27501/">Tất cả</a>
  </li>
  <?php 
  for ($i = 0; $i < count($arr); $i++) {
  ?>
    <li class="list-group-item">
      <a href="/B1809282_LyHongQuang_CT27501/customer/home/category/<?php echo $arr[$i]['maloaihang']?>"><?php echo $arr[$i]['tenloaihang']; ?></a>
    </li>
  <?php
  }
  ?>
</ul>