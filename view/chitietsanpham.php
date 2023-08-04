<?php
if (isset($sanpham)) {
    extract($sanpham);
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
                <form action="" method="post">
                    <!-- ten san pham -->
                    <h2 class="bg-white font-semibold text-3xl"> <?php if (isset($tensanpham)) echo $sanpham['tensanpham'] ?></h2>
                    <!-- gia san pham -->
                    <span class="flex my-6">

                        <p class="text-[#FF324D] font-semibold text-2xl max-w-[110px] bg-white "><?php if (isset($giasale)) echo $sanpham['giasale'] ?>đ</p>
                        <del class="text-gray-500 font-mono mx-2"><?php if (isset($giagoc)) echo $sanpham['giagoc'] ?>đ</del>
                        <!-- tính % giảm giá
                        <input class="text-[#388E3C] font-mono  max-w-[80px] bg-white" type="text" disabled name="" id="" value="35% Off"> -->
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
                                Cam kết bảo hàn chính hãng 1 năm</li>
                            <li class="font-semibold "><i class="fa-brands fa-instalod mr-[8px]" style="color: #eb0017;;"></i>
                                Hoàn trả hàng trong 7 ngày
                            </li>
                            <li class="font-semibold "><i class="fa-solid fa-sack-dollar mr-[18px]" style="color: #eb0017;;"></i>Kiểm tra hàng rồi mới thanh toán</li>
                        </ul>
                    </div>

                    <!--LUA CHON COLOR -->
                    <div class="my-4 text-2xl">
                        <span class="font-semibold text-gray-700 text-xl mr-2">Color :</span>
                        <?php
                        $color = $sanpham['color'];
                        switch ($color) {
                            case 'Đỏ':
                        ?>
                                <!-- input lấy thông tin sp màu đỏ để gửi dữ liệu để đặt hàng them id hoạc name sau -->
                                <input type="text" hidden value="Đỏ">
                                <!-- input lấy thông tin sp màu đỏ để gửi dữ liệu để đặt hàng -->
                                <span><i class="fa-solid fa-droplet fa-beat" style="color: #f7021b;"></i></span>
                            <?php
                                break;
                            case 'Đen':
                            ?>
                                <input type="text" hidden value="Đen">
                                <span><i class="fa-solid fa-droplet fa-beat" style="color: #000000;"></i></span>
                            <?php
                                break;
                            case 'Xám':
                            ?>
                                <input type="text" hidden value="Xám">
                                <span><i class="fa-solid fa-droplet fa-beat" style="color: gray;"></i></span>
                            <?php
                                break;
                            case 'Nâu':
                            ?>
                                <input type="text" hidden value="Nâu">
                                <span><i class="fa-solid fa-droplet fa-beat" style="color: brown;"></i></span>
                            <?php
                                break;
                            case 'Xanh dương':
                            ?>
                                <input type="text" hidden value="Xanh Dương">
                                <span><i class="fa-solid fa-droplet fa-beat" style="color: #12aff3;"></i></span>
                            <?php
                                break;
                            case 'Xanh lá':
                            ?>
                                <input type="text" hidden value="Xanh lá">
                                <span><i class="fa-solid fa-droplet fa-beat" style="color: green;"></i></span>
                            <?php
                                break;
                            case 'Vàng':
                            ?>
                                <input type="text" hidden value="Vàng">
                                <span><i class="fa-solid fa-droplet fa-beat" style="color: #fafe06;"></i></span>
                            <?php
                                break;
                            case 'Trắng':
                            ?>
                                <input type="text" hidden value="Trắng">
                                <span><i class="fa-solid fa-droplet fa-beat" style="color: #dcdfe4;"></i></span>
                            <?php
                                break;
                            case 'Tím':
                            ?>
                                <input type="text" hidden value="Tím">
                                <span><i class="fa-solid fa-droplet fa-beat" style="color: #e30fff;"></i></span>
                            <?php
                                break;
                            case 'Cam':
                            ?>
                                <input type="text" hidden value="Cam">
                                <span><i class="fa-solid fa-droplet fa-beat" style="color: #ff9b0f;"></i></span>
                            <?php
                                break;
                            case 'Hồng':
                            ?>
                                <input type="text" hidden value="Hồng">
                                <span><i class="fa-solid fa-droplet fa-beat" style="color: #f613ba;"></i></span>
                                <?php
                                break;
                                ?>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- LUA CHON SIZE -->
                    <div class="text-2xl"> <span class="font-semibold text-gray-700 text-xl mr-5">Size:</span> <span class="bg-white font-bold"><?php echo $sanpham['size'] ?></span></div>
                    <br>
                    <hr>
                    <!--THEM SO LUONG -->
                    <div class="my-5">
                        <button class="bg-gray-100 rounded-[50%] w-8 p-1 font-black text-l" onclick="decrement()"><i class="fa-solid fa-caret-down" style="color: #f8303a;"></i></button>
                        <span class="border-solid border-[1px] border-gray-300 rounded-sm px-5 p-2" id="number-display">1</span>
                        <button class="bg-gray-100 rounded-[50%] w-8 p-1 font-black text-l" onclick="increment()"><i class="fa-solid fa-caret-up" style="color: #f8303a;"></i></button>

                        <!-- Add to cart       -->
                        <input class=" duration-[0.2s] text-xl bg-[#ff324d] px-2 py-5 ml-2 rounded-md text-white hover:bg-white hover:text-[#ff324d] border-solid border-[#ff324d] border-[2px]" type="submit" name="themvaogiohang" value="Thêm vào giỏ hàng">
                        <input class=" duration-[0.2s] text-xl bg-[#fff] px-12 py-5 ml-2 rounded-md text-[#ff324d] hover:bg-[#ff324d] hover:text-[#fff] border-solid border-[#ff324d] border-[2px]" type="submit" name="muangay" value="Mua ngay">
                    </div>

                </form>

            </div>

            <hr>
            <ul class="my-4 text-2xl mt-12">
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
                    <div class="variant-wrapper">
                        <p class="size">Size: <?php echo $size ?></p>
                        <p class="color">Màu: <?php echo $color ?></p>
                    </div>
                    <div class="price">
                        <p class="init-price"><?php echo $giasale ?>đ</p>
                        <p class="sale"><del><?php echo $giagoc ?>đ</del></p>
                    </div>
                    <form action="" method="post">
                        <input type="hidden" name="" />
                        <button type="submit">Thêm vào giỏ hàng</button>
                    </form>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>
<script>
    var image = document.getElementById('product-image');

    image.addEventListener('mouseenter', function() {
        image.classList.add('scale-110');
    });

    image.addEventListener('mouseleave', function() {
        image.classList.remove('scale-110');
    });


    var number = 0; // Initial number

    function increment() {
        number += 1; // Increment the number by 1
        updateNumber();
    }

    function decrement() {
        if (number > 1) {
            number -= 1; // Decrement the number by 1, if it's greater than 0
            updateNumber();
        }
    }

    function updateNumber() {
        document.getElementById('number-display').textContent = number; // Update the number display
    }
</script>