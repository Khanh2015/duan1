<?php
if (isset($sanpham)) {
    extract($sanpham);
}
?>
<div class="content">
    <div class="header">
        <h1>Sản phẩm</h1>
        <div class="logo">
            <img src="../view/img/logo-web.png" alt="" />
        </div>
    </div>
    <div class="main-content">
        <h1 class="main-content-title">Sửa sản phẩm</h1>
        <form class="form-input" action="index.php?act=updatesanpham" method="post" enctype="multipart/form-data">
            <?php
            if (isset($thongbao)) {
                echo '<p class="added-successfully">' . $thongbao . '</p><br>';
            }
            ?>
            <label for="">Danh mục</label><br />
            <select style="margin-top: 10px" name="iddanhmuc" id="">
                <?php
                if (isset($danhsachdanhmuc)) {
                    foreach ($danhsachdanhmuc as $danhmuc) {
                        extract($danhmuc);
                ?>
                        <option value="<?php echo $danhmuc["id"] ?>" <?php if (isset($sanpham["iddanhmuc"]) && $danhmuc["id"] == $sanpham["iddanhmuc"]) echo "selected" ?>><?php echo $tendanhmuc ?></option>
                <?php
                    }
                }
                ?>
            </select><br /><br />
            <label for="product-name">Tên sản phẩm</label> <br />
            <input name="ten" id="product-name" type="text" placeholder="Nhập vào tên sản phẩm mới" required value="<?php if (isset($tensanpham)) echo $tensanpham ?>" />
            <br /><br />
            <label for="product-img">Ảnh sản phẩm</label> <br />
            <input name="anh" class="input-img" id="product-img" type="file" required /><br>
            <img style="width: 150px; margin-top: 20px;" src="<?php if (isset($anhsanpham)) echo "../upload/" . $anhsanpham ?>" alt="">

            <br />
            <?php
            if (isset($thongbaoanh)) {
                echo '<br><p style="text-align: left; font-size: 14px;" class="added-successfully">' . $thongbaoanh . '</p><br>';
            }
            ?>
            <br />
            <label for="product-price">Giá sale</label> <br />
            <input name="giasale" id="product-price" type="number" placeholder="Nhập vào giá sale" min="1" required value="<?php if (isset($giasale)) echo $giasale ?>" />
            <br /><br />
            <label for="product-sale">Giá gốc</label> <br />
            <input name="giagoc" id="product-sale" type="number" placeholder="Nhập vào giá gốc" min="1" required value="<?php if (isset($giagoc)) echo $giagoc ?>" />
            <br /><br />
            <label for="product-size">Size sản phẩm</label> <br />
            <select name="size" id="product-size">
                <option <?php if ($size == "S") echo "selected" ?> value="S">S (Áo)</option>
                <option <?php if ($size == "M") echo "selected" ?> value="M">M (Áo)</option>
                <option <?php if ($size == "L") echo "selected" ?> value="L">L (Áo)</option>
                <option <?php if ($size == "XL") echo "selected" ?> value="XL">XL (Áo)</option>
                <option <?php if ($size == "XXl") echo "selected" ?> value="XXL">XXL (Áo)</option>
                <option <?php if ($size == "5") echo "selected" ?> value="5">5 (Găng tay)</option>
                <option <?php if ($size == "6") echo "selected" ?> value="6">6 (Găng tay)</option>
                <option <?php if ($size == "7") echo "selected" ?> value="7">7 (Găng tay)</option>
                <option <?php if ($size == "8") echo "selected" ?> value="8">8 (Găng tay)</option>
                <option <?php if ($size == "8") echo "selected" ?> value="9">9 (Găng tay)</option>
                <option <?php if ($size == "10") echo "selected" ?> value="10">10 (Găng tay)</option>
                <option <?php if ($size == "11") echo "selected" ?> value="11">11 (Găng tay)</option>
                <option <?php if ($size == "12") echo "selected" ?> value="12">12 (Găng tay)</option>
                <option <?php if ($size == "40") echo "selected" ?> value="40">40 (Giày)</option>
                <option <?php if ($size == "41") echo "selected" ?> value="41">41 (Giày)</option>
                <option <?php if ($size == "42") echo "selected" ?> value="42">42 (Giày)</option>
                <option <?php if ($size == "43") echo "selected" ?> value="43">43 (Giày)</option>
                <option <?php if ($size == "44") echo "selected" ?> value="44">44 (Giày)</option>
                <option <?php if ($size == "45") echo "selected" ?> value="45">45 (Giày)</option>
                <option <?php if ($size == "46") echo "selected" ?> value="46">46 (Giày)</option>
                <option <?php if ($size == "47") echo "selected" ?> value="47">47 (Giày)</option>
            </select>
            <br><br>
            <label for="product-color">Màu sản phẩm</label> <br />
            <select name="color" id="product-color">
                <option <?php if ($color == "Đỏ") echo "selected" ?> value="Đỏ">Đỏ</option>
                <option <?php if ($color == "Vàng") echo "selected" ?> value="Vàng">Vàng</option>
                <option <?php if ($color == "Xanh lá") echo "selected" ?> value="Xanh lá">Xanh lá</option>
                <option <?php if ($color == "Xanh dương") echo "selected" ?> value="Xanh dương">Xanh dương</option>
                <option <?php if ($color == "Đen") echo "selected" ?> value="Đen">Đen</option>
                <option <?php if ($color == "Trắng") echo "selected" ?> value="Trắng">Trắng</option>
                <option <?php if ($color == "Tím") echo "selected" ?> value="Tím">Tím</option>
                <option <?php if ($color == "Cam") echo "selected" ?> value="Cam">Cam</option>
                <option <?php if ($color == "Hồng") echo "selected" ?> value="Hồng">Hồng</option>
                <option <?php if ($color == "Xám") echo "selected" ?> value="Xám">Xám</option>
            </select>
            <br><br>
            <label for="product-quantity">Số lượng</label> <br />
            <input id="product-quantity" type="number" placeholder="Nhập vào số lượng sản phẩm" name="soluong" min="1" required value="<?php if (isset($soluong)) echo $soluong ?>" />
            <br /><br />
            <label for="product-desc">Mô tả</label> <br />
            <textarea name="mota" id="product-desc" cols="67" rows="15" placeholder="Nhập vào mô tả sản phẩm" required><?php if (isset($mota)) echo $mota ?></textarea>
            <br /><br />
            <input type="hidden" name="id" value="<?php if (isset($sanpham["id"])) echo $sanpham["id"] ?>">
            <button class="submit-btn" type="submit" name="capnhat">Cập nhật</button>
            <button class="reset-btn" type="reset">Nhập lại</button>
            <a href="index.php?act=danhsachsanpham"><button type="button" class="list-btn">Danh sách</button></a>
        </form>
    </div>
</div>