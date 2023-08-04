<?php
function insert_binhluan($noidung, $idtaikhoan, $idsanpham, $ngaybinhluan)
{
    $sql = "INSERT INTO `binhluan`(`noidung`, `idtaikhoan`, `idsanpham`, `ngaybinhluan`) VALUES ('$noidung','$idtaikhoan','$idsanpham','$ngaybinhluan')";
    pdo_execute($sql);
}

function loadall_binhluan_tentaikhoan($idsanpham)
{
    $sql = "SELECT binhluan.*, taikhoan.tentaikhoan FROM binhluan INNER JOIN taikhoan ON taikhoan.id = binhluan.idtaikhoan WHERE binhluan.idsanpham = '$idsanpham'";
    $danhsachbinhluan = pdo_query($sql);
    return $danhsachbinhluan;
}

function loadone_binhluan($id)
{
    $sql = "SELECT * FROM binhluan WHERE id = '$id'";
    $binhluan = pdo_query_one($sql);
    return $binhluan;
}

function loadall_binhluan()
{
    $sql = "SELECT taikhoan.tentaikhoan, sanpham.tensanpham, binhluan.id, binhluan.noidung, binhluan.ngaybinhluan FROM taikhoan JOIN binhluan ON taikhoan.id = binhluan.idtaikhoan JOIN sanpham ON sanpham.id = binhluan.idsanpham";
    $danhsachbinhluan = pdo_query($sql);
    return $danhsachbinhluan;
}

function delete_binhluan($id)
{
    $sql = "DELETE FROM binhluan WHERE id = '$id'";
    pdo_execute($sql);
}

function update_binhluan($id, $noidung)
{
    $sql = "UPDATE `binhluan` SET `noidung`='$noidung' WHERE `id` = '$id'";
    pdo_execute($sql);
}
