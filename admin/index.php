<?php
session_start();
if (!isset($_SESSION['taikhoan']) || $_SESSION['taikhoan']['chucvu'] != 1) {
    include "./404.php";
    exit;
}
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "header.php";
if (isset($_GET["act"])) {
    $act = $_GET["act"];
    switch ($act) {
        case 'trovetrangchinh':
            header("location: ../index.php");
            break;
        case 'themdanhmuc':
            if (isset($_POST["themmoi"])) {
                $tendanmuc = $_POST["tendanhmuc"];
                insert_danhmuc($tendanmuc);
                $thongbao = "Thêm danh mục thành công 🎉";
            }
            include "./danhmuc/add.php";
            break;
        case 'danhsachdanhmuc':
            $danhsachdanhmuc = loadall_danhmuc();
            include "./danhmuc/list.php";
            break;
        case 'xoadanhmuc':
            if (isset($_GET["id"])) {
                delete_danhmuc($_GET["id"]);
            }
            $danhsachdanhmuc = loadall_danhmuc();
            include "./danhmuc/list.php";
            break;
        case 'suadanhmuc':
            if (isset($_GET["id"])) {
                $danhmuc = loadone_danhmuc($_GET["id"]);
            }
            include "./danhmuc/update.php";
            break;
        case 'updatedanhmuc':
            if (isset($_POST["capnhat"])) {
                $id = $_POST["id"];
                $tendanhmuc = $_POST["tendanhmuc"];
                update_danhmuc($id, $tendanhmuc);
                $thongbao = "Cập nhật thành công, mời bạn kiểm tra lại danh sách 👏";
            }
            include "./danhmuc/update.php";
            break;
        case 'themsanpham':
            $danhsachdanhmuc = loadall_danhmuc();
            if (isset($_POST["themmoi"])) {
                $iddanhmuc = $_POST["iddanhmuc"];
                $ten = $_POST["ten"];
                $giasale = $_POST["giasale"];
                $giagoc = $_POST["giagoc"];
                $size = $_POST["size"];
                $color = $_POST["color"];
                $soluong = $_POST["soluong"];
                $mota = $_POST["mota"];
                $anh = $_FILES['anh']['name'];
                $allowed_extensions = array('png', 'jpg');
                $ext = pathinfo($anh, PATHINFO_EXTENSION);
                if (!in_array($ext, $allowed_extensions)) {
                    $thongbaoanh = "Ảnh phải ở dạng .png hoặc .jpg";
                } else {
                    $target_file = "../upload/" . basename($anh);
                    move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
                    insert_sanpham($iddanhmuc, $ten, $anh, $giasale, $giagoc, $size, $color, $soluong, $mota);
                    $thongbao = "Thêm sản phẩm thành công 🎉";
                }
            }
            include "./sanpham/add.php";
            break;
        case 'danhsachsanpham':
            $danhsachdanhmuc = loadall_danhmuc();
            $danhsachsanpham = loadall_sanpham();
            include "./sanpham/list.php";
            break;
            // case 'danhsachsanpham':
            //     $danhsachdanhmuc = loadall_danhmuc();
            //     if (!isset($_GET['page'])) {
            //         $page = 1;
            //     } else {
            //         $page = $_GET['page'];
            //     }
            //     $sopluongbanghimoitrang = 5;
            //     $tongsoluongbanghi = count_loadall_danhsachsanpham();
            //     $totalPage = ceil($tongsoluongbanghi / $sopluongbanghimoitrang);
            //     $start_limit = ($page - 1) * $sopluongbanghimoitrang;
            //     $end_limit = $sopluongbanghimoitrang;
            //     $danhsachsanpham = loadall_danhsachsanpham($start_limit, $end_limit);
            //     $act = 'danhsachsanpham';
            //     include "./sanpham/list.php";
            //     break;
        case 'xoasanpham':
            if (isset($_GET["id"])) {
                delete_sanpham($_GET["id"]);
            }
            $danhsachsanpham = loadall_sanpham();
            include "./sanpham/list.php";
            break;
        case 'suasanpham':
            if (isset($_GET["id"])) {
                $sanpham = loadone_sanpham($_GET["id"]);
            }
            $danhsachdanhmuc = loadall_danhmuc();
            include "./sanpham/update.php";
            break;
        case 'updatesanpham':
            if (isset($_POST["capnhat"])) {
                $id = $_POST["id"];
                $iddanhmuc = $_POST["iddanhmuc"];
                $ten = $_POST["ten"];
                $giasale = $_POST["giasale"];
                $giagoc = $_POST["giagoc"];
                $size = $_POST["size"];
                $color = $_POST["color"];
                $soluong = $_POST["soluong"];
                $mota = $_POST["mota"];
                $anh = '';
                if (!empty($_FILES['anh']['name'])) {
                    $anh = $_FILES['anh']['name'];
                    $allowed_extensions = array('png', 'jpg');
                    $ext = pathinfo($anh, PATHINFO_EXTENSION);
                    if (!in_array($ext, $allowed_extensions)) {
                        $thongbaoanh = "Ảnh phải ở dạng .png hoặc .jpg";
                    } else {
                        $target_file = "../upload/" . basename($anh);
                        move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
                    }
                }
                update_sanpham($id, $iddanhmuc, $ten, $anh, $giasale, $giagoc, $size, $color, $soluong, $mota);
                $thongbao = "Cập nhật sản phẩm thành công 🎉";
            }
            $danhsachdanhmuc = loadall_danhmuc();
            include "./sanpham/update.php";
            break;
        case 'locsanpham':
            if (isset($_POST["loc"])) {
                $keyword = $_POST["keyword"];
                $iddanhmuc = $_POST["iddanhmuc"];
                $danhsachsanpham = filter_sanpham($keyword, $iddanhmuc);
            }
            $danhsachdanhmuc = loadall_danhmuc();
            include "./sanpham/list.php";
            break;
        case 'danhsachtaikhoan':
            if (isset($_SESSION["taikhoan"])) {
                $danhsachtaikhoan = loadall_taikhoan();
            }
            include "./taikhoan/list.php";
            break;
        case 'xoataikhoan':
            if (isset($_GET["id"])) {
                delete_taikhoan($_GET["id"]);
            }
            $danhsachtaikhoan = loadall_taikhoan();
            include "./taikhoan/list.php";
            break;
        case 'suataikhoan':
            if (isset($_GET["id"])) {
                $taikhoan = loadone_taikhoan($_GET["id"]);
            }
            include "./taikhoan/update.php";
            break;
        case 'updatetaikhoan':
            if (isset($_POST["capnhat"])) {
                $check = true;
                $id = $_POST["id"];
                $email = $_POST["email"];
                $diachi = $_POST["diachi"];
                $sdt = $_POST["sdt"];
                $matkhau = $_POST["matkhau"];
                $matkhau2 = $_POST["matkhau2"];
                $tentaikhoan = $_POST["tentaikhoan"];
                $chucvu = $_POST["chucvu"];
                $checktaikhoan = check_trung_tentaikhoan($tentaikhoan, $id);
                if (!empty($checktaikhoan)) {
                    $check = false;
                    $thongbaotentaikhoan = "Tên tài khoản đã tồn tại ❌, mời chọn tên tài khoản mới hoặc sử dụng lại tên cũ";
                }
                if ($matkhau != $matkhau2) {
                    $check = false;
                    $thongbaomatkhau = "Mật khẩu khẩu không khớp ❌";
                }
                if ($check) {
                    update_taikhoan_admin($id, $tentaikhoan, $matkhau, $email, $diachi, $sdt, $chucvu);
                    $thongbaothanhcong = "Bạn đã cập nhật tài khoản thành công 🎉";
                }
            }
            include "./taikhoan/update.php";
            break;
        case 'danhsachbinhluan':
            $danhsachbinhluan = loadall_binhluan();
            include "./binhluan/list.php";
            break;
        case 'xoabinhluan':
            if (isset($_GET["id"])) {
                delete_binhluan($_GET["id"]);
            }
            $danhsachbinhluan = loadall_binhluan();
            include "./binhluan/list.php";
            break;
        case 'suabinhluan':
            if (isset($_GET["id"])) {
                $binhluan = loadone_binhluan($_GET["id"]);
            }
            include "./binhluan/update.php";
            break;
        case 'updatebinhluan':
            if (isset($_POST["capnhat"])) {
                $id = $_POST["id"];
                $noidung = $_POST["noidung"];
                update_binhluan($id, $noidung);
                $thongbao = "Cập nhật thành công, mời bạn kiểm tra lại danh sách 👏";
            }
            include "./binhluan/update.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";
