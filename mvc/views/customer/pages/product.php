<h3>Sản phẩm mới nhất</h3>
<div class="row">
        <?php
        $arr = json_decode($data['hh'], true);
        for ($i = 0; $i < count($arr); $i++) {
        ?>
                <div class="col-6 col-sm-3 product-item">
                        <a href="/B1809282_LyHongQuang_CT27501/customer/detail/detailProduct/<?php echo $arr[$i]['mshh'] ?>">
                                <img src="/B1809282_LyHongQuang_CT27501/public/img/product/<?php echo $arr[$i]['hinh'] ?>" alt="" width="170px" height="170px" class="product-img">
                                <h5 class="product-name"><?php echo $arr[$i]['tenhh'] ?></h5>
                                <strong class="product-price"><?php echo number_format($arr[$i]['dongia'], 0, ",", ".") ?> VND</strong>
                        </a>
                </div>
        <?php
        }
        ?>

</div>