<div class="product-list-content">
    <div class="filter-container">
        <form>
            <h4>Size áo</h4>
            <input type="radio" id="size-s" name="size" value="S" />
            <label for="size-s">S</label>
            <input type="radio" id="size-m" name="size" value="M" />
            <label for="size-m">M</label>
            <input type="radio" id="size-l" name="size" value="L" />
            <label for="size-l">L</label>
            <input type="radio" id="size-xl" name="size" value="XL" />
            <label for="size-xl">XL</label>
            <input type="radio" id="size-xxl" name="size" value="XXL" />
            <label for="size-xxl">XXL</label><br /><br>

            <h4>Size giày</h4>
            <input type="radio" id="size-40" name="size" value="40" />
            <label for="size-40">40</label>
            <input type="radio" id="size-41" name="size" value="41" />
            <label for="size-41">41</label>
            <input type="radio" id="size-42" name="size" value="42" />
            <label for="size-42">42</label>
            <input type="radio" id="size-43" name="size" value="43" />
            <label for="size-43">43</label>
            <input type="radio" id="size-44" name="size" value="44" />
            <label for="size-44">44</label>
            <input type="radio" id="size-45" name="size" value="45" />
            <label for="size-45">45</label>
            <input type="radio" id="size-46" name="size" value="46" />
            <label for="size-46">46</label>
            <input type="radio" id="size-47" name="size" value="47" />
            <label for="size-47">47</label><br /><br>

            <h4>Size găng tay</h4>
            <input type="radio" id="size-5" name="size" value="5" />
            <label for="size-5">5</label>
            <input type="radio" id="size-6" name="size" value="6" />
            <label for="size-6">6</label>
            <input type="radio" id="size-7" name="size" value="7" />
            <label for="size-7">7</label>
            <input type="radio" id="size-8" name="size" value="8" />
            <label for="size-8">8</label>
            <input type="radio" id="size-9" name="size" value="9" />
            <label for="size-9">9</label>
            <input type="radio" id="size-10" name="size" value="10" />
            <label for="size-10">10</label>
            <input type="radio" id="size-11" name="size" value="11" />
            <label for="size-11">11</label>
            <input type="radio" id="size-12" name="size" value="12" />
            <label for="size-12">12</label><br /><br>

            <h4 class="mt">Màu sắc</h4>
            <input type="radio" id="color-red" name="color" value="Đỏ" />
            <label class="color-label" for="color-red">Đỏ</label>
            <input type="radio" id="color-yellow" name="color" value="Vàng" />
            <label class="color-label" for="color-yellow">Vàng</label>
            <input type="radio" id="color-green" name="color" value="Xanh lá" />
            <label class="color-label" for="color-green">Xanh lá</label>
            <input type="radio" id="color-blue" name="color" value="Xanh dương" />
            <label class="color-label" for="color-blue">Xanh dương</label>
            <input type="radio" id="color-black" name="color" value="Đen" />
            <label class="color-label" for="color-black">Đen</label>
            <input type="radio" id="color-white" name="color" value="Trắng" />
            <label class="color-label" for="color-white">Trắng</label><br />
            <input type="radio" id="color-purple" name="color" value="Tím" />
            <label class="color-label" for="color-purple">Tím</label>
            <input type="radio" id="color-orange" name="color" value="Cam" />
            <label class="color-label" for="color-orange">Cam</label>
            <input type="radio" id="color-pink" name="color" value="Hồng" />
            <label class="color-label" for="color-pink">Hồng</label>
            <input type="radio" id="color-brown" name="color" value="Nâu" />
            <label class="color-label" for="color-brown">Nâu</label>
            <input type="radio" id="color-gray" name="color" value="Xám" />
            <label class="color-label" for="color-gray">Xám</label>

            <h4 class="mt">Giá</h4>
            <input type="range" id="price" name="price" min="0" max="1000000" step="10000" oninput="priceOutput.value = price.value">
            <div class="min-max-price">
                <span class="min-value">0 VNĐ</span>
                <span class="max-value">
                    <output name="priceOutput" id="priceOutput">1.000.000</output> VNĐ<br /><br />
                </span>
            </div>

            <input class="filter-btn mt" type="submit" value="LỌC" />
        </form>
    </div>
    <div class="product-list-wapper">
        <h1 class="product-list-title">DANH SÁCH <?php echo isset($title) ? $title : "TẤT CẢ SẢN PHẨM"; ?></h1>
        <div class="pagination-container">
            <div class="products list-product-wrapper">
                <?php
                if (isset($danhsachsanpham)) {
                    foreach ($danhsachsanpham as $sanpham) {
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
            <?php
            require_once "./view/pagination.php"

            ?>
        </div>
    </div>
</div>
</div>