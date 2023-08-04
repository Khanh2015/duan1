<?php
if (isset($binhluan)) {
    extract($binhluan);
}
?>
<div class="content">
    <div class="header">
        <h1>Bình luận</h1>
        <div class="logo">
            <img src="../view/img/logo-web.png" alt="" />
        </div>
    </div>
    <div class="main-content">
        <h1 class="main-content-title">Sửa bình luận</h1>
        <form class="form-input" action="index.php?act=updatebinhluan" method="post">
            <?php
            if (isset($thongbao)) {
                echo '<p class="added-successfully">' . $thongbao . '</p><br>';
            }
            ?>
            <label for="comment-content">Nội dung bình luận</label> <br />
            <textarea name="noidung" id="comment-content" cols="30" rows="10"><?php if (isset($noidung)) echo $noidung ?></textarea>
            <br /><br />
            <input type="hidden" name="id" value="<?php echo $binhluan["id"] ?>">
            <button class="submit-btn" type="submit" name="capnhat">Cập nhật</button>
            <button class="reset-btn" type="reset">Nhập lại</button>
            <a href="index.php?act=danhsachbinhluan"><button type="button" class="list-btn">Danh sách</button></a>
        </form>
    </div>
</div>