<div class="row mt-3">
    <div class="col-7">
        <?php
        $arr = json_decode($data['product'], true);
        ?>
        <h4><?php echo $arr[0]['tenhh'] ?></h4>
        <img src="/B1809282_LyHongQuang_CT27501/public/img/product/<?php echo $arr[0]['hinh'] ?>" alt="" width="300px">
    </div>

    <div class="col-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="2">
                        <h3 class="text-primary">Cấu hình <?php echo $arr[0]['tenhh'] ?></h3>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $lines = explode(".", $arr[0]['mota']);
                if (!empty($lines)) {
                ?>
                    <?php
                    foreach ($lines as $line) {
                        if (!empty($line)) {
                    ?>
                            <tr>
                                <td>
                                    <?php echo $line; ?>
                                </td>
                            </tr>
                <?php
                        }
                    }
                }
                ?>
            </tbody>
        </table>
        <strong>
            Số lượng:  
            <?php echo $arr[0]['soluonghang']?>
        </strong>
        
        <p style="font-size: 25px; color:red;"><?php echo number_format($arr[0]['dongia'], "0", ",", ".") ?> VND</p>
        <a href="/B1809282_LyHongQuang_CT27501/customer/cart/addcart/<?php echo $arr[0]['mshh'] ?>" class="btn btn-primary btn-lg">Thêm vào giỏ hàng</a>
    </div>


    <h3 class="mt-1">Sản phẩm liên quan</h3>
    <hr>

    <div class="row">
        <?php
        $relatedProducts = json_decode($data['related'], true);
        for ($i = 0; $i < count($relatedProducts); $i++) {
        ?>
            <div class="col-3">
                <a href="/B1809282_LyHongQuang_CT27501/customer/detail/detailProduct/<?php echo $relatedProducts[$i]['mshh'] ?>">
                    <img src="/B1809282_LyHongQuang_CT27501/public/img/product/<?php echo $relatedProducts[$i]['hinh'] ?>" alt="" width="170px" height="170px" class="product-img">
                    <h5 class="product-name"><?php echo $relatedProducts[$i]['tenhh'] ?></h5>
                    <strong class="product-price"><?php echo number_format($relatedProducts[$i]['dongia'], 0, ",", ".") ?></strong>
                </a>
            </div>
        <?php
        }
        ?>
    </div>

</div>