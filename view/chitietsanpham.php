<?php
if (isset($sanpham)) {
    extract($sanpham);
    $selectedSizes = explode(',', $size);
    $selectedColors = explode(',', $color);
}
?>
<!-- chi tiết sản phẩm  -->
<div class="mx-[120px] mt-[150px]">
    <div class="grid grid-cols-2 gap-5 ">
        <!-- phan anh san pham -->
        <div class="">
            <!-- chỗ dữ liệu ảnh từng sản phẩm khi ấn xem chi tiết sản phẩm -->
            <div class="relative border-solid border-[1px] border-gray-300 p-5  "><img src="./upload/<?php if (isset($anhsanpham)) echo $sanpham['anhsanpham'] ?>" alt="Ảnh sản phẩm" class="w-100% transition-transform duration-500 transform" id="product-image">
            </div>
        </div>


        <!-- phần tên , giá , mô tả, kichs cỡ , chọn size và add đặt hàng  -->
        <div class="">
            <div class="product_price my-3">
                <form class="form-chitietsanpham" action="index.php?act=themvaogiohang" method="post">
                    <!-- ten san pham -->
                    <h2 class="bg-white font-semibold text-3xl"> <?php if (isset($tensanpham)) echo $sanpham['tensanpham'] ?></h2>
                    <!-- gia san pham -->
                    <span class="flex my-6">

                        <p class="text-[#FF324D] font-semibold text-2xl max-w-[110px] bg-white "><?php if (isset($giasale)) echo number_format($sanpham['giasale'], 0, ",", ".") ?>đ</p>
                        <del class="text-gray-500 font-mono mx-2"><?php if (isset($giagoc)) echo number_format($sanpham['giagoc'], 0, ",", ".") ?>đ</del>
                        <!-- tính % giảm giá -->
                        <span class="text-[#388E3C] font-mono  max-w-[80px] bg-white"><?= intval(round((($giagoc - $giasale) / $giagoc) * 100)) ?>% OFF</span>
                        <!-- đánh giá bao nhiêu sao
                        <span class="ml-20"><i class="fa-solid fa-star" style="color: #f5db38;"></i>
                            <i class="fa-solid fa-star" style="color: #f5db38;"></i>
                            <i class="fa-solid fa-star" style="color: #f5db38;"></i>
                            <i class="fa-regular fa-star" style="color: #f5db38;"></i>
                        </span> -->
                    </span>
                    <!-- mo ta san pham -->
                    <div class="my-2">
                        <p class="text-[#687188] font-normal text-xl"><?php if (isset($mota)) echo $sanpham['mota'] ?></p>
                    </div>
                    <!-- cam ket -->
                    <div class="text-2xl my-6">
                        <ul>
                            <li class="font-semibold "><i class="fa-solid fa-user-shield mr-[5px]" style="color: #eb0017;"></i>
                                Cam kết bảo hàng chính hãng 1 năm</li>
                            <li class="font-semibold "><i class="fa-brands fa-instalod mr-[8px]" style="color: #eb0017;;"></i>
                                Hoàn trả hàng trong 7 ngày
                            </li>
                            <li class="font-semibold "><i class="fa-solid fa-sack-dollar mr-[18px]" style="color: #eb0017;;"></i>Kiểm tra hàng rồi mới thanh toán</li>
                        </ul>
                    </div>

                    <!--LUA CHON COLOR -->
                    <div class="chitietsanpham-color my-4 text-2xl">
                        <span class="font-semibold text-gray-700 text-xl mr-2">Color :</span>
                        <?php
                        if (isset($selectedColors)) {
                            foreach ($selectedColors as $color) {
                                switch ($color) {
                                    case 'Đỏ':
                                        echo '<input type="radio" id="color-red" name="color" value="Đỏ" />
                                        <label class="color-label" for="color-red">Đỏ</label>';
                                        break;
                                    case 'Vàng':
                                        echo '<input type="radio" id="color-yellow" name="color" value="Vàng" />
                                            <label class="color-label" for="color-yellow">Vàng</label>';
                                        break;
                                    case 'Xanh lá':
                                        echo '<input type="radio" id="color-green" name="color" value="Xanh lá" />
                                            <label class="color-label" for="color-green">Xanh lá</label>';
                                        break;
                                    case 'Xanh dương':
                                        echo '<input type="radio" id="color-blue" name="color" value="Xanh dương" />
                                            <label class="color-label" for="color-blue">Xanh dương</label>';
                                        break;
                                    case 'Đen':
                                        echo '<input type="radio" id="color-black" name="color" value="Đen" />
                                            <label class="color-label" for="color-black">Đen</label>';
                                        break;
                                    case 'Trắng':
                                        echo '<input type="radio" id="color-white" name="color" value="Trắng" />
                                            <label class="color-label" for="color-white">Trắng</label>';
                                        break;
                                    case 'Tím':
                                        echo '<input type="radio" id="color-purple" name="color" value="Tím" />
                                            <label class="color-label" for="color-purple">Tím</label>';
                                        break;
                                    case 'Cam':
                                        echo '<input type="radio" id="color-orange" name="color" value="Cam" />
                                            <label class="color-label" for="color-orange">Cam</label>';
                                        break;
                                    case 'Hồng':
                                        echo '<input type="radio" id="color-pink" name="color" value="Hồng" />
                                            <label class="color-label" for="color-pink">Hồng</label>';
                                        break;
                                    case 'Nâu':
                                        echo '<input type="radio" id="color-brown" name="color" value="Nâu" />
                                            <label class="color-label" for="color-brown">Nâu</label>';
                                        break;
                                    case 'Xám':
                                        echo '<input type="radio" id="color-gray" name="color" value="Xám" />
                                            <label class="color-label" for="color-gray">Xám</label>';
                                        break;
                                }
                            }
                        }
                        ?>
                    </div>
                    <!-- LUA CHON SIZE -->
                    <div class="chitietsanpham-color"> <span class="font-semibold text-gray-700 text-xl mr-5">Size:</span> <span class="bg-white font-bold">

                            <?php
                            if ($iddanhmuc == 1 || $iddanhmuc == 2 || $iddanhmuc == 3) {
                            ?>
                                <?php
                                if (isset($selectedSizes)) {
                                    foreach ($selectedSizes as $size) {
                                        echo '
                                        <input type="radio" id="size-' . $size . '" name="size" value="' . $size . '" />
                                        <label class="size-label shirt-size" for="size-' . $size . '">' . $size . '</label>
                                        ';
                                    }
                                }
                                ?>
                            <?php
                            } else {
                            ?>
                                <?php
                                if (isset($selectedSizes)) {
                                    foreach ($selectedSizes as $size) {
                                        switch ($size) {
                                            case 'Nhỏ':
                                                echo '<input type="radio" id="size-nho" name="size" value="Nhỏ" />
                                                <label class="size-label other-size" for="size-nho">Nhỏ</label>';
                                                break;
                                            case 'Vừa':
                                                echo '<input type="radio" id="size-vua" name="size" value="Vừa" />
                                                <label class="size-label other-size" for="size-vua">Vừa</label>';
                                                break;
                                            case 'Lớn':
                                                echo '<input type="radio" id="size-lon" name="size" value="Lớn" />
                                                <label class="size-label other-size" for="size-lon">Lớn</label>';
                                                break;
                                        }
                                    }
                                }
                                ?>
                            <?php
                            }
                            ?>
                        </span></div>
                    <br>
                    <hr>
                    <!--THEM SO LUONG -->
                    <div class="my-5 flex items-center gap-3">
                        <div class="flex items-center gap-1">
                            <span class="decrease-btn-detail bg-gray-200 rounded-[50%] w-8 h-8 flex items-center justify-center font-black text-l"><i class="fa-solid fa-caret-down text-xl" style="color: #f8303a;"></i></span>
                            <input type="number" class="border-solid text-center border-[1px] border-gray-300 rounded-sm w-[80px] pl-[16px] py-2 h-10" id="number-display" name="soluongmua" value="1" max="<?php if (isset($soluong)) echo $soluong ?>">
                            <span class="increase-btn-detail bg-gray-200 rounded-[50%] w-8 h-8 flex items-center justify-center font-black text-l"><i class="fa-solid fa-caret-up text-xl" style="color: #f8303a;"></i></span>
                        </div>

                        <input type="hidden" name="idsanpham" value="<?= $sanpham["id"] ?>">
                        <input type="hidden" name="tensanpham" value="<?= $tensanpham ?>">
                        <input type="hidden" name="giagoc" value="<?= $giagoc ?>">
                        <input type="hidden" name="giasale" value="<?= $giasale ?>">
                        <input type="hidden" name="anhsanpham" value="<?= $anhsanpham ?>">
                        <input type="hidden" name="mota" value="<?= $mota ?>">
                        <input type="hidden" name="luotxem" value="<?= $luotxem ?>">
                        <input type="hidden" name="iddanhmuc" value="<?= $iddanhmuc ?>">
                        <input type="hidden" name="soluongkho" value="<?= $soluong ?>">
                        <!-- Add to cart       -->
                        <input <?php if ($soluong === 0) echo 'disabled'; ?> class=" duration-[0.2s] text-xl bg-[#ff324d] px-2 py-5 ml-2 rounded-md text-white hover:bg-white hover:text-[#ff324d] border-solid border-[#ff324d] border-[2px]" type="submit" name="themvaogiohang" value="Thêm vào giỏ hàng">
                        <input class=" duration-[0.2s] text-xl bg-[#fff] px-12 py-5 ml-2 rounded-md text-[#ff324d] hover:bg-[#ff324d] hover:text-[#fff] border-solid border-[#ff324d] border-[2px]" type="submit" name="muangay" value="Mua ngay">
                    </div>

                </form>

            </div>

            <hr>
            <ul class="my-4 text-2xl mt-3">
                <li>Số lượng: <?php if (isset($soluong)) echo $soluong ?></li>
                <li class="">Mã sản phẩm: NHOM2-<?php if (isset($sanpham["id"])) echo $sanpham["id"] ?></li>
                <li>Danh mục: <?php if (isset($tendanhmuc)) echo $tendanhmuc ?></li>
            </ul>
        </div>
    </div>
    <!-- binh luan  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#binhluan").load("view/binhluan/formbinhluan.php", {
                idsanpham: <?php echo $sanpham["id"] ?>,
            });
        });
    </script>
    <div class="my-6" id="binhluan">

    </div>

    <!-- San pham cung danh muc -->
    <h1 class="font-semibold text-3xl mt-12">5 sản phẩm liên quan</h1>
    <div class="grid grid-cols-5 gap-4 my-4 mb-[100px]">
        <?php
        if (isset($danhsachcungloai)) {
            foreach ($danhsachcungloai as $sanpham) {
                $link = "index.php?act=chitietsanpham&id=" . $sanpham["id"];
                extract($sanpham);
        ?>
                <div class="product">
                    <a href="<?php echo $link ?>"><img src="./upload/<?php echo $anhsanpham ?>" alt="" /></a>
                    <a href="<?php echo $link ?>">
                        <h4><?php echo $tensanpham ?></h4>
                    </a>
                    <div class="price">
                        <p class="init-price"><?php echo number_format($giasale, 0, ",", ".") ?>đ</p>
                        <p class="sale"><del><?php echo number_format($giagoc, 0, ",", ".") ?>đ</del></p>
                    </div>
                    <a href="<?= $link ?>" class="xemchitiet">Xem chi tiết</a>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>
<script>
    const decreaseBtnDetail = document.querySelector(".decrease-btn-detail");
    const increaseBtnDetal = document.querySelector(".increase-btn-detail");
    const numberDisplay = document.querySelector("#number-display");

    let numberValue = numberDisplay.value;

    decreaseBtnDetail.addEventListener("click", () => {
        if (numberDisplay.value > 1) {
            numberValue--;
            numberDisplay.value = numberValue;
        }
    })

    increaseBtnDetal.addEventListener("click", () => {
        numberValue++;
        numberDisplay.value = numberValue;
    })

    const sizeRadios = document.querySelectorAll('input[name="size"]');
    const colorRadios = document.querySelectorAll('input[name="color"]');
    console.log(sizeRadios);
    console.log(colorRadios);

    function isOneChecked(radios) {
        for (let i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                return true;
            }
        }
        return false;
    }

    function onFormSubmit(event) {
        if (!isOneChecked(sizeRadios) || !isOneChecked(colorRadios)) {
            event.preventDefault();
            alert('Bạn phải chọn 1 một size và một màu sắc để có thể thêm vào giỏ hàng!');
        }
    }

    document.querySelector('.form-chitietsanpham').addEventListener('submit', onFormSubmit);
</script>