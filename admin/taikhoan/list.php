<div class="content">
    <div class="header">
        <h1>Tài khoản</h1>
        <div class="logo">
            <img src="../view/img/logo-web.png" alt="" />
        </div>
    </div>
    <div class="main-content">
        <h1 class="main-content-title">Danh sách tài khoản</h1>
        <div class="table-product-wapper table-category-wapper">
            <table class="list-product list-category list-account">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên tài khoản</th>
                        <th>Mật khẩu</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Chức vụ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($danhsachtaikhoan)) {
                        $stt = 0;
                        foreach ($danhsachtaikhoan as $taikhoan) {
                            extract($taikhoan);
                            $suataikhoan = 'index.php?act=suataikhoan&id=' . $taikhoan["id"];
                            $xoataikhoan = 'index.php?act=xoataikhoan&id=' . $taikhoan["id"];
                            $stt++;
                    ?>
                            <tr>
                                <td><?php echo $stt ?></td>
                                <td><?php if (isset($tentaikhoan)) echo $tentaikhoan ?></td>
                                <td><?php if (isset($matkhau)) echo $matkhau ?></td>
                                <td><?php if (isset($email)) echo $email ?></td>
                                <td><?php if (isset($diachi)) echo $diachi ?></td>
                                <td><?php if (isset($sdt)) echo $sdt ?></td>
                                <td><?php if (isset($chucvu)) echo $chucvu ?></td>
                                <td>
                                    <a href="<?php echo $suataikhoan ?>" class="edit-btn"><i class="fa-regular fa-pen-to-square"></i> Sửa</a>
                                    <?php
                                    if ($taikhoan["id"] != $_SESSION["taikhoan"]["id"]) {
                                    ?>
                                        <a href="<?php echo $xoataikhoan ?>" class="delete-btn"><i class="fa-regular fa-trash-can"></i> Xoá</a>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>