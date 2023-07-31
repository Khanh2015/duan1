<div class="content">
    <div class="header">
        <h1>Danh mục</h1>
        <div class="logo">
            <img src="../view/img/logo-web.png" alt="" />
        </div>
    </div>
    <div class="main-content">
        <h1 class="main-content-title">Thêm danh mục sản phẩm</h1>
        <form class="form-input" action="index.php?act=themdanhmuc" method="post">
            <?php
            if (isset($thongbao)) {
                echo '<p class="added-successfully">' . $thongbao . '</p><br>';
            }
            ?>
            <label for="">ID danh mục</label> <br />
            <input type="text" placeholder="Auto" disabled />
            <br /><br />
            <label for="category-name">Tên danh mục</label> <br />
            <input id="category-name" name="tendanhmuc" type="text" placeholder="Nhập vào tên danh mục mới" required />
            <br /><br />
            <button class="submit-btn" type="submit" name="themmoi">Thêm mới</button>
            <button class="reset-btn" type="reset">Nhập lại</button>
            <a href="index.php?act=danhsachdanhmuc"><button type="button" class="list-btn">Danh sách</button></a>
        </form>
    </div>
</div>