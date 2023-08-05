<?php
function insert_taikhoan($tentaikhoan, $matkhau, $email)
{
    $sql = "INSERT INTO `taikhoan`(`tentaikhoan`, `matkhau`, `email`) VALUES ('$tentaikhoan','$matkhau','$email')";
    pdo_execute($sql);
}

function check_tentaikhoan($tentaikhoan)
{
    $sql = "SELECT * FROM `taikhoan` WHERE `tentaikhoan` = '$tentaikhoan'";
    $danhsachtentaikhoan = pdo_query($sql);
    return $danhsachtentaikhoan;
}

function check_email($email)
{
    $sql = "SELECT * FROM `taikhoan` WHERE `email` = '$email'";
    $danhsachemail = pdo_query($sql);
    return $danhsachemail;
}

function check_dangnhap($tentaikhoan, $matkhau)
{
    $sql = "SELECT * FROM `taikhoan` WHERE `tentaikhoan` = '$tentaikhoan' AND `matkhau` = '$matkhau'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

function check_trung_tentaikhoan($tentaikhoan, $currentUserId)
{
    $sql = "SELECT * FROM `taikhoan` WHERE `tentaikhoan` = '$tentaikhoan' AND `id` != '$currentUserId'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

function update_taikhoan($id, $tentaikhoan, $matkhau, $email, $diachi, $sdt)
{
    $sql = "UPDATE `taikhoan` SET `tentaikhoan`='$tentaikhoan',`matkhau`='$matkhau',`email`='$email',`diachi`='$diachi',`sdt`='$sdt' WHERE `id` = '$id'";
    pdo_execute($sql);
}

function update_taikhoan_admin($id, $tentaikhoan, $matkhau, $email, $diachi, $sdt, $chucvu)
{
    $sql = "UPDATE `taikhoan` SET `tentaikhoan`='$tentaikhoan',`matkhau`='$matkhau',`email`='$email',`diachi`='$diachi',`sdt`='$sdt', `chucvu`='$chucvu' WHERE `id` = '$id'";
    pdo_execute($sql);
}

function quenmatkhau($email)
{
    $sql = "SELECT * FROM `taikhoan` WHERE `email` = '$email'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

function loadall_taikhoan()
{
    $sql = "SELECT * FROM `taikhoan`";
    $danhsachtaikhoan = pdo_query($sql);
    return $danhsachtaikhoan;
}

function delete_taikhoan($id)
{
    $sql = "DELETE FROM taikhoan WHERE `taikhoan`.`id` = '$id'";
    pdo_execute($sql);
}

function loadone_taikhoan($id)
{
    $sql = "SELECT * FROM `taikhoan` WHERE `id` = '$id'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}
