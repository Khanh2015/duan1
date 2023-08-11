<div class="my-[160px] p-10 mx-10 shadow-[0_0_30px_rgba(0,0,0,0.6)]">
    <h1 class="text-center">Danh sách đơn hàng</h1>
    <table class="border-collapse w-full text-center mt-5">
        <thead class="">
            <tr class="">
                <th class="border border-[#ccc] border-solid p-4 bg-gray-400">STT</th>
                <th class="border border-[#ccc] border-solid p-4 bg-gray-400">Mã đơn hàng</th>
                <th class="border border-[#ccc] border-solid p-4 bg-gray-400">Tên người đặt</th>
                <th class="border border-[#ccc] border-solid p-4 bg-gray-400">Địa chỉ</th>
                <th class="border border-[#ccc] border-solid p-4 bg-gray-400">SĐT</th>
                <th class="border border-[#ccc] border-solid p-4 bg-gray-400">Email</th>
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
                        <td class="border border-[#ccc] border-solid p-4"><?php echo $stt ?></td>
                        <td class="border border-[#ccc] border-solid p-4">TBTK-<?php if (isset($id)) echo $id ?></td>
                        <td class="border border-[#ccc] border-solid p-4"><?php if (isset($tentaikhoan)) echo $tentaikhoan ?></td>
                        <td class="border border-[#ccc] border-solid p-4"><?php if (isset($diachi)) echo $diachi ?></td>
                        <td class="border border-[#ccc] border-solid p-4"><?php if (isset($sdt)) echo $sdt ?></td>
                        <td class="border border-[#ccc] border-solid p-4"><?php if (isset($email)) echo $email ?></td>
                        <td class="border border-[#ccc] border-solid p-4"><?php if (isset($ngaydathang)) echo $ngaydathang ?></td>
                        <td class="border border-[#ccc] border-solid p-4"><?php if (isset($tongsoluongsanpham)) echo $tongsoluongsanpham ?></td>
                        <td class="border border-[#ccc] border-solid p-4"><?php if (isset($tongtien)) echo number_format($tongtien, 0, ",", ".") ?>đ</td>
                        <td class="border border-[#ccc] border-solid p-4">
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
                        <td class="border border-[#ccc] border-solid p-4">
                            <a href="index.php?act=chitietdonhang&id=<?php if (isset($id)) echo $id ?>" class="bg-blue-400 w-[72px] inline-block py-3 rounded duration-200 hover:opacity-80 text-white">Chi tiết</a>
                            <?php
                            if ($trangthai == 1) {
                                echo '<a href="index.php?act=huydonhang&id=' . $id . '" class="huydonhang bg-orange-500 w-[72px] inline-block py-3 rounded duration-200 hover:opacity-80 text-white mt-3">Huỷ đơn</a>';
                            }
                            ?>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>

        </tbody>
    </table>
</div>