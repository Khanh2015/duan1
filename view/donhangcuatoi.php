<div class="my-[160px] p-10 mx-10 shadow-[0_0_30px_rgba(0,0,0,0.6)]">
    <h1 class="text-center">Danh sách đơn hàng</h1>
    <table class="border-collapse w-full text-center mt-5">
        <thead class="">
            <tr class="">
                <th class="border border-[#ccc] border-solid p-4 bg-gray-400">STT</th>
                <th class="border border-[#ccc] border-solid p-4 bg-gray-400">Mã đơn hàng</th>
                <th class="border border-[#ccc] border-solid p-4 bg-gray-400">Ngày đặt hàng</th>
                <th class="border border-[#ccc] border-solid p-4 bg-gray-400">Số lượng mặt hàng</th>
                <th class="border border-[#ccc] border-solid p-4 bg-gray-400">Tổng giá trị đơn hàng</th>
                <th class="border border-[#ccc] border-solid p-4 bg-gray-400">Tình trạng đơn hàng</th>
                <th class="border border-[#ccc] border-solid p-4 bg-gray-400"></th>
            </tr>
        </thead>

        <tbody class="">
            <?php
            if (isset($danhsachdonhang)) {
                $stt = 0;
                foreach ($danhsachdonhang as $donhang) {
                    $stt++;
                    extract($donhang);
            ?>
                    <tr class="">
                        <td class="border border-[#ccc] border-solid px-4 py-2"><?php echo $stt ?></td>
                        <td class="border border-[#ccc] border-solid px-4 py-2">TBTK-<?php if (isset($id)) echo $id ?></td>
                        <td class="border border-[#ccc] border-solid px-4 py-2"><?php if (isset($ngaydathang)) echo $ngaydathang ?></td>
                        <td class="border border-[#ccc] border-solid px-4 py-2"><?php if (isset($tongsoluongsanpham)) echo $tongsoluongsanpham ?></td>
                        <td class="border border-[#ccc] border-solid px-4 py-2"><?php if (isset($tongtien)) echo $tongtien ?></td>
                        <td class="border border-[#ccc] border-solid px-4 py-2">
                            <?php
                            switch ($trangthai) {
                                case '1':
                                    echo 'Chờ xác nhận';
                                    break;
                                case '2':
                                    echo 'Đã xác nhận';
                                    break;
                                case '3':
                                    echo 'Đang vận chuyển';
                                    break;
                                case '4':
                                    echo 'Đã nhận được hàng';
                                    break;
                            }
                            ?>
                        </td>
                        <td class="border border-[#ccc] border-solid px-4 py-2">
                            <a href="index.php?act=chitietdonhang&id=<?php if (isset($id)) echo $id ?>" class="block bg-blue-400 p-2 py-3 rounded duration-200 hover:opacity-80 text-white font-semibold text-base">Xem chi tiết</a>
                            <a href="" class="block bg-orange-500 p-2 py-3 rounded duration-200 hover:opacity-80 text-white font-semibold text-base mt-3">Huỷ đơn hàng</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>

        </tbody>
    </table>
</div>