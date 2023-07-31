<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
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
                $anh = $_FILES['anh']['name'];
                $allowed_extensions = array('png', 'jpg');
                $ext = pathinfo($anh, PATHINFO_EXTENSION);
                if (!in_array($ext, $allowed_extensions)) {
                    $thongbaoanh = "Ảnh phải ở dạng .png hoặc .jpg";
                } else {
                    $target_file = "../upload/" . basename($anh);
                    move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
                    update_sanpham($id, $iddanhmuc, $ten, $anh, $giasale, $giagoc, $size, $color, $soluong, $mota);
                    $thongbao = "Cập nhật sản phẩm thành công 🎉";
                }
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
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";
