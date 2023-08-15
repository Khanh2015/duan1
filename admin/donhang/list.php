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
            <form action="index.php?act=timdonhang" class="filter-product" method="post">
                <input <?php if (isset($iddonhang)) echo 'value="' . $iddonhang . '"' ?> type="text" name="iddonhang" placeholder="Nhập vào mã đơn hàng..." />
                <button name="timkiem" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
            <table class="list-bill list-product list-category">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
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
                        $stt = $sopluongbanghimoitrang * $page - $sopluongbanghimoitrang;
                        foreach ($danhsachdonhang as $donhang) {
                            extract($donhang);
                            $suadonhang = "index.php?act=suadonhang&id=" . $donhang["id"];
                            $chitietdonhang = "index.php?act=chitietdonhang&id=" . $donhang["id"];
                            $stt++;
                    ?>
                            <tr>
                                <td><?php echo 'TBTK-' . $donhang['id']; ?></td>
                                <td><?php echo $tentaikhoan ?></td>
                                <td><?php echo $diachi ?></td>
                                <td><?php echo $email ?></td>
                                <td><?php echo $sdt ?></td>
                                <td <?php
                                    switch ($trangthai) {
                                        case '1':
                                            echo 'style="color: red;"';
                                            break;
                                        case '2':
                                            echo 'style="color: orange;"';
                                            break;
                                        case '3':
                                            echo 'style="color: blue;"';
                                            break;
                                        case '4':
                                            echo 'style="color: #00CD00"';
                                            break;
                                    }
                                    ?>>
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
                                            echo 'Giao hàng thành công';
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
                                <td><?php echo number_format($tongtien, 0, ",", ".") ?>đ</td>
                                <td>
                                    <a href="<?php echo $suadonhang ?>" class="edit-btn"><i class="fa-regular fa-pen-to-square"></i> Sửa</a>
                                    <a href="<?php echo $chitietdonhang ?>" style="margin: 0;" class="list-btn">Chi tiết</a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo '<p class="added-successfully">Không có đơn hàng nào ❌</p><br>';
                    }
                    ?>
                </tbody>
            </table>
            <?php
            require_once "./pagination.php"
            ?>
        </div>
    </div>
</div>