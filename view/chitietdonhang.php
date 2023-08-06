<h1 class="text-center mt-40">Chi tiết đơn hàng</h1>
<div class="mb-32 mx-80 mt-5 shadow-[0_0_30px_rgba(0,0,0,0.6)] p-5">
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
                    $stt = 1;
                    extract($sanpham);
                    $tonggiohang += $thanhtien;
            ?>
                    <tr>
                        <td><?= $stt ?></td>
                        <td><img src="./upload/<?php if (isset($anhsanpham)) echo $anhsanpham ?>" alt=""></td>
                        <td class="product-info">
                            <p class="product-name"><?php if (isset($tensanpham)) echo $tensanpham ?></p>
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
            <tr class="font-bold text-2xl">
                <td colspan="5">Tổng giá trị đơn hàng</td>
                <td class="text-red-500">
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
                <td class="text-red-500" colspan="6">Phí vận chuyển 50.000VNĐ được áp dụng với đơn hàng có giá trị dưới 500.000VNĐ</td>
            </tr>
        </tbody>
    </table>
</div>