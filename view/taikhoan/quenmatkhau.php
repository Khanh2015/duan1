<div class="sign-in-container">
    <form action="index.php?act=quenmatkhau" class="sign-in-content" method="post">
        <h1>QUÊN MẬT KHẨU</h1>
        <input type="email" name="email" placeholder="Nhập vào email đã đăng ký tài khoản...">
        <?php
        if (isset($thongbao)) {
            echo $thongbao;
        }
        if (isset($taikhoan)) {
            if (!empty($taikhoan)) {
                extract($taikhoan);
        ?>
                <p style="color: red;">Mật khẩu đã được gửi đến email của bạn, mời bạn kiểm tra email</p>
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