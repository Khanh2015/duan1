<div class="sign-in-container">
    <form action="index.php?act=dangnhap" class="sign-in-content" method="post">
        <h1>ĐĂNG NHẬP</h1>
        <?php
        if (isset($thongbaothanhcong)) echo '<h3 id="thongbaothanhcong" style="color: red;">' . $thongbaothanhcong . '</h3>';
        ?>
        <h3 style="color: red;" id="countdown"></h3>
        <input type="text" name="tentaikhoan" placeholder="Nhập vào tên tài khoản..." value="<?php if (isset($tentaikhoan)) echo $tentaikhoan ?>" required>
        <input type="password" name="matkhau" placeholder="Nhập vào mật khẩu..." required>
        <?php
        if (isset($thongbaoloi)) echo '<h3 id="thongbaoloi" style="color: red; width: 100%;">' . $thongbaoloi . '</h3>';
        ?>
        <a class="text-red" href="index.php?act=quenmatkhau">Quên mật khẩu?</a>
        <button type="submit" name="dangnhap" class="sign-in-submit">Đăng nhập</button>
        <p>Bạn không có tài khoản? <a class="sign-up-link text-red" href="index.php?act=dangky">Đăng ký ngay tại đây</a> </p>
    </form>
</div>
<script>
    if (document.querySelector("#thongbaothanhcong")) {
        let timeLeft = 3;
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