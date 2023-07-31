<div class="content">
    <div class="header">
        <h1>Sản phẩm</h1>
        <div class="logo">
            <img src="../view/img/logo-web.png" alt="" />
        </div>
    </div>
    <div class="main-content">
        <h1 class="main-content-title">Thêm sản phẩm</h1>
        <form class="form-input" action="index.php?act=themsanpham" method="post" enctype="multipart/form-data">
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
                        echo '<option value="' . $danhmuc["id"] . '">' . $tendanhmuc . '</option>';
                    }
                }
                ?>
            </select><br /><br />
            <label for="product-name">Tên sản phẩm</label> <br />
            <input name="ten" id="product-name" type="text" placeholder="Nhập vào tên sản phẩm mới" required />
            <br /><br />
            <label for="product-img">Ảnh sản phẩm</label> <br />
            <input name="anh" class="input-img" id="product-img" type="file" required />
            <br />
            <?php
            if (isset($thongbaoanh)) {
                echo '<br><p style="text-align: left; font-size: 14px;" class="added-successfully">' . $thongbaoanh . '</p><br>';
            }
            ?>
            <br />
            <label for="product-price">Giá sale</label> <br />
            <input name="giasale" id="product-price" type="number" placeholder="Nhập vào giá sale" min="1" required />
            <br /><br />
            <label for="product-sale">Giá gốc</label> <br />
            <input name="giagoc" id="product-sale" type="number" placeholder="Nhập vào giá gốc" min="1" required />
            <br /><br />
            <label for="product-size">Size sản phẩm</label> <br />
            <select name="size" id="product-size">
                <option value="S">S (Áo)</option>
                <option value="M">M (Áo)</option>
                <option value="L">L (Áo)</option>
                <option value="XL">XL (Áo)</option>
                <option value="XXL">XXL (Áo)</option>
                <option value="5">5 (Găng tay)</option>
                <option value="6">6 (Găng tay)</option>
                <option value="7">7 (Găng tay)</option>
                <option value="8">8 (Găng tay)</option>
                <option value="9">9 (Găng tay)</option>
                <option value="10">10 (Găng tay)</option>
                <option value="11">11 (Găng tay)</option>
                <option value="12">12 (Găng tay)</option>
                <option value="40">40 (Giày)</option>
                <option value="41">41 (Giày)</option>
                <option value="42">42 (Giày)</option>
                <option value="43">43 (Giày)</option>
                <option value="44">44 (Giày)</option>
                <option value="45">45 (Giày)</option>
                <option value="46">46 (Giày)</option>
                <option value="47">47 (Giày)</option>
            </select>
            <br><br>
            <label for="product-color">Màu sản phẩm</label> <br />
            <select name="color" id="product-color">
                <option value="Đỏ">Đỏ</option>
                <option value="Vàng">Vàng</option>
                <option value="Xanh lá">Xanh lá</option>
                <option value="Xanh dương">Xanh dương</option>
                <option value="Đen">Đen</option>
                <option value="Trắng">Trắng</option>
                <option value="Tím">Tím</option>
                <option value="Cam">Cam</option>
                <option value="Hồng">Hồng</option>
                <option value="Xám">Xám</option>
            </select>
            <br><br>
            <label for="product-quantity">Số lượng</label> <br />
            <input id="product-quantity" type="number" placeholder="Nhập vào số lượng sản phẩm" name="soluong" min="1" required />
            <br /><br />
            <label for="product-desc">Mô tả</label> <br />
            <textarea name="mota" id="product-desc" cols="67" rows="15" placeholder="Nhập vào mô tả sản phẩm" required></textarea>
            <br /><br />
            <button class="submit-btn" type="submit" name="themmoi">Thêm mới</button>
            <button class="reset-btn" type="reset">Nhập lại</button>
            <a href="index.php?act=danhsachsanpham"><button type="button" class="list-btn">Danh sách</button></a>
        </form>
    </div>
</div>