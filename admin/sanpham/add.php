<div class="content">
    <div class="header">
        <h1>Sản phẩm</h1>
        <div class="logo">
            <img src="../view/img/logo-web.png" alt="" />
        </div>
    </div>
    <div class="main-content">
        <h1 class="main-content-title">Thêm sản phẩm</h1>
        <form class="form-input form-input-product" action="index.php?act=themsanpham" method="post" enctype="multipart/form-data">
            <?php
            if (isset($thongbao)) {
                echo '<p class="added-successfully">' . $thongbao . '</p><br>';
            }
            ?>
            <label for="">Danh mục</label><br />
            <select style="margin-top: 10px" name="iddanhmuc" id="product-type">
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
            <h4 class="shirt-size">Size áo</h4>
            <input type="checkbox" id="size-s" name="size[]" value="S" />
            <label class="size-label shirt-size" for="size-s">S</label>
            <input type="checkbox" id="size-m" name="size[]" value="M" />
            <label class="size-label shirt-size" for="size-m">M</label>
            <input type="checkbox" id="size-l" name="size[]" value="L" />
            <label class="size-label shirt-size" for="size-l">L</label>
            <input type="checkbox" id="size-xl" name="size[]" value="XL" />
            <label class="size-label shirt-size" for="size-xl">XL</label>
            <input type="checkbox" id="size-xxl" name="size[]" value="XXL" />
            <label class="size-label shirt-size" for="size-xxl">XXL</label>

            <h4 style="margin-top: 30px;" class="other-size">Size</h4>
            <input type="checkbox" id="size-nho" name="size[]" value="Nhỏ" />
            <label class="size-label other-size" for="size-nho">Nhỏ</label>
            <input type="checkbox" id="size-vua" name="size[]" value="Vừa" />
            <label class="size-label other-size" for="size-vua">Vừa</label>
            <input type="checkbox" id="size-lon" name="size[]" value="Lớn" />
            <label class="size-label other-size" for="size-lon">Lớn</label>

            <h4 style="margin-top: 30px;" class="shoe-size">Size giày</h4>
            <input type="checkbox" id="size-40" name="size[]" value="40" />
            <label class="size-label shoe-size" for="size-40">40</label>
            <input type="checkbox" id="size-41" name="size[]" value="41" />
            <label class="size-label shoe-size" for="size-41">41</label>
            <input type="checkbox" id="size-42" name="size[]" value="42" />
            <label class="size-label shoe-size" for="size-42">42</label>
            <input type="checkbox" id="size-43" name="size[]" value="43" />
            <label class="size-label shoe-size" for="size-43">43</label>
            <input type="checkbox" id="size-44" name="size[]" value="44" />
            <label class="size-label shoe-size" for="size-44">44</label>
            <input type="checkbox" id="size-45" name="size[]" value="45" />
            <label class="size-label shoe-size" for="size-45">45</label>
            <input type="checkbox" id="size-46" name="size[]" value="46" />
            <label class="size-label shoe-size" for="size-46">46</label>
            <input type="checkbox" id="size-47" name="size[]" value="47" />
            <label class="size-label shoe-size" for="size-47">47</label>

            <h4 style="margin-top: 30px;" class="glove-size">Size găng tay</h4>
            <input type="checkbox" id="size-5" name="size[]" value="5" />
            <label class="size-label glove-size" for="size-5">5</label>
            <input type="checkbox" id="size-6" name="size[]" value="6" />
            <label class="size-label glove-size" for="size-6">6</label>
            <input type="checkbox" id="size-7" name="size[]" value="7" />
            <label class="size-label glove-size" for="size-7">7</label>
            <input type="checkbox" id="size-8" name="size[]" value="8" />
            <label class="size-label glove-size" for="size-8">8</label>
            <input type="checkbox" id="size-9" name="size[]" value="9" />
            <label class="size-label glove-size" for="size-9">9</label>
            <input type="checkbox" id="size-10" name="size[]" value="10" />
            <label class="size-label glove-size" for="size-10">10</label>
            <input type="checkbox" id="size-11" name="size[]" value="11" />
            <label class="size-label glove-size" for="size-11">11</label>
            <input type="checkbox" id="size-12" name="size[]" value="12" />
            <label class="size-label glove-size" for="size-12">12</label>

            <h4 style="margin-top: 30px;">Màu sắc</h4>
            <input type="checkbox" id="color-red" name="color[]" value="Đỏ" />
            <label class="color-label" for="color-red">Đỏ</label>
            <input type="checkbox" id="color-yellow" name="color[]" value="Vàng" />
            <label class="color-label" for="color-yellow">Vàng</label>
            <input type="checkbox" id="color-green" name="color[]" value="Xanh lá" />
            <label class="color-label" for="color-green">Xanh lá</label>
            <input type="checkbox" id="color-blue" name="color[]" value="Xanh dương" />
            <label class="color-label" for="color-blue">Xanh dương</label>
            <input type="checkbox" id="color-black" name="color[]" value="Đen" />
            <label class="color-label" for="color-black">Đen</label>
            <input type="checkbox" id="color-white" name="color[]" value="Trắng" />
            <label class="color-label" for="color-white">Trắng</label><br />
            <input type="checkbox" id="color-purple" name="color[]" value="Tím" />
            <label class="color-label" for="color-purple">Tím</label>
            <input type="checkbox" id="color-orange" name="color[]" value="Cam" />
            <label class="color-label" for="color-orange">Cam</label>
            <input type="checkbox" id="color-pink" name="color[]" value="Hồng" />
            <label class="color-label" for="color-pink">Hồng</label>
            <input type="checkbox" id="color-brown" name="color[]" value="Nâu" />
            <label class="color-label" for="color-brown">Nâu</label>
            <input type="checkbox" id="color-gray" name="color[]" value="Xám" />
            <label class="color-label" for="color-gray">Xám</label>
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
<script>
    // Lấy phần tử HTML của product type
    var productTypeElement = document.querySelector('#product-type');

    // Lấy giá trị của product type
    var productType = productTypeElement.value;

    // Hiện các phần tử HTML liên quan đến size tương ứng với loại sản phẩm
    showSizeElements(productType);

    // Thêm sự kiện change cho phần tử product type
    productTypeElement.addEventListener('change', function() {
        // Cập nhật giá trị của product type
        productType = this.value;

        // Hiện các phần tử HTML liên quan đến size tương ứng với loại sản phẩm
        showSizeElements(productType);
    });

    // Hàm hiện các phần tử HTML liên quan đến size tương ứng với loại sản phẩm
    function showSizeElements(productType) {
        // Lấy tất cả các phần tử HTML liên quan đến size
        var shirtSizeElements = document.querySelectorAll('.shirt-size');
        var shoeSizeElements = document.querySelectorAll('.shoe-size');
        var gloveSizeElements = document.querySelectorAll('.glove-size');
        var otherSizeElements = document.querySelectorAll('.other-size');

        // Ẩn tất cả các phần tử HTML liên quan đến size
        for (var i = 0; i < shirtSizeElements.length; i++) {
            shirtSizeElements[i].style.display = 'none';
        }
        for (var i = 0; i < shoeSizeElements.length; i++) {
            shoeSizeElements[i].style.display = 'none';
        }
        for (var i = 0; i < gloveSizeElements.length; i++) {
            gloveSizeElements[i].style.display = 'none';
        }
        for (var i = 0; i < otherSizeElements.length; i++) {
            otherSizeElements[i].style.display = 'none';
        }

        // Hiện các phần tử HTML tương ứng với loại sản phẩm
        if (productType === '1') {
            for (var i = 0; i < shirtSizeElements.length; i++) {
                shirtSizeElements[i].style.display = 'inline-block';
            }
        } else if (productType === '2') {
            for (var i = 0; i < shoeSizeElements.length; i++) {
                shoeSizeElements[i].style.display = 'inline-block';
            }
        } else if (productType === '3') {
            for (var i = 0; i < gloveSizeElements.length; i++) {
                gloveSizeElements[i].style.display = 'inline-block';
            }
        } else {
            for (var i = 0; i < otherSizeElements.length; i++) {
                otherSizeElements[i].style.display = 'inline-block';
            }
        }
    }

    const sizeCheckboxes = document.querySelectorAll('input[name="size[]"]');
    const colorCheckboxes = document.querySelectorAll('input[name="color[]"]');

    function isAtLeastOneChecked(checkboxes) {
        for (let i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                return true;
            }
        }
        return false;
    }

    function onFormSubmit(event) {
        if (!isAtLeastOneChecked(sizeCheckboxes) || !isAtLeastOneChecked(colorCheckboxes)) {
            event.preventDefault();
            alert('Bạn phải chọn ít nhất một size và một màu sắc!');
        }
    }
    document.querySelector('form').addEventListener('submit', onFormSubmit);
</script>