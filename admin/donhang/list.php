<div class="content">
    <div class="header">
        <h1>Đơn hàng</h1>
        </h1>
        <div class="logo">
            <img src="../view/img/logo-web.png" alt="" />
        </div>
    </div>
    <div class="main-content">
        <h1 class="main-content-title">Danh sách đơn hàng</h1>
        <div class="table-product-wapper table-category-wapper">
            <table class="list-product list-category">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên tài khoản</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Trạng thái đơn hàng</th>
                        <th>Phương thức thanh toán</th>
                        <th>Ngày đặt hàng</th>
                        <th>Tổng số lượng sản phẩm</th>
                        <th>Tổng thanh toán</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($danhsachdonhang) && !empty($danhsachdonhang)) {
                        $stt = 0;
                        foreach ($danhsachdonhang as $donhang) {
                            extract($donhang);
                            $suadonhang = "index.php?act=suadonhang&id=" . $donhang["id"];
                            $xoadonhang = "index.php?act=xoadonhang&id=" . $donhang["id"];
                            $stt++;
                    ?>
                            <tr>
                                <td><?php echo $stt ?></td>
                                <td><?php echo $tentaikhoan ?></td>
                                <td><?php echo $diachi ?></td>
                                <td><?php echo $email ?></td>
                                <td><?php echo $sdt ?></td>
                                <td>
                                    <?php
                                    switch ($trangthai) {
                                        case '1':
                                            echo 'Chờ xác nhận';
                                            break;
                                        case '2':
                                            echo 'Đã xác nhận';
                                            break;
                                        case '3':
                                            echo 'Đang vận chuyển';
                                            break;
                                        case '4':
                                            echo 'Đã nhận được hàng';
                                            break;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    switch ($pttt) {
                                        case '1':
                                            echo 'Thanh toán khi nhận hàng';
                                            break;
                                        default:
                                            echo 'Đã thanh toán qua thẻ ngân hàng';
                                            break;
                                    }
                                    ?>
                                </td>
                                <td><?php echo $ngaydathang ?></td>
                                <td><?php echo $tongsoluongsanpham ?></td>
                                <td><?php echo $tongtien ?></td>
                                <td>
                                    <a href="<?php echo $suadonhang ?>" class="edit-btn"><i class="fa-regular fa-pen-to-square"></i> Sửa</a>
                                    <a href="<?php echo $xoadonhang ?>" class="delete-btn"><i class="fa-regular fa-trash-can"></i> Xoá</a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo '<p class="added-successfully">Hông coá đơn hàng nào cạ 😭</p><br>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>