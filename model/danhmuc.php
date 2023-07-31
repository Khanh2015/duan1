<?php
function insert_danhmuc($tendanhmuc)
{
    $sql = "INSERT INTO `danhmuc`(`tendanhmuc`) VALUES ('$tendanhmuc')";
    pdo_execute($sql);
}

function loadall_danhmuc()
{
    $sql = "SELECT * FROM danhmuc WHERE id != 3";
    $danhsachdanhmuc = pdo_query($sql);
    return $danhsachdanhmuc;
}

function loadone_danhmuc($id)
{
    $sql = "SELECT * FROM `danhmuc` WHERE `danhmuc`.`id` = $id";
    $danhmuc = pdo_query_one($sql);
    return $danhmuc;
}

function delete_danhmuc($id)
{
    $sql = "UPDATE sanpham SET iddanhmuc = '3' WHERE iddanhmuc = $id";
    pdo_execute($sql);
    $sql = "DELETE FROM danhmuc WHERE danhmuc.id = $id";
    pdo_execute($sql);
}

function update_danhmuc($id, $tendanhmuc)
{
    $sql = "UPDATE `danhmuc` SET `tendanhmuc`='$tendanhmuc' WHERE `danhmuc`.`id` = $id";
    pdo_execute($sql);
}
