<div class="sign-in-container">
    <form action="" class="sign-in-content" method="post">
        <h1>QUÊN MẬT KHẨU</h1>
        <input type="email" name="email" placeholder="Nhập vào email đã đăng ký tài khoản...">
        <?php
        if (isset($taikhoan)) {
            if (!empty($taikhoan)) {
                extract($taikhoan);
        ?>
                <h3>Mật khẩu của email: <?php echo '<span class="text-red">' . $email . '</span>' ?></h3>
                <table class="forgot-password-table">
                    <thead>
                        <tr>
                            <th>Tên tài khoản</th>
                            <th>Mật khẩu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $tentaikhoan ?></td>
                            <td><?php echo $matkhau ?></td>
                        </tr>

                <?php
            } else {
                echo '<p>Không có tài khoản nào đã được đăng ký với email:<span style="color: red;"> ' . $email . '</span></p>';
            }
        }
                ?>
                    </tbody>
                </table>
                <button type="submit" name="quenmatkhau" class="sign-in-submit">Lấy lại mật khẩu</button>
    </form>
</div>