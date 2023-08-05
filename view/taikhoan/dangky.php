<div class="sign-in-container">
    <form action="index.php?act=dangky" class="sign-in-content" method="post">
        <h1>ĐĂNG KÝ</h1>
        <?php
        if (isset($thongbaothanhcong)) echo '<h3 id="thongbaothanhcong" style="color: red;">' . $thongbaothanhcong . '</h3>';
        ?>
        <h3 style="color: red;" id="countdown"></h3>
        <input type="text" name="tentaikhoan" placeholder="Nhập vào tên tài khoản..." value="<?php if (isset($tentaikhoan)) echo $tentaikhoan ?>" required>
        <?php
        if (isset($thongbaotentaikhoan)) echo '<p style="color: red; width: 100%;">' . $thongbaotentaikhoan . '</p>';
        ?>
        <input type="email" name="email" placeholder="Nhập vào email..." value="<?php if (isset($email)) echo $email ?>" required>
        <?php
        if (isset($thongbaoemail)) echo '<p style="color: red; width: 100%;">' . $thongbaoemail . '</p>';
        ?>
        <input type="password" name="matkhau" placeholder="Nhập vào mật khẩu..." required>
        <input type="password" name="matkhau2" placeholder="Xác nhận lại mật khẩu" required>
        <?php
        if (isset($thongbaomatkhau)) echo '<p style="color: red; width: 100%;">' . $thongbaomatkhau . '</p>';
        ?>
        <button type="submit" name="dangky" class="sign-in-submit">Đăng ký</button>
        <p>Bạn đã có tài khoản? <a class="sign-up-link text-red" href="index.php?act=dangnhap">Đăng nhập ngay tại đây</a> </p>
    </form>
</div>
<script>
    if (document.querySelector("#thongbaothanhcong")) {
        let timeLeft = 3;
        const countdownElement = document.querySelector("#countdown");
        countdownElement.textContent = `Chuyển đến trang đăng nhập trong ${timeLeft} giây`;
        const countdownInterval = setInterval(() => {
            timeLeft--;
            countdownElement.textContent = `Chuyển đến trang đăng nhập trong ${timeLeft} giây`;
            if (timeLeft === 0) {
                clearInterval(countdownInterval);
                window.location.href = "index.php?act=dangnhap";
            }
        }, 1000);
    }
</script>