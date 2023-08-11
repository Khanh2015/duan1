<?php
session_start();
include "./model/pdo.php";
include "./model/sanpham.php";
include "./model/danhmuc.php";
include "./model/taikhoan.php";
include "./model/giohang.php";
// $_SESSION["mycart"] = [];
if (!isset($_SESSION["mycart"])) {
    $_SESSION["mycart"] = [];
}
$keyword = null;
$top10 = top10_sanpham();
$danhsachsanpham = loadall_sanpham_home();
$danhsachdanhmuc = loadall_danhmuc();
include "./view/header.php";
if (isset($_GET["act"])) {
    // extract($_REQUEST);
    $act = $_GET["act"];
    switch ($act) {
        case 'gioithieu':
            include "./view/gioithieu.php";
            break;
        case 'lienhe':
            include "./view/lienhe.php";
            break;
        case 'home':
            include "./view/home.php";
            break;
        case 'danhsachsanpham':

            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            $sopluongbanghimoitrang = 12;
            $tongsoluongbanghi = count_loadall_danhsachsanpham();
            $totalPage = ceil($tongsoluongbanghi / $sopluongbanghimoitrang);
            $start_limit = ($page - 1) * $sopluongbanghimoitrang;
            $end_limit = $sopluongbanghimoitrang;
            $danhsachsanpham = loadall_danhsachsanpham($start_limit, $end_limit);

            $iddanhmuc = null;
            $act = 'danhsachsanpham';
            include "./view/danhsachsanpham.php";
            break;
        case 'timkiemsanpham':
            if (isset($_POST["timkiem"])) {
                $keyword = $_POST["keyword"];
            } else if ($_GET["keyword"]) {
                $keyword = $_GET["keyword"];
            }
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            $sopluongbanghimoitrang = 8;
            $tongsoluongbanghi = count_loadall_danhsachtimkiem($keyword);
            $totalPage = ceil($tongsoluongbanghi / $sopluongbanghimoitrang);
            $start_limit = ($page - 1) * $sopluongbanghimoitrang;
            $end_limit = $sopluongbanghimoitrang;
            $danhsachsanpham = timkiemsanpham($keyword, $start_limit, $end_limit);
            $title = "TÌM KIẾM";

            $iddanhmuc = null;
            $act = 'timkiemsanpham';
            include "./view/danhsachsanpham.php";
            break;
        case 'locdanhmuc':
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            $sopluongbanghimoitrang = 8;
            $tongsoluongbanghi = count_loadall_sanpham_danhmuc($_GET["iddanhmuc"]);
            $totalPage = ceil($tongsoluongbanghi / $sopluongbanghimoitrang);
            $start_limit = ($page - 1) * $sopluongbanghimoitrang;
            $end_limit = $sopluongbanghimoitrang;

            switch ($_GET["iddanhmuc"]) {
                case 1:
                    $title = 'ÁO ĐÁ BÓNG';
                    break;
                case 2:
                    $title = 'GIÀY ĐÁ BÓNG';
                    break;
                case 3:
                    $title = 'GĂNG TAY BẮT BÓNG';
                    break;
            }
            $danhsachsanpham = loadall_sanpham_danhmuc($_GET["iddanhmuc"], $start_limit, $end_limit);
            $iddanhmuc = $_GET["iddanhmuc"];
            $act = 'locdanhmuc';
            include "./view/danhsachsanpham.php";
            break;
        case 'dangky':
            if (isset($_POST["dangky"])) {
                $check = true;
                $email = $_POST["email"];
                $matkhau = $_POST["matkhau"];
                $matkhau2 = $_POST["matkhau2"];
                $tentaikhoan = $_POST["tentaikhoan"];
                $checktaikhoan = check_tentaikhoan($tentaikhoan);
                $checkemail = check_email($email);
                if (!empty($checkemail)) {
                    $check = false;
                    $thongbaoemail = "Email đã được đăng ký bởi 1 tài khoản khác ❌";
                }
                if (!empty($checktaikhoan)) {
                    $check = false;
                    $thongbaotentaikhoan = "Tên tài khoản đã tồn tại ❌";
                }
                if ($matkhau != $matkhau2) {
                    $check = false;
                    $thongbaomatkhau = "Mật khẩu khẩu không khớp ❌";
                }
                if ($check) {
                    insert_taikhoan($tentaikhoan, $matkhau, $email);
                    $thongbaothanhcong = "Bạn đã đăng ký tài khoản thành công 🎉";
                    $tentaikhoan = '';
                    $email = '';
                }
            }
            include "./view/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            if (isset($_POST["dangnhap"])) {
                $tentaikhoan = $_POST["tentaikhoan"];
                $matkhau = $_POST["matkhau"];
                $checktaikhoan = check_dangnhap($tentaikhoan, $matkhau);
                if (is_array($checktaikhoan)) {
                    $_SESSION['taikhoan'] = $checktaikhoan;
                    echo '<script>window.location.href = "index.php";</script>';
                } else {
                    $thongbaoloi = "Tài khoản không tồn tại ❌, vui lòng kiểm tra lại hoặc đăng ký tài khoản mới";
                }
            }
            include "./view/taikhoan/dangnhap.php";
            break;
        case 'edit_taikhoan':
            if (isset($_POST["capnhat"])) {
                $check = true;
                $email = $_POST["email"];
                $diachi = $_POST["diachi"];
                $sdt = $_POST["sdt"];
                $matkhau = $_POST["matkhau"];
                $matkhau2 = $_POST["matkhau2"];
                $tentaikhoan = $_POST["tentaikhoan"];
                $currentUserId = $_SESSION['taikhoan']['id'];
                $checktaikhoan = check_trung_tentaikhoan($tentaikhoan, $currentUserId);
                if (!empty($checktaikhoan)) {
                    $check = false;
                    $thongbaotentaikhoan = "Tên tài khoản đã tồn tại ❌, mời chọn tên tài khoản mới hoặc sử dụng lại tên cũ";
                }
                if ($matkhau != $matkhau2) {
                    $check = false;
                    $thongbaomatkhau = "Mật khẩu khẩu không khớp ❌";
                }
                if ($check) {
                    update_taikhoan($currentUserId, $tentaikhoan, $matkhau, $email, $diachi, $sdt);
                    $thongbaothanhcong = "Bạn đã cập nhật tài khoản thành công 🎉";
                    $_SESSION['taikhoan'] = check_dangnhap($tentaikhoan, $matkhau);
                }
            }
            include "./view/taikhoan/capnhat.php";
            break;
        case 'quenmatkhau':
            if (isset($_POST["quenmatkhau"])) {
                $email = $_POST["email"];
                $taikhoan = quenmatkhau($email);
            }
            include "./view/taikhoan/quenmatkhau.php";
            break;
        case 'dangxuat':
            session_unset();
            echo '<script>window.location.href = "index.php";</script>';
            exit;
            break;
        case 'chitietsanpham':
            if (isset($_GET['id'])) {
                $id = $_GET["id"];
                $sanpham = loadone_sanpham_tendanhmuc($id);
                $danhsachcungloai = loadall_sanphamcungdanhmuc($sanpham["iddanhmuc"], $id);
            }
            include "./view/chitietsanpham.php";
            break;
        case 'themvaogiohang':
            if (isset($_POST["themvaogiohang"])) {
                $id = $_POST["idsanpham"];
                $tensanpham = $_POST["tensanpham"];
                $giagoc = $_POST["giagoc"];
                $giasale = $_POST["giasale"];
                $anhsanpham = $_POST["anhsanpham"];
                $mota = $_POST["mota"];
                $size = $_POST["size"];
                $color = $_POST["color"];
                $soluongmua = $_POST["soluongmua"];
                $soluongkho = $_POST["soluongkho"];
                $thanhtien = $soluongmua * $giasale;
                $tongtiengiam = $soluongmua * $giagoc - $soluongmua * $giasale;
                $tongtiengoc = $soluongmua * $giagoc;

                $found = false;
                foreach ($_SESSION["mycart"] as &$item) {
                    if ($item[0] == $id && $item[6] == $size && $item[7] == $color) {
                        $item[8] += $soluongmua;
                        $item[10] = $item[8] * $giasale;
                        $item[11] = ($item[8] * $giagoc) - ($item[8] * $giasale);
                        $item[12] = ($item[8] * $giagoc);
                        $found = true;
                        break;
                    }
                }
                unset($item);
                if (!$found) {
                    $sanphamdathem = [
                        $id, $tensanpham, $giagoc, $giasale, $anhsanpham, $mota, $size, $color,
                        $soluongmua, $soluongkho, $thanhtien, $tongtiengiam, $tongtiengoc
                    ];
                    array_push($_SESSION["mycart"], $sanphamdathem);
                    $_SESSION["soluongtronggiohang"] = count($_SESSION["mycart"]);
                    echo '<div class="fixed z-10 inset-0 flex items-center justify-center bg-black bg-opacity-50">
                            <div class="bg-[#D5DAF0] translate-y-[40px] p-20 rounded shadow flex flex-col justify-center items-center gap-5">
                                <p class="text-2xl font-semibold">Thêm vào giỏ hàng thành công!</p>
                                <img class="w-[150px] mt-10" src="./view/img/done.png" />
                            </div>
                          </div>';
                    include "./view/giohang.php";
                    echo '<script>
                            setTimeout(function() {
                                window.location.href = "index.php?act=xemgiohang";
                            }, 1000);
                          </script>';
                } else {
                    echo '<div class="fixed z-10 inset-0 flex items-center justify-center bg-black bg-opacity-50">
                            <div class="bg-[#D5DAF0] translate-y-[40px] p-20 rounded shadow flex flex-col justify-center items-center gap-5">
                                <p class="text-2xl font-semibold">Thêm vào giỏ hàng thành công!</p>
                                <img class="w-[150px] mt-10" src="./view/img/done.png" />
                            </div>
                          </div>';
                    include "./view/giohang.php";
                    echo '<script>
                            setTimeout(function() {
                                window.location.href = "index.php?act=xemgiohang";
                            }, 1000);
                          </script>';
                }
            } else {
                echo '<script>window.location.href = "index.php?act=xemgiohang";</script>';
            }
            break;
        case 'xoagiohang':
            if (isset($_GET["id"])) {
                array_splice($_SESSION["mycart"], $_GET["id"], 1);
            } else {
                $_SESSION["mycart"] = [];
            }
            include "./view/giohang.php";
            echo '<script>window.location.href = "index.php?act=xemgiohang";</script>';
            break;
        case 'xemgiohang':
            include "./view/giohang.php";
            break;
        case 'xacnhandonhang':
            include "./view/xacnhandonhang.php";
            break;
        case 'dathangthanhcong':
            if (isset($_POST["dongydathang"])) {
                if (isset($_SESSION["taikhoan"])) {
                    $idtaikhoan = $_SESSION["taikhoan"]["id"];
                } else {
                    $idtaikhoan = 0;
                }
                $tentaikhoan = $_POST["tentaikhoan"];
                $email = $_POST["email"];
                $sdt = $_POST["sdt"];
                $diachi = $_POST["diachi"];
                $pttt = 1;
                $tongthanhtien = 0;
                $tongsoluongsanpham = 0;
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $ngaydathang = date('h:i:sa d/m/Y');
                foreach ($_SESSION["mycart"] as $item) {
                    $thanhtien = $item[8] * $item[3];
                    $tongthanhtien += $thanhtien;
                    $tongsoluongsanpham += $item[8];
                    $soluongmoi = $item[9] - $item[8];
                    update_soluongsanpham($item[0], $soluongmoi);
                }
                if ($tongthanhtien < 500000) {
                    $tongthanhtien += 50000;
                }
                $iddonhang = insert_donhang($idtaikhoan, $tentaikhoan, $diachi, $sdt, $email, $pttt, $ngaydathang, $tongthanhtien, $tongsoluongsanpham);

                foreach ($_SESSION["mycart"] as $item) {
                    insert_giohang($_SESSION["taikhoan"]["id"], $item[0], $item[4], $item[1], $item[2], $item[3], $item[6], $item[7], $item[8], $item[10], $iddonhang);
                }
                $_SESSION["mycart"] = [];
                $_SESSION["soluongtronggiohang"] = count($_SESSION["mycart"]);
                $billdonhang = loadone_bill($iddonhang);
            }
            include "./view/dathangthanhcong.php";
            break;
        case 'donhangcuatoi':
            if (isset($_SESSION["taikhoan"])) {
                $danhsachdonhang = loadall_bill($_SESSION["taikhoan"]["id"]);
            }
            include "./view/donhangcuatoi.php";
            break;
        case 'chitietdonhang':
            if (isset($_GET["id"])) {
                $iddonhang = $_GET["id"];
                $danhsachsanpham = loadall_sanphamtheobill($iddonhang);
            }
            include "./view/chitietdonhang.php";
            break;
        case 'huydonhang':
            if (isset($_GET["id"])) {
                delete_donhang($_GET["id"]);
            }
            $danhsachdonhang = loadall_bill($_SESSION["taikhoan"]["id"]);
            include "./view/donhangcuatoi.php";
            break;
        default:
            include "./view/home.php";
            break;
    }
} else {
    include "./view/home.php";
}
include "./view/footer.php";
