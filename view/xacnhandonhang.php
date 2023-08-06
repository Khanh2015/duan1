<?php
if (isset($_SESSION["taikhoan"])) {
    $tentaikhoan = $_SESSION["taikhoan"]["tentaikhoan"];
    $sdt = $_SESSION["taikhoan"]["sdt"];
    $diachi = $_SESSION["taikhoan"]["diachi"];
    $email = $_SESSION["taikhoan"]["email"];
} else {
    $tentaikhoan = "";
    $sdt = "";
    $diachi = "";
    $email = "";
}
?>

<div class="view-cart relative">
    <div class="view-cart-left">
        <div class="order-progress">
            <div class="progress-dot">
                <span class="dot dot-line-active"></span>
                <span class="dot-name">Giỏ hàng</span>
            </div>
            <div class="progress-line dot-line-active"></div>
            <div class="progress-dot">
                <span class="dot dot-line-active"></span>
                <span class="dot-name">Đặt hàng</span>
            </div>
            <div class="progress-line"></div>
            <div class="progress-dot">
                <span class="dot"></span>
                <span class="dot-name">Thanh toán</span>
            </div>
            <div class="progress-line"></div>
            <div class="progress-dot">
                <span class="dot"></span>
                <span class="dot-name">Hoàn thành đơn</span>
            </div>
        </div>
        <div class="cart-content">
            <div class="cart-content1">
                <h2 class="cart-content-title">Thông tin người nhận</h2>
                <form action="index.php?act=dathangthanhcong" class="infomation" method="post">
                    <label for="">Tên người nhận</label><br>
                    <input name="tentaikhoan" type="text" placeholder="Nhập vào tên người nhận..." value="<?= $tentaikhoan ?>" required><br><br>
                    <label for="">SĐT người nhận</label><br>
                    <input name="sdt" type="number" placeholder="Nhập vào SĐT người nhận..." value="<?= $sdt ?>" required><br><br>
                    <label for="">Email người nhận</label><br>
                    <input name="email" type="email" placeholder="Nhập vào email người nhận..." value="<?= $email ?>" required><br><br>
                    <label for="">Địa chỉ người nhận</label><br>
                    <textarea name="diachi" class="w-[80%] px-3 py-[10px] rounded-md border border-[#ccc] mt-[10px]" placeholder="Nhập vào địa chỉ người nhận..." required name="address" id="" cols="30" rows="4"><?= $diachi ?></textarea><br><br>
                    <button name="dongydathang" type="submit">Xác nhận</button>
                </form>
            </div>
            <div class="cart-content2">
                <h2 class="cart-content-title">Phương thức giao hàng</h2>
                <div class="express"><i class="fa-solid fa-circle-check"></i> Chuyển phát nhanh</div>
                <div class="pay">
                    <h2 class="pttt">Phương thức thanh toán</h2>
                    <div class="content">
                        <div class="hihi">
                            <span class="content-name"> Mọi giao dịch đều được bảo mật và mã hóa.Thông tin thẻ tín dụng sẽ không
                                bao giờ được lưu lại.</span>
                        </div>
                        <p class="free-ship"><i class="fa-solid fa-circle-check"></i> Thanh toán khi nhận hàng </p>
                        <p class="free-ship unclickable"><i class="gg-shape-circle unclickable"></i> Thanh toán bằng thẻ tín dụng
                            <img class="visa" src="./view/img/visa.png" alt="">
                            <img class="mater" src="./view/img/mater.png" alt="">
                        </p>
                        <p class="free-ship unclickable"><i class="gg-shape-circle unclickable"></i> Thanh toán bằng thẻ ATM

                        </p>
                        <p class="free-ship unclickable"><i class="gg-shape-circle unclickable"></i> Thanh toán bằng Momo <img class="momo" src="./view/img/MoMo_Logo.png" alt=""></p>

                    </div>
                </div>
            </div>
        </div>
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
                $soluongtronggiohang = 0;
                $tongtiengoc = 0;
                $tongsosanpham = 0;
                foreach ($_SESSION["mycart"] as $item) {
                    $tonggiohang += $item[10];
                    $tongtiengoc += $item[12];
                    $tongsosanpham += $item[8];
                ?>
                    <tr>
                        <td><?= $soluongtronggiohang + 1 ?></td>
                        <td><img src="./upload/<?= $item[4] ?>" alt=""></td>
                        <td class="product-info">
                            <p class="product-name"><?= $item[1] ?></p>
                            <span class="color-product">Màu: <?= $item[7] ?></span><br>
                            <span class="size-product">Size: <?= $item[6] ?></span>
                        </td>
                        <td>-<?= number_format($item[11], 0, ",", ".") ?>đ</td>
                        <td> <?= $item[8] ?> </td>
                        <td class="total-price"><?php echo number_format($item[10], 0, ",", ".") ?>đ</td>
                    </tr>
                <?php
                    $soluongtronggiohang++;
                }
                echo '
                    <tr class="font-bold text-2xl">
                    <td colspan="5">Tổng giá trị đơn hàng</td>
                    <td class="text-red-500">' . number_format($tonggiohang, 0, ",", ".") . 'đ</td>
                    </tr>
                    ';
                ?>
                <?php
                $_SESSION["soluongtronggiohang"] = $soluongtronggiohang;
                ?>
            </tbody>
        </table>
        <a href="index.php?act=danhsachsanpham" class="mt-10 inline-block bg-green-500 text-white font-semibold text-lg px-5 py-4 rounded-md duration-200 hover:opacity-80 ">Tiếp tục mua hàng</a>
    </div>
    <div class="view-cart-right">
        <div class="cart-total">
            <h2 class="cart-total-title">Tổng tiền giỏ hàng</h2>
            <div class="cart-total-info">
                <div class="info-wapper">
                    <span class="info-name">Tổng sản phẩm</span> <span class="info-number"><?= $tongsosanpham ?></span>
                </div>
                <div class="info-wapper">
                    <span class="info-name">Tổng tiền gốc</span> <span class="info-number"><?= number_format($tongtiengoc, 0, ",", ".") ?>đ</span>
                </div>
                <div class="info-wapper">
                    <span class="info-name">Thành tiền sau chiết khấu</span> <span class="info-number"><?= number_format($tonggiohang, 0, ",", ".") ?>đ</span>
                </div>
                <div class="info-wapper">
                    <?php
                    if ($tonggiohang >= 500000) {
                        echo '<span class="info-name">Phí vận chuyển</span> <span class="info-number">0 VNĐ</span>';
                    } else {
                        echo '<span class="info-name">Phí vận chuyển</span> <span class="info-number">50.000 VNĐ</span>';
                    }
                    ?>
                </div>
                <div class="info-wapper text-2xl font-semibold">
                    <span class="info-name">Thành tiền</span>
                    <span class="info-number text-red-500">
                        <?php
                        if ($tonggiohang >= 500000) {
                            echo number_format($tonggiohang, 0, ",", ".") . "đ";
                        } else {
                            echo number_format($tonggiohang + 50000, 0, ",", ".") . "đ";
                        }
                        ?>
                    </span>
                </div>
                <!-- <a href="index.php?act=xacnhandonhang" class="submit-btn">Đặt hàng</a> -->
                <?php
                if ($tonggiohang >= 500000) {
                    echo '<p class="free-ship"><i class="fa-solid fa-circle-check"></i> Đơn hàng của bạn được miễn phí ship</p>';
                } else {
                    echo '<p class="no-ship"><i class="fa-solid fa-triangle-exclamation"></i> Miễn phí ship với đơn hàng trên 500.000 VNĐ</p>';
                }

                ?>
            </div>
        </div>
    </div>
</div>