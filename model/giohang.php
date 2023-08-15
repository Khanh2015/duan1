<?php
function update_soluongsanpham($id, $soluong)
{
    $sql = "UPDATE `sanpham` SET `soluong`='$soluong' WHERE `id` = '$id'";
    pdo_execute($sql);
}

function insert_donhang($idtaikhoan, $tentaikhoan, $diachi, $sdt, $email, $pttt, $ngaydathang, $tongtien, $tongsoluongsanpham)
{
    $sql = "INSERT INTO `donhang`(`idtaikhoan`, `tentaikhoan`, `diachi`, `sdt`, `email`, `pttt`, `ngaydathang`, `tongtien`, `tongsoluongsanpham`) VALUES ('$idtaikhoan', '$tentaikhoan','$diachi','$sdt','$email','$pttt','$ngaydathang','$tongtien', '$tongsoluongsanpham')";
    return pdo_execute_return_lastInsertId($sql);
}

function insert_giohang($idtaikhoan, $idsanpham, $anhsanpham, $tensanpham, $giagoc, $giasale, $size, $color,  $soluong, $thanhtien, $iddonhang)
{
    $sql = "INSERT INTO `giohang`(`idtaikhoan`, `idsanpham`, `anhsanpham`, `tensanpham`, `giagoc`, `giasale`, `size`, `color`, `soluong`, `thanhtien`, `iddonhang`) VALUES ('$idtaikhoan','$idsanpham','$anhsanpham','$tensanpham','$giagoc','$giasale', '$size', '$color','$soluong','$thanhtien','$iddonhang')";
    pdo_execute($sql);
}

function loadone_bill($id)
{
    $sql = "SELECT * FROM `donhang` WHERE `id` = '$id'";
    $bill = pdo_query_one($sql);
    return $bill;
}

function loadall_bill($idtaikhoan)
{
    $sql = "SELECT * FROM `donhang` WHERE `idtaikhoan` = '$idtaikhoan' ORDER BY `id` DESC";
    $danhsachdonhang = pdo_query($sql);
    return $danhsachdonhang;
}

function loadall_sanphamtheobill($iddonhang)
{
    $sql = "SELECT * FROM `giohang` WHERE `iddonhang` = '$iddonhang'";
    $danhsachsanpham = pdo_query($sql);
    return $danhsachsanpham;
}

function loadall_donhang($start_limit, $end_limit)
{
    $sql = "SELECT * FROM `donhang` ORDER BY `id` DESC LIMIT $start_limit, $end_limit";
    $danhsachdonhang = pdo_query($sql);
    return $danhsachdonhang;
}

function loadall_donhang_thongke($start_limit, $end_limit)
{
    $sql = "SELECT * FROM `donhang` ORDER BY `trangthai` DESC LIMIT $start_limit, $end_limit";
    $danhsachdonhang = pdo_query($sql);
    return $danhsachdonhang;
}

function count_loadall_danhsachdonhang()
{
    $sql = "SELECT COUNT(*) FROM donhang";
    $result = pdo_query_value($sql);
    return $result;
}

function delete_donhang($id)
{
    pdo_execute("DELETE FROM giohang WHERE `giohang`.`iddonhang` = '$id'");
    pdo_execute("DELETE FROM donhang WHERE `donhang`.`id` = '$id'");
}

// function update_donhang($id, $tentaikhoan, $sdt, $email, $diachi, $ngaydathang, $tongsoluongsanpham, $tongtien, $pttt, $trangthai)
// {
//     $sql = "UPDATE `donhang` SET `tentaikhoan`='$tentaikhoan',`diachi`='$diachi',`sdt`='$sdt',`email`='$email',`pttt`='$pttt',`ngaydathang`='$ngaydathang',`tongtien`='$tongtien',`trangthai`='$trangthai',`tongsoluongsanpham`='$tongsoluongsanpham' WHERE `id` = '$id'";
//     pdo_execute($sql);
// }

function update_donhang($id, $tentaikhoan, $sdt, $email, $diachi, $trangthai)
{
    $sql = "UPDATE `donhang` SET `tentaikhoan`='$tentaikhoan',`diachi`='$diachi',`sdt`='$sdt',`email`='$email',`trangthai`='$trangthai' WHERE `id` = '$id'";
    pdo_execute($sql);
}

function load_thongke()
{
    $sql = "SELECT danhmuc.id AS iddanhmuc, danhmuc.tendanhmuc AS tendanhmuc, COUNT(sanpham.id) AS soluong, MIN(sanpham.giasale) AS minprice, MAX(sanpham.giasale) AS maxprice, AVG(sanpham.giasale) AS avgprice FROM sanpham JOIN danhmuc ON danhmuc.id = sanpham.iddanhmuc GROUP BY danhmuc.id";
    $danhsachthongke = pdo_query($sql);
    return $danhsachthongke;
}

function search_bill($iddonhang, $start_limit, $end_limit)
{
    $sql = "SELECT * FROM donhang WHERE id LIKE '%$iddonhang%' LIMIT $start_limit, $end_limit";
    $danhsachdonhang = pdo_query($sql);
    return $danhsachdonhang;
}

function count_search_bill($iddonhang)
{
    $sql = "SELECT COUNT(*) FROM donhang WHERE id LIKE '%$iddonhang%'";
    $result = pdo_query_value($sql);
    return $result;
}

function soluongsanphamdaban()
{
    $sql = "SELECT SUM(tongsoluongsanpham) FROM donhang WHERE trangthai = 4";
    $result = pdo_query_value($sql);
    return $result;
}

function tongdoanhthu()
{
    $sql = "SELECT SUM(tongtien) FROM donhang WHERE trangthai = 4";
    $result = pdo_query_value($sql);
    return $result;
}
