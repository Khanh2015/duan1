<?php
function insert_sanpham($iddanhmuc, $ten, $anh, $giasale, $giagoc, $size, $color, $soluong, $mota)
{
    $sql = "INSERT INTO `sanpham`(`tensanpham`, `giagoc`, `giasale`, `anhsanpham`, `mota`, `iddanhmuc`, `size`, `color`, `soluong`) VALUES ('$ten','$giagoc','$giasale','$anh','$mota','$iddanhmuc','$size','$color','$soluong')";
    pdo_execute($sql);
}

function loadall_sanpham()
{
    $sql = "SELECT * FROM `sanpham` ORDER BY id DESC";
    $danhsachsanpham = pdo_query($sql);
    return $danhsachsanpham;
}

function loadone_sanpham($id)
{
    $sql = "SELECT * FROM `sanpham` WHERE `sanpham`.`id` = $id";
    $sanpham = pdo_query_one($sql);
    return $sanpham;
}

function top10_sanpham()
{
    $sql = "SELECT * FROM sanpham ORDER BY luotxem DESC LIMIT 10";
    $top10 = pdo_query($sql);
    return $top10;
}

function loadall_sanpham_home()
{
    $sql = "SELECT * FROM sanpham ORDER BY giasale DESC LIMIT 10";
    $danhsachsanpham = pdo_query($sql);
    return $danhsachsanpham;
}

function delete_sanpham($id)
{
    $sql = "DELETE FROM sanpham WHERE `sanpham`.`id` = $id";
    pdo_execute($sql);
}

function update_sanpham($id, $iddanhmuc, $ten, $anh, $giasale, $giagoc, $size, $color, $soluong, $mota)
{
    $sql = "UPDATE `sanpham` SET `tensanpham`='$ten',`giagoc`='$giagoc',`giasale`='$giasale',`mota`='$mota',`iddanhmuc`='$iddanhmuc',`size`='$size',`color`='$color',`soluong`='$soluong'";
    if (!empty($anh)) {
        $sql .= ",`anhsanpham`='$anh'";
    }
    $sql .= " WHERE `sanpham`.`id` = $id";
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

function timkiemsanpham($keyword, $start_limit, $end_limit)
{
    $sql = "SELECT sanpham.id, sanpham.tensanpham, sanpham.giagoc, sanpham.giasale, sanpham.anhsanpham, sanpham.mota, sanpham.luotxem, sanpham.size, sanpham.color, sanpham.soluong FROM sanpham WHERE tensanpham LIKE '%" . $keyword . "%' LIMIT $start_limit, $end_limit";
    $danhsachsanpham = pdo_query($sql);
    return $danhsachsanpham;
}

function count_loadall_danhsachtimkiem($keyword)
{
    $sql = "SELECT COUNT(*) FROM sanpham WHERE tensanpham LIKE '%" . $keyword . "%'";
    $result = pdo_query_value($sql);
    return $result;
}

function loadall_sanpham_danhmuc($iddanhmuc, $start_limit, $end_limit)
{

    $sql = "SELECT sanpham.id, sanpham.tensanpham, sanpham.giagoc, sanpham.giasale, sanpham.anhsanpham, sanpham.mota, sanpham.luotxem, sanpham.size, sanpham.color, sanpham.soluong FROM sanpham INNER JOIN danhmuc ON sanpham.iddanhmuc = danhmuc.id WHERE sanpham.iddanhmuc =  $iddanhmuc LIMIT $start_limit, $end_limit";
    $danhsachsanpham = pdo_query($sql);
    return $danhsachsanpham;
}

function count_loadall_sanpham_danhmuc($iddanhmuc)
{
    $sql = "SELECT COUNT(*) FROM sanpham INNER JOIN danhmuc ON sanpham.iddanhmuc = danhmuc.id WHERE sanpham.iddanhmuc = $iddanhmuc";
    $result = pdo_query_value($sql);
    return $result;
}

function loadall_danhsachsanpham($start_limit, $end_limit)
{
    $sql = "SELECT  sanpham.id, sanpham.tensanpham, sanpham.giagoc, sanpham.giasale, sanpham.anhsanpham, sanpham.mota, sanpham.luotxem, sanpham.size, sanpham.color, sanpham.soluong FROM sanpham LIMIT $start_limit, $end_limit";
    $danhsachsanpham = pdo_query($sql);
    return $danhsachsanpham;
}

function count_loadall_danhsachsanpham()
{
    $sql = "SELECT COUNT(*) FROM sanpham";
    $result = pdo_query_value($sql);
    return $result;
}

function loadone_sanpham_tendanhmuc($id)
{
    $sql = "SELECT sanpham.*, danhmuc.tendanhmuc FROM sanpham INNER JOIN danhmuc ON sanpham.iddanhmuc = danhmuc.id WHERE sanpham.id = '$id'";
    $sanpham = pdo_query_one($sql);
    return $sanpham;
}

function loadall_sanphamcungdanhmuc($iddanhmuc, $id)
{
    $sql = "SELECT * FROM sanpham WHERE iddanhmuc = '$iddanhmuc' AND id != '$id' LIMIT 5";
    $danhsachsanpham = pdo_query($sql);
    return $danhsachsanpham;
}
