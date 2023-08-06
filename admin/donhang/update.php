<?php
if (isset($donhang)) {
    extract($donhang);
}
?>
<div class="content">
    <div class="header">
        <h1>Đơn hàng</h1>
        <div class="logo">
            <img src="../view/img/logo-web.png" alt="" />
        </div>
    </div>
    <div class="main-content">
        <h1 class="main-content-title">Sửa đơn hàng</h1>
        <form class="form-input" action="index.php?act=updatedonhang" method="post">
            <?php
            if (isset($thongbao)) {
                echo '<p class="added-successfully">' . $thongbao . '</p><br>';
            }
            ?>
            <label for="">Tên người nhận</label><br>
            <input name="tentaikhoan" type="text" placeholder="Nhập vào tên người nhận mới..." value="<?= $tentaikhoan ?>" required><br><br>
            <label for="">SĐT người nhận</label><br>
            <input name="sdt" type="number" placeholder="Nhập vào SĐT người nhận mới..." value="<?= $sdt ?>" required><br><br>
            <label for="">Email người nhận</label><br>
            <input name="email" type="email" placeholder="Nhập vào email người nhận mới..." value="<?= $email ?>" required><br><br>
            <label for="">Địa chỉ người nhận</label><br>
            <textarea name="diachi" class="w-[80%] px-3 py-[10px] rounded-md border border-[#ccc] mt-[10px]" placeholder="Nhập vào địa chỉ người nhận mới..." required name="address" id="" cols="30" rows="4"><?= $diachi ?></textarea><br><br>
            <label for="">Ngày đặt hàng</label><br>
            <input name="ngaydathang" type="text" placeholder="Nhập vào ngày đặt hàng mới..." value="<?= $ngaydathang ?>" required><br><br>
            <label for="">Tổng số lượng hàng</label><br>
            <input name="tongsoluongsanpham" type="number" placeholder="Nhập vào tổng số lượng hàng mới..." value="<?= $tongsoluongsanpham ?>" min="1" required><br><br>
            <label for="">Tổng tiền thanh toán</label><br>
            <input name="tongtien" type="text" placeholder="Nhập vào tổng tiền thanh toán mới..." value="<?= $tongtien ?>" min="1" required><br><br>
            <label for="">Phương thức thanh toán</label><br>
            <select name="pttt" id="">
                <option <?php if ($pttt == 1) echo "selected"  ?> value="1">Thanh toán khi nhận hàng</option>
                <option <?php if ($pttt == 2) echo "selected"  ?> disabled value="2">Thanh toán qua thẻ ATM</option>
            </select><br><br>
            <label for="">Trạng thái đơn hàng</label><br>
            <select name="trangthai" id="">
                <option <?php if ($trangthai == 1) echo "selected"  ?> value="1">Chờ xác nhận</option>
                <option <?php if ($trangthai == 2) echo "selected"  ?> value="2">Đã xác nhận</option>
                <option <?php if ($trangthai == 3) echo "selected"  ?> value="3">Đang giao hàng</option>
                <option <?php if ($trangthai == 4) echo "selected"  ?> value="4">Giao hàng thành công</option>
            </select><br><br>
            <input type="hidden" name="id" value="<?php echo $donhang["id"] ?>">
            <button class="submit-btn" type="submit" name="capnhat">Cập nhật</button>
            <button class="reset-btn" type="reset">Nhập lại</button>
            <a href="index.php?act=danhsachdonhang"><button type="button" class="list-btn">Danh sách</button></a>
        </form>
    </div>
</div>