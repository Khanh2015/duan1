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
