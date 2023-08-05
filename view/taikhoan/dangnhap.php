<div class="sign-in-container">
    <form action="index.php?act=dangnhap" class="sign-in-content" method="post">
        <h1>ĐĂNG NHẬP</h1>
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