<?php
function insert_sanpham($iddanhmuc, $ten, $anh, $giasale, $giagoc, $size, $color, $soluong, $mota)
{
    $sql = "INSERT INTO `sanpham`(`tensanpham`, `giagoc`, `giasale`, `anhsanpham`, `mota`, `iddanhmuc`, `size`, `color`, `soluong`) VALUES ('$ten','$giagoc','$giasale','$anh','$mota','$iddanhmuc','$size','$color','$soluong')";
    pdo_execute($sql);
}

function loadall_sanpham()
{
    $sql = "SELECT * FROM `sanpham` WHERE 1";
    $danhsachsanpham = pdo_query($sql);
    return $danhsachsanpham;
}

function loadone_sanpham($id)
{
    $sql = "SELECT * FROM `sanpham` WHERE `sanpham`.`id` = $id";
    $sanpham = pdo_query_one($sql);
    return $sanpham;
}

function delete_sanpham($id)
{
    $sql = "DELETE FROM sanpham WHERE `sanpham`.`id` = $id";
    pdo_execute($sql);
}

function update_sanpham($id, $iddanhmuc, $ten, $anh, $giasale, $giagoc, $size, $color, $soluong, $mota)
{
    $sql = "UPDATE `sanpham` SET `tensanpham`='$ten',`giagoc`='$giagoc',`giasale`='$giasale',`anhsanpham`='$anh',`mota`='$mota',`iddanhmuc`='$iddanhmuc',`size`='$size',`color`='$color',`soluong`='$soluong' WHERE `sanpham`.`id` = $id";
    pdo_execute($sql);
}

function filter_sanpham($keyword, $iddanhmuc)
{
    $sql = "SELECT * FROM sanpham WHERE ";
    if (!empty($keyword) && !empty($iddanhmuc)) {
        $sql .= "(tensanpham LIKE '%" . $keyword . "%' OR mota LIKE '%" . $keyword . "%') AND iddanhmuc = " . $iddanhmuc;
    } elseif (!empty($keyword)) {
        $sql .= "tensanpham LIKE '%" . $keyword . "%' OR mota LIKE '%" . $keyword . "%'";
    } elseif (!empty($iddanhmuc)) {
        $sql .= "iddanhmuc = " . $iddanhmuc;
    } else {
        $sql .= "1";
    }
    $danhsachsanpham = pdo_query($sql);
    return $danhsachsanpham;
}
