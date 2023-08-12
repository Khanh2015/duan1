    <div class="view-cart">
        <div class="view-cart-left">
            <div class="order-progress">
                <div class="progress-dot">
                    <span class="dot dot-line-active"></span>
                    <span class="dot-name">Giỏ hàng</span>
                </div>
                <div class="progress-line"></div>
                <div class="progress-dot">
                    <span class="dot"></span>
                    <span class="dot-name">Đặt hàng</span>
                </div>
                <div class="progress-line"></div>
                <div class="progress-dot">
                    <span class="dot"></span>
                    <span class="dot-name">Thanh toán</span>
                </div>
                <div class="progress-line"></div>
                <div class="progress-dot">
                    <span class="dot"></span>
                    <span class="dot-name">Hoàn thành đơn</span>
                </div>
            </div>
            <div class="cart-content block">
                <h2 class="cart-content-title">Giỏ hàng của bạn</h2>
                <table class="cart-detail">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ẢNH</th>
                            <th>THÔNG TIN</th>
                            <th>GIẢM GIÁ</th>
                            <th>SỐ LƯỢNG</th>
                            <th>THÀNH TIỀN</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tonggiohang = 0;
                        $soluongtronggiohang = 0;
                        $tongtiengoc = 0;
                        $tongsosanpham = 0;
                        foreach ($_SESSION["mycart"] as $item) {
                            $tonggiohang += $item[10];
                            $tongtiengoc += $item[12];
                            $tongsosanpham += $item[8];
                        ?>
                            <tr>
                                <td><?= $soluongtronggiohang + 1 ?></td>
                                <td><img src="./upload/<?= $item[4] ?>" alt=""></td>
                                <td class="product-info">
                                    <p class="product-name"><?= $item[1] ?></p>
                                    <span class="color-product">Màu: <?= $item[7] ?></span><br>
                                    <span class="size-product">Size: <?= $item[6] ?></span>
                                </td>
                                <td id="discount-price_<?= $item[0] ?>">-<?= number_format($item[11], 0, ",", ".") ?>đ</td>
                                <td>

                                    <div class="flex items-center gap-1">
                                        <span id="decrease-btn-detail" onclick="changeQuantity('decrease','<?= $item[0] ?>', '<?= $item[6] ?>', '<?= $item[7] ?>')" class="bg-gray-200 rounded-[50%] w-8 h-8 flex items-center justify-center font-black text-l"><i class="fa-solid fa-caret-down text-xl cursor-pointer" style="color: #f8303a;"></i></span>
                                        <input id="product-quantity_<?= $item[0] ?>" name="soluongmua" type="number" class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none outline-none border-solid text-center border-[1px] border-gray-300 rounded-sm w-[80px] py-2 h-10" value="<?= $item[8] ?>" max="<?= $item[9] ?>" min="1" max="<?= $item[9] ?>" required>
                                        <span id="increase-btn-detail" onclick="changeQuantity('increase','<?= $item[0] ?>', '<?= $item[6] ?>', '<?= $item[7] ?>')" class="bg-gray-200 rounded-[50%] w-8 h-8 flex items-center justify-center font-black text-l"><i class="fa-solid fa-caret-up text-xl cursor-pointer" style="color: #f8303a;"></i></span>
                                    </div>
                                </td>
                                <td id="total-price_<?= $item[0] ?>" class="total-price"><?php echo number_format($item[10], 0, ",", ".") ?>đ</td>
                                <td><a class="delete-btn" href="index.php?act=xoagiohang&id=<?= $soluongtronggiohang ?>"><i class="fa-regular fa-trash-can trash-icon"></i></a></td>
                            </tr>
                        <?php
                            $soluongtronggiohang++;
                        }
                        ?>
                        <tr class="font-bold text-2xl">
                            <td colspan="6">Tổng giá trị giỏ hàng</td>
                            <td id="total-cart-price" class="text-red-500"><?= number_format($tonggiohang, 0, ",", ".") ?>đ</td>
                        </tr>
                        <?php
                        $_SESSION["soluongtronggiohang"] = $soluongtronggiohang;
                        ?>
                    </tbody>
                </table>

                <div class="mt-10">
                    <a href="index.php?act=danhsachsanpham" class="bg-green-500 text-white font-semibold text-lg px-5 py-4 rounded-md duration-200 hover:opacity-80 ">Tiếp tục mua hàng</a>
                    <a href="index.php?act=xoagiohang" class="delete-btn ml-5 bg-red-500 text-white font-semibold text-lg px-5 py-4 rounded-md duration-200 hover:opacity-80 ">Xoá tất cả</a>
                </div>
            </div>
        </div>
        <div class="view-cart-right">
            <div class="cart-total">
                <h2 class="cart-total-title">Tổng tiền giỏ hàng</h2>
                <div class="cart-total-info">
                    <div class="info-wapper">
                        <span class="info-name">Tổng sản phẩm</span> <span id="total-cart-quantity" class="info-number"><?= $tongsosanpham ?></span>
                    </div>
                    <div class="info-wapper">
                        <span class="info-name">Tổng tiền gốc</span> <span id="total-cart-cost" class="info-number"><?= number_format($tongtiengoc, 0, ",", ".") ?>đ</span>
                    </div>
                    <div class="info-wapper">
                        <span class="info-name">Thành tiền sau chiết khấu</span>
                        <span id="total-cart-price-ship" class="info-number">
                            <!-- <?php
                                    if ($tonggiohang < 500000) {
                                        echo number_format($tonggiohang + 50000, 0, ",", ".");
                                    } else {
                                        echo number_format($tonggiohang, 0, ",", ".");
                                    }
                                    ?>đ -->
                            <?= number_format($tonggiohang, 0, ",", "."); ?>đ
                        </span>
                    </div>
                    <div id="transport-fee" class="info-wapper">
                        <?php
                        if ($tonggiohang >= 500000) {
                            echo '<span class="info-name">Phí vận chuyển</span> <span class="info-number">0 VNĐ</span>';
                        } else {
                            echo '<span class="info-name">Phí vận chuyển</span> <span class="info-number">50.000 VNĐ</span>';
                        }
                        ?>
                    </div>
                    <div id="shipping-fee-notice">
                        <?php
                        if ($tonggiohang >= 500000) {
                            echo '<p class="free-ship"><i class="fa-solid fa-circle-check"></i> Đơn hàng của bạn được miễn phí ship</p>';
                        } else {
                            echo '<p class="no-ship"><i class="fa-solid fa-triangle-exclamation"></i> Miễn phí ship với đơn hàng trên 500.000 VNĐ</p>';
                        }
                        ?>
                    </div>
                    <?php
                    if (isset($_SESSION["mycart"]) && $_SESSION["mycart"] != []) {
                        echo '<a href="index.php?act=xacnhandonhang" class="submit-btn">Đặt hàng</a>';
                    } else {
                        echo '<a href="#" class="submit-btn">Đặt hàng</a>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <script>
        function changeQuantity(action, itemId, size, color) {
            // console.log(action, itemId, size, color);
            const xhr = new XMLHttpRequest();
            xhr.open(
                "GET",
                `/duan1/view/update_quantity.php?action=${action}&id=${itemId}&size=${size}&color=${color}`,
                true
            );
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    console.log(xhr.responseText);
                    const totalPriceItem = document.getElementById(`total-price_${
                    itemId
                }`);
                    const quantityInput = document.getElementById(`product-quantity_${
                    itemId
                }`);
                    const totalDiscount = document.getElementById(`discount-price_${
                    itemId
                }`);
                    const totalItem = document.getElementById('total-cart-quantity');
                    const total = document.getElementById("total-cart-price");
                    const totalCartPriceShip = document.getElementById("total-cart-price-ship");
                    const totalCost = document.getElementById("total-cart-cost");
                    const shippingFeeNotice = document.getElementById("shipping-fee-notice");
                    const transportFee = document.getElementById("transport-fee");

                    totalPriceItem.innerText = `${formatNumber(response.totalPriceItem)}đ`;
                    quantityInput.value = `${response.quantity}`;
                    totalItem.innerText = `${response.totalItem}`;
                    total.innerText = `${formatNumber(response.total)}đ`;
                    totalCost.innerText = `${formatNumber(response.totalCost)}đ`;
                    totalDiscount.innerText = `-${formatNumber(response.totalDiscount)}đ`;
                    // totalCartPriceShip.innerText = `${formatNumber(response.total < 500000 ? response.total + 50000 : response.total)}đ`;
                    totalCartPriceShip.innerText = `${formatNumber(response.total)}đ`;

                    if (response.total < 500000) {
                        transportFee.innerHTML = `<span class="info-name">Phí vận chuyển</span> <span class="info-number">50.000 VNĐ</span>`;
                        shippingFeeNotice.innerHTML = `<p class="no-ship"><i class="fa-solid fa-triangle-exclamation"></i> Miễn phí ship với đơn hàng trên 500.000 VNĐ</p>`;
                    } else {
                        transportFee.innerHTML = `<span class="info-name">Phí vận chuyển</span> <span class="info-number">0 VNĐ</span>`;
                        shippingFeeNotice.innerHTML = `<p class="free-ship"><i class="fa-solid fa-circle-check"></i> Đơn hàng của bạn được miễn phí ship</p>`;
                    }
                }
            };
            xhr.send();
        }

        function formatNumber(number) {
            let formattedNumber = Math.round(number).toString();
            let integerParts = [];
            while (formattedNumber.length > 3) {
                integerParts.unshift(formattedNumber.slice(-3));
                formattedNumber = formattedNumber.slice(0, -3);
            }
            integerParts.unshift(formattedNumber);
            let formattedAmount = integerParts.join('.');

            return formattedAmount;
        }
    </script>