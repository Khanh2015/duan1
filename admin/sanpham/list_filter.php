<!-- <?php
        if (isset($keyword)) {
            echo $keyword;
        }
        if (isset($iddm)) {
            echo $iddm;
        }
        ?> -->
<div class="content">
    <div class="header">
        <h1>Sản phẩm</h1>
        <div class="logo">
            <img src="../view/img/logo-web.png" alt="" />
        </div>
    </div>
    <div class="main-content">
        <h1 class="main-content-title">Danh sách sản phẩm đã lọc</h1>
        <div class="table-product-wapper table-category-wapper">
            <form action="index.php?act=locsanpham" class="filter-product" method="post">
                <input <?php if (isset($keyword)) echo 'value="' . $keyword . '"' ?> type="text" name="keyword" placeholder="Nhập vào tên sản phẩm" />
                <select name="iddanhmuc" id="">
                    <option value="">Tất cả danh mục</option>
                    <?php
                    if (isset($danhsachdanhmuc)) {
                        foreach ($danhsachdanhmuc as $danhmuc) {
                    ?>
                            <option <?php if (isset($iddanhmucFilter) && $iddanhmucFilter == $danhmuc["id"]) echo "selected" ?> value="<?php echo $danhmuc["id"] ?>"><?php echo $danhmuc["tendanhmuc"] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <button name="loc" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
            <table class="list-category list-product">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Danh mục</th>
                        <th>Ảnh</th>
                        <th>Giá sale</th>
                        <th>Giá gốc</th>
                        <th>Size</th>
                        <th>Màu sắc</th>
                        <th>Số lượng</th>
                        <th>Lượt xem</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($danhsachsanpham) && !empty($danhsachsanpham)) {
                        $stt = $sopluongbanghimoitrang * $page - $sopluongbanghimoitrang;
                        foreach ($danhsachsanpham as $sanpham) {
                            extract($sanpham);
                            $suasanpham = "index.php?act=suasanpham&id=" . $id;
                            $xoasanpham = "index.php?act=xoasanpham&id=" . $id;
                            $stt++;
                    ?>
                            <tr>
                                <td><?= $stt ?></td>
                                <td><?php echo $tensanpham ?></td>
                                <td><?php echo $tendanhmuc ?></td>
                                <td>
                                    <img src="../upload/<?php echo $anhsanpham ?>" alt="" />
                                </td>
                                <td><?php echo number_format($giasale, 0, ",", ".") ?>đ</td>
                                <td><?php echo number_format($giagoc, 0, ",", ".") ?>đ</td>
                                <td><?php echo $size ?></td>
                                <td><?php echo $color ?></td>
                                <td><?php echo $soluong ?></td>
                                <td><?php echo $luotxem ?></td>
                                <td>
                                    <a href="<?php echo $suasanpham ?>" class="edit-btn"><i class="fa-regular fa-pen-to-square"></i> Sửa</a>
                                    <a href="<?php echo $xoasanpham ?>" class="delete-btn"><i class="fa-regular fa-trash-can"></i> Xoá</a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo '<p class="added-successfully">Không có sản phẩm nào cả</p><br>';
                    }
                    ?>
                </tbody>
            </table>
            <?php
            require_once "./pagination2.php"
            ?>
            <a href="index.php?act=themsanpham" class="submit-btn add-more-product">Thêm mới</a>
            <a href="index.php?act=danhsachsanpham"><button type="button" class="list-btn">Danh sách</button></a>
        </div>
    </div>
</div>