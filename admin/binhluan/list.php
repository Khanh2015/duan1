<div class="content">
    <div class="header">
        <h1>Bình luận</h1>
        <div class="logo">
            <img src="../view/img/logo-web.png" alt="" />
        </div>
    </div>
    <div class="main-content">
        <h1 class="main-content-title">Danh sách bình luận</h1>
        <div class="table-product-wapper table-category-wapper">
            <table class="list-product list-category">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Nội dung</th>
                        <th>Tên tài khoản</th>
                        <th>Tên sản phẩm</th>
                        <th>Ngày bình luận</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($danhsachbinhluan) && !empty($danhsachbinhluan)) {
                        $stt = 0;
                        foreach ($danhsachbinhluan as $binhluan) {
                            extract($binhluan);
                            $suabinhluan = "index.php?act=suabinhluan&id=" . $binhluan["id"];
                            $xoabinhluan = "index.php?act=xoabinhluan&id=" . $binhluan["id"];
                            $stt++;
                    ?>
                            <tr>
                                <td><?php echo $stt ?></td>
                                <td><?php echo $noidung ?></td>
                                <td><?php echo $tentaikhoan ?></td>
                                <td><?php echo $tensanpham ?></td>
                                <td><?php echo $ngaybinhluan ?></td>
                                <td>
                                    <a href="<?php echo $suabinhluan ?>" class="edit-btn"><i class="fa-regular fa-pen-to-square"></i> Sửa</a>
                                    <a href="<?php echo $xoabinhluan ?>" class="delete-btn"><i class="fa-regular fa-trash-can"></i> Xoá</a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo '<p class="added-successfully">Hông coá bình luận nào cạ 😭</p><br>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>