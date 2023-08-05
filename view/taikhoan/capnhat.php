<?php
if (isset($_SESSION["taikhoan"]) && is_array($_SESSION["taikhoan"])) {
    extract($_SESSION["taikhoan"]);
}
?>
<div class="sign-in-container">
    <form action="index.php?act=edit_taikhoan" class="sign-in-content update-account-content" method="post">
        <h1 style="text-align: center; width: 100%;">CẬP NHẬT TÀI KHOẢN</h1><br>
        <?php
        if (isset($thongbaothanhcong)) echo '<h3 id="thongbaothanhcong" style="color: red; width: 100%; text-align: center;">' . $thongbaothanhcong . '</h3> <h3 style="color: red; width: 100%; text-align: center;" id="countdown"></h3>';
        ?>
        <label for="update-name">Tên tài khoản (Không được phép chỉnh sửa)</label>
        <input style="color: #C0C0C0;" class="uneditable" id="update-name" type="text" name="tentaikhoan" placeholder="Nhập vào tên tài khoản..." value="<?php if (isset($tentaikhoan)) echo $tentaikhoan ?>" disabled>
        <label for="update-email">Email (Không được phép chỉnh sửa)</label>
        <input style="color: #C0C0C0;" class="uneditable" id="update-email" type="email" name="email" placeholder="Nhập vào email..." value="<?php if (isset($email)) echo $email ?>" disabled>
        <label for="update-address">Địa chỉ</label>
        <input id="update-address" type="text" name="diachi" placeholder="Nhập vào địa chỉ..." value="<?php if (isset($diachi)) echo $diachi ?>">
        <label for="update-phone">Số điện thoại</label>
        <input id="update-phone" type="number" name="sdt" placeholder="Nhập vào số điện thoại..." value="<?php if (isset($sdt)) echo $sdt ?>" min="0">
        <label for="update-password">Mật khẩu</label>
        <input id="update-password" type="password" name="matkhau" placeholder="Nhập vào mật khẩu..." value="<?php if (isset($matkhau)) echo $matkhau ?>" required>
        <label for="update-repassword">Xác nhận lại mật khẩu</label>
        <input id="update-repassword" type="password" name="matkhau2" placeholder="Xác nhận lại mật khẩu" value="<?php if (isset($matkhau2)) echo $matkhau2 ?>" required>
        <?php
        if (isset($thongbaomatkhau)) echo '<p style="color: red; width: 100%;">' . $thongbaomatkhau . '</p>';
        ?>
        <br>
        <input type="hidden" value="<?php if (isset($_SESSION["taikhoan"]["id"])) echo $$_SESSION["taikhoan"]["id"]; ?>">
        <button type="submit" name="capnhat" class="sign-in-submit">Cập nhật tài khoản</button>
    </form>
</div>
<script>
    if (document.querySelector("#thongbaothanhcong")) {
        let timeLeft = 8;
        const countdownElement = document.querySelector("#countdown");
        countdownElement.textContent = `Chuyển đến trang chủ trong ${timeLeft} giây`;
        const countdownInterval = setInterval(() => {
            timeLeft--;
            countdownElement.textContent = `Chuyển đến trang chủ trong ${timeLeft} giây`;
            if (timeLeft === 0) {
                clearInterval(countdownInterval);
                window.location.href = "index.php";
            }
        }, 1000);
    }
</script>