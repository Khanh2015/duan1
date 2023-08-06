<?php
if (isset($billdonhang))
    extract($billdonhang);
?>
<div class="my-[120px] mx-[300px] p-6 shadow-[0_0_30px_rgba(0,0,0,0.6)]">
    <div class="flex flex-col justify-center items-center">
        <img class="w-[120px]" src="./view/img/done.png" alt="">
        <h1 class="text-[#25AE88] mt-4">Đặt hàng thành công</h1>
    </div>
    <div class="mt-10">
        <div class="flex justify-between items-center text-xl font-semibold mt-7">
            <p class="basis-[30%]">Mã đơn hàng</p>
            <p class="basis-[30%] text-right">TBTK-<?= $id ?></p>
        </div>

        <div class="flex justify-between items-center text-xl font-semibold mt-7">
            <p class="basis-[30%]">Tên người nhận</p>
            <p class="basis-[30%] text-right"><?= $tentaikhoan ?></p>
        </div>

        <div class="flex justify-between items-center text-xl font-semibold mt-7">
            <p class="basis-[30%]">Email người nhận</p>
            <p class="basis-[30%] text-right"><?= $email ?></p>
        </div>

        <div class="flex justify-between items-center text-xl font-semibold mt-7">
            <p class="basis-[30%]">Số điện thoại</p>
            <p class="basis-[30%] text-right"><?= $sdt ?></p>
        </div>

        <div class="flex justify-between items-center text-xl font-semibold mt-7">
            <p class="basis-[30%]">Địa chỉ</p>
            <p class="basis-[30%] text-right"><?= $diachi ?></p>
        </div>

        <div class="flex justify-between items-center text-xl font-semibold mt-7">
            <p class="basis-[30%]">Phương thức thanh toán</p>
            <p class="basis-[30%] text-right">Thanh toán khi nhận hàng</p>
        </div>

        <div class="flex justify-between items-center text-xl font-semibold mt-7">
            <p class="basis-[30%]">Ngày đặt hàng</p>
            <p class="basis-[30%] text-right"><?= $ngaydathang ?></p>
        </div>

        <div class="flex justify-between items-center text-xl font-semibold mt-7">
            <p class="basis-[30%]">Tổng số lượng sản phẩm</p>
            <p class="basis-[30%] text-right"><?= $tongsoluongsanpham ?></p>
        </div>

        <div class="flex justify-between items-center text-2xl font-semibold mt-7">
            <p class="basis-[30%]">Thành tiền</p>
            <p class="basis-[30%] text-right text-red-500"><?= number_format($tongtien, 0, ',', '.') ?>đ</p>
        </div>
    </div>
</div>