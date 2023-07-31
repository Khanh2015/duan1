<div class="content">
    <div class="header">
        <h1>Danh mục</h1>
        <div class="logo">
            <img src="../view/img/logo-web.png" alt="" />
        </div>
    </div>
    <div class="main-content">
        <h1 class="main-content-title">Danh sách danh mục sản phẩm</h1>
        <div class="table-category-wapper">
            <table class="list-category">
                <thead>
                    <tr>
                        <th>ID danh mục</th>
                        <th>Tên danh mục</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($danhsachdanhmuc)) {
                        foreach ($danhsachdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            $suadanhmuc = "index.php?act=suadanhmuc&id=" . $id;
                            $xoadanhmuc = "index.php?act=xoadanhmuc&id=" . $id;
                    ?>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $tendanhmuc ?></td>
                                <td>
                                    <a href="<?php echo $suadanhmuc ?>" class="edit-btn"><i class="fa-regular fa-pen-to-square"></i> Sửa</a>
                                    <a href="<?php echo $xoadanhmuc ?>" class="delete-btn"><i class="fa-regular fa-trash-can"></i> Xoá</a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo '<p class="added-successfully">Không có danh mục nào ❌</p><br>';
                    }
                    ?>
                </tbody>
            </table>
            <a href="index.php?act=themdanhmuc" class="submit-btn">Thêm mới</a>
        </div>
    </div>
</div>