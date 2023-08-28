<?php
session_start();
include "./model/pdo.php";
include "./model/sanpham.php";
include "./model/danhmuc.php";
include "./model/taikhoan.php";
include "./model/giohang.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (!isset($_SESSION["mycart"])) {
    $_SESSION["mycart"] = [];
}
if (!isset($_SESSION["muangay"])) {
    $_SESSION["muangay"] = [];
}
$keyword = null;
$top10 = top10_sanpham();
$danhsachsanpham = loadall_sanpham_home();
$danhsachdanhmuc = loadall_danhmuc();
include "./view/header.php";
if (isset($_GET["act"])) {
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
            $tongsoluongbanghi = count_loadall_danhsachsanpham();
            list($start_limit, $end_limit, $totalPage) = phan_trang($tongsoluongbanghi);
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
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
            $tongsoluongbanghi = count_loadall_danhsachtimkiem($keyword);
            list($start_limit, $end_limit, $totalPage) = phan_trang($tongsoluongbanghi);
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $danhsachsanpham = timkiemsanpham($keyword, $start_limit, $end_limit);
            $title = "TÌM KIẾM";

            $iddanhmuc = null;
            $act = 'timkiemsanpham';
            include "./view/danhsachsanpham.php";
            break;
        case 'locdanhmuc':
            $tongsoluongbanghi = count_loadall_sanpham_danhmuc($_GET["iddanhmuc"]);
            list($start_limit, $end_limit, $totalPage) = phan_trang($tongsoluongbanghi);
            $page = isset($_GET['page']) ? $_GET['page'] : 1;

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
        case 'locsanpham':
            if (isset($_POST["size"])  && !empty($_POST["size"])) {
                $filterSize = $_POST["size"];
            } else if (isset($_GET["size"]) && !empty($_GET["size"])) {
                $filterSize = $_GET["size"];
            } else {
                $filterSize = "";
            }

            if (isset($_POST["color"]) && !empty($_POST["color"])) {
                $filterColor = $_POST["color"];
            } else if (isset($_GET["color"]) && !empty($_GET["color"])) {
                $filterColor = $_GET["color"];
            } else {
                $filterColor = "";
            }

            if (isset($_POST["price"]) && !empty($_POST["price"])) {
                $filterPrice = $_POST["price"];
            } else if (isset($_GET["price"]) && !empty($_GET["price"])) {
                $filterPrice = $_GET["price"];
            } else {
                $filterPrice = 1000000;
            }

            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            $sopluongbanghimoitrang = 4;

            $tongsoluongbanghi = count_locsanpham($filterSize, $filterColor, $filterPrice);
            $totalPage = ceil($tongsoluongbanghi / $sopluongbanghimoitrang);

            $start_limit = ($page - 1) * $sopluongbanghimoitrang;
            $end_limit = $sopluongbanghimoitrang;

            $danhsachsanpham = locsanpham($filterSize, $filterColor, $filterPrice, $start_limit, $end_limit);
            include "./view/danhsachsanphamloc.php";
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
                $_SESSION["mycart"] = [];
                $_SESSION["soluongtronggiohang"] = 0;
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
                $diachi = $_POST["diachi"];
                $sdt = $_POST["sdt"];
                $matkhau = $_POST["matkhau"];
                $matkhau2 = $_POST["matkhau2"];
                $tentaikhoan =  $_SESSION['taikhoan']['tentaikhoan'];
                $currentUserId = $_SESSION['taikhoan']['id'];
                // $checktaikhoan = check_trung_tentaikhoan($tentaikhoan, $currentUserId);
                if (!empty($checktaikhoan)) {
                    $check = false;
                    $thongbaotentaikhoan = "Tên tài khoản đã tồn tại ❌, mời chọn tên tài khoản mới hoặc sử dụng lại tên cũ";
                }
                if ($matkhau != $matkhau2) {
                    $check = false;
                    $thongbaomatkhau = "Mật khẩu khẩu không khớp ❌";
                }
                if ($check) {
                    update_taikhoan($currentUserId, $matkhau, $diachi, $sdt);
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
                if (isset($taikhoan) && !empty($taikhoan)) {
                    extract($taikhoan);
                    require 'vendor/autoload.php';
                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'khanhdzai6996@gmail.com';
                    $mail->Password   = 'fguthzeydaxaswbb';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port       = 465;
                    $mail->setFrom('khanhdzai6996@gmail.com', 'Admin Sporter Website');
                    $mail->addAddress('' . $email . '', 'User');
                    $mail->isHTML(true);
                    $mail->Subject = 'Providing Password Reset for Customers - Do Not Share Your Email with Anyone';
                    $mail->Body    = 'Email ' . $email . ' có tên tài khoản: <b>' . $tentaikhoan . '</b> và mật khẩu: <b>' . $matkhau . '</b>';
                    $mail->AltBody = 'Email ' . $email . ' có tên tài khoản: <b>' . $tentaikhoan . '</b> và mật khẩu: <b>' . $matkhau . '</b>';
                    $mail->send();
                }
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
                            }, 500);
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
                            }, 500);
                          </script>';
                }
            } else if (isset($_POST["muangay"])) {
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
                $_SESSION["muangay"] = [
                    "id" => $id,
                    "tensanpham" => $tensanpham,
                    "giagoc" => $giagoc,
                    "giasale" => $giasale,
                    "anhsanpham" => $anhsanpham,
                    "mota" => $mota,
                    "size" => $size,
                    "color" => $color,
                    "soluongmua" => $soluongmua,
                    "soluongkho" => $soluongkho,
                    "thanhtien" => $thanhtien,
                    "tongtiengiam" => $tongtiengiam,
                    "tongtiengoc" => $tongtiengoc
                ];
                include "./view/xacnhandonhangmuangay.php";
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
            if (isset($_SESSION["taikhoan"])) {
                if (isset($_POST["dongydathang"])) {
                    $idtaikhoan = $_SESSION["taikhoan"]["id"];
                    $tentaikhoan = $_POST["tentaikhoan"];
                    $email = $_POST["email"];
                    $sdt = $_POST["sdt"];
                    $diachi = $_POST["diachi"];
                    $pttt = 1;
                    $tongthanhtien = 0;
                    $tongsoluongsanpham = 0;
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngaydathang = date('h:i:sa d/m/Y');

                    if ($_SESSION["muangay"] == []) {
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
                        $_SESSION["soluongtronggiohang"] = 0;
                        $billdonhang = loadone_bill($iddonhang);
                    } else {
                        extract($_SESSION["muangay"]);
                        $soluongmoi = $soluongkho - $soluongmua;
                        update_soluongsanpham($id, $soluongmoi);
                        if ($thanhtien < 500000) {
                            $thanhtien += 50000;
                        }
                        $iddonhang = insert_donhang($idtaikhoan, $tentaikhoan, $diachi, $sdt, $email, $pttt, $ngaydathang, $thanhtien, $soluongmua);
                        insert_giohang($_SESSION["taikhoan"]["id"], $id, $anhsanpham, $tensanpham, $giagoc, $giasale, $size, $color,  $soluongmua, $thanhtien, $iddonhang);
                        $billdonhang = loadone_bill($iddonhang);
                    }
                }
            } else {
                if (isset($_POST["dongydathang"])) {
                    $khongcotaikhoan = true;
                    $tentaikhoan = $_POST["tentaikhoan"];
                    $email = $_POST["email"];
                    $sdt = $_POST["sdt"];
                    $diachi = $_POST["diachi"];
                    $pttt = 1;
                    $tongthanhtien = 0;
                    $tongsoluongsanpham = 0;
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngaydathang = date('h:i:sa d/m/Y');

                    $checkemail = check_email($email);
                    if (!empty($checkemail)) {
                        $thongbaotaikhoantontai = "Email đã được đăng ký cho 1 tài khoản khác, vui lòng đăng nhập hoặc chọn email khác ❌";
                        if ($_SESSION["muangay"] == []) {
                            include "./view/xacnhandonhang.php";
                        } else {
                            include "./view/xacnhandonhangmuangay.php";
                        }
                        break;
                    } else {
                        insert_taikhoan($email, $email, $email);
                        $checktaikhoan = check_dangnhap($email, $email);
                        $_SESSION['taikhoan'] = $checktaikhoan;
                        if ($_SESSION["muangay"] == []) {
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
                            $iddonhang = insert_donhang($_SESSION["taikhoan"]["id"], $tentaikhoan, $diachi, $sdt, $email, $pttt, $ngaydathang, $tongthanhtien, $tongsoluongsanpham);

                            foreach ($_SESSION["mycart"] as $item) {
                                insert_giohang($_SESSION["taikhoan"]["id"], $item[0], $item[4], $item[1], $item[2], $item[3], $item[6], $item[7], $item[8], $item[10], $iddonhang);
                            }
                            $_SESSION["mycart"] = [];
                            $_SESSION["soluongtronggiohang"] = 0;
                            $billdonhang = loadone_bill($iddonhang);
                        } else {
                            extract($_SESSION["muangay"]);
                            $soluongmoi = $soluongkho - $soluongmua;
                            update_soluongsanpham($id, $soluongmoi);
                            if ($thanhtien < 500000) {
                                $thanhtien += 50000;
                            }
                            $iddonhang = insert_donhang($_SESSION["taikhoan"]["id"], $tentaikhoan, $diachi, $sdt, $email, $pttt, $ngaydathang, $thanhtien, $soluongmua);
                            insert_giohang($_SESSION["taikhoan"]["id"], $id, $anhsanpham, $tensanpham, $giagoc, $giasale, $size, $color,  $soluongmua, $thanhtien, $iddonhang);
                            $billdonhang = loadone_bill($iddonhang);
                        }
                    }
                }
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
