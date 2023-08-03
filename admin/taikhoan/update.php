<?php
if (isset($taikhoan)) {
    extract($taikhoan);
}
?>
<div class="content">
    <div class="header">
        <h1>Tài khoản</h1>
        <div class="logo">
            <img src="../view/img/logo-web.png" alt="" />
        </div>
    </div>
    <div class="main-content">
        <h1 class="main-content-title">Sửa tài khoản sản phẩm</h1>
        <form class="form-input" action="index.php?act=updatetaikhoan" method="post">
            <?php
            if (isset($thongbaothanhcong)) echo '<h3 id="thongbaothanhcong" style="color: red; width: 100%; text-align: center;">' . $thongbaothanhcong . '</h3> <h3 style="color: red; width: 100%; text-align: center;" id="countdown"></h3>';
            ?>
            <label for="account-name">Tên tài khoản</label> <br />
            <input id="account-name" name="tentaikhoan" type="text" placeholder="Nhập vào tên tài khoản mới" value="<?php if (isset($tentaikhoan)) echo $tentaikhoan ?>" required />
            <br />
            <?php
            if (isset($thongbaotentaikhoan)) echo '<p style="color: red; width: 100%;">' . $thongbaotentaikhoan . '</p>';
            ?>
            <br />
            <label for="account-email">Email</label> <br />
            <input id="account-email" name="email" type="email" placeholder="Nhập vào email mới" value="<?php if (isset($email)) echo $email ?>" required />
            <br /><br />
            <label for="account-address">Địa chỉ</label> <br />
            <input id="account-address" name="diachi" type="text" placeholder="Nhập vào địa chỉ" value="<?php if (isset($diachi)) echo $diachi ?>" />
            <br /><br />
            <label for="account-phone">Số điện thoại</label> <br />
            <input id="account-phone" name="sdt" type="number" placeholder="Nhập vào tên tài khoản mới" value="<?php if (isset($tentaikhoan)) echo $tentaikhoan ?>" min="0" />
            <br /><br />
            <label for="account-role">Chức vụ</label> <br />
            <select name="chucvu" id="account-role">
                <option <?php if (isset($chucvu) && $chucvu == 0) echo "selected"; ?> value="0">Khách hàng</option>
                <option <?php if (isset($chucvu) && $chucvu == 1) echo "selected"; ?> value="1">Quản trị viên</option>
            </select>
            <br /><br />
            <label for="account-password">Mật khẩu</label> <br />
            <input id="account-password" name="matkhau" type="password" placeholder="Nhập vào mật khẩu mới" value="<?php if (isset($matkhau)) echo $matkhau ?>" required />
            <br /><br />
            <label for="account-repassword">Xác nhận lại mật khẩu</label> <br />
            <input id="account-repassword" name="matkhau2" type="password" placeholder="Xác nhận lại mật khẩu" required />
            <br />
            <?php
            if (isset($thongbaomatkhau)) echo '<p style="color: red; width: 100%;">' . $thongbaomatkhau . '</p>';
            ?>
            <br />
            <input type="hidden" name="id" value="<?php echo $taikhoan["id"] ?>">
            <button class="submit-btn" type="submit" name="capnhat">Cập nhật</button>
            <button class="reset-btn" type="reset">Nhập lại</button>
            <a href="index.php?act=danhsachtaikhoan"><button type="button" class="list-btn">Danh sách</button></a>
        </form>
    </div>
</div>
<script>
    if (document.querySelector("#thongbaothanhcong")) {
        let timeLeft = 8;
        const countdownElement = document.querySelector("#countdown");
        countdownElement.textContent = `Chuyển đến trang danh sách tài khoản trong ${timeLeft} giây`;
        const countdownInterval = setInterval(() => {
            timeLeft--;
            countdownElement.textContent = `Chuyển đến trang danh sách tài khoản trong ${timeLeft} giây`;
            if (timeLeft === 0) {
                clearInterval(countdownInterval);
                window.location.href = "index.php?act=danhsachtaikhoan";
            }
        }, 1000);
    }
</script>