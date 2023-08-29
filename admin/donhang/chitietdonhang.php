<div class="cart-detail-wrapper">

    <h1 class="cart-detail-title">Chi tiết đơn hàng TBTK-<?= $iddonhang ?></h1>
    <div class="cart-detail-container">
        <table class="cart-detail">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ẢNH</th>
                    <th>THÔNG TIN</th>
                    <th>GIẢM GIÁ</th>
                    <th>SỐ LƯỢNG</th>
                    <th>THÀNH TIỀN</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $tonggiohang = 0;
                $stt = 0;
                if (isset($danhsachsanpham)) {

                    foreach ($danhsachsanpham as $sanpham) {
                        $stt++;
                        extract($sanpham);
                        $tonggiohang += $thanhtien;
                ?>
                        <tr>
                            <td><?= $stt ?></td>
                            <td><img src="../upload/<?php if (isset($anhsanpham)) echo $anhsanpham ?>" alt=""></td>
                            <td class="product-info">
                                <p class="product-name"><?php if (isset($tensanpham)) echo $tensanpham ?></p>
                                <span class="color-product">Đơn giá: <?php if (isset($giasale)) echo number_format($giasale, 0, ",", ".") ?>đ</span><br>
                                <span class="color-product">Màu: <?php if (isset($color)) echo $color ?></span><br>
                                <span class="size-product">Size: <?php if (isset($size)) echo $size ?></span>
                            </td>
                            <td>-<?php if (isset($giasale)) echo number_format($giasale, 0, ",", ".") ?>đ</td>
                            <td> <?php if (isset($soluong)) echo $soluong ?> </td>
                            <td class="total-price"><?php if (isset($thanhtien)) echo number_format($thanhtien, 0, ",", ".") ?>đ</td>
                        </tr>
                <?php
                    }
                }
                ?>
                <tr class="cart-detai-total">
                    <td colspan="5">Tổng giá trị đơn hàng</td>
                    <td class="all-total-cart">
                        <?php
                        if ($tonggiohang < 500000) {
                            echo number_format($tonggiohang + 50000, 0, ",", ".");
                        } else {
                            echo number_format($tonggiohang, 0, ",", ".");
                        }
                        ?>
                        đ</td>
                </tr>
                <tr>
                    <td class="cart-detail-shiping-fee" colspan="6">Phí vận chuyển 50.000VNĐ được áp dụng với đơn hàng có giá trị dưới 500.000VNĐ</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>