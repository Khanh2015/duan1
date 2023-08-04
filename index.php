<?php
session_start();
include "./model/pdo.php";
include "./model/sanpham.php";
include "./model/danhmuc.php";
include "./model/taikhoan.php";
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
            $sopluongbanghimoitrang = 4;
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
            $sopluongbanghimoitrang = 4;
            $tongsoluongbanghi = count_loadall_sanpham_danhmuc($_GET["iddanhmuc"]);
            $totalPage = ceil($tongsoluongbanghi / $sopluongbanghimoitrang);
            $start_limit = ($page - 1) * $sopluongbanghimoitrang;
            $end_limit = $sopluongbanghimoitrang;

            switch ($_GET["iddanhmuc"]) {
                case 1:
                    $title = 'ÁO ĐÁ BÓNG';
                    break;
                case 2:
                    $title = 'PHỤ KIỆN THỂ THAO';

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
                    $thongbaothanhcong = "Đăng nhập thành công 🎉";
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
                $danhsachtaikhoan = quenmatkhau($email);
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
        default:
            include "./view/home.php";
            break;
    }
} else {
    include "./view/home.php";
}
include "./view/footer.php";
