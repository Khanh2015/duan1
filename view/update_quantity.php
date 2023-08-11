<?php
session_start();

extract($_GET);
$cart = $_SESSION['mycart'];
if ($action == 'increase') {
    // tìm kiếm trong mảng, trùng size với trùng mã thì tăng số lượng lên 1
    foreach ($cart as $key => $item) {
        if ($item[0] == $id && $item[6] == $size && $item[7] == $color) {
            $cart[$key][8]++;
            $cart[$key][12] = $cart[$key][2] * $cart[$key][8];
            $cart[$key][11] = $cart[$key][2] * $cart[$key][8] - $cart[$key][3] * $cart[$key][8];
            $cart[$key][10] = $cart[$key][3] * $cart[$key][8];
        }
    }
} else if ($action == 'decrease') {
    // tìm kiếm trong mảng, trùng size với trùng mã thì giảm số lượng xuống 1
    foreach ($cart as $key => $item) {
        if ($item[0] == $id && $item[6] == $size && $item[7] == $color) {
            $cart[$key][8]--;
            $cart[$key][12] = $cart[$key][2] * $cart[$key][8];
            $cart[$key][11] = $cart[$key][2] * $cart[$key][8] - $cart[$key][3] * $cart[$key][8];
            $cart[$key][10] = $cart[$key][3] * $cart[$key][8];
            if ($cart[$key][8] == 0) {
                $cart[$key][8] = 1;
            }
        }
    }
}
$_SESSION['mycart'] = $cart;

$totalCost = 0;
$total = 0;
$totalItem = 0;
$discount = 0;

foreach ($cart as $item) {
    $totalCost += $item[2] * $item[8];
    $total += $item[3] * $item[8];
    $totalItem += $item[8];
    $discount += $item[2] - $item[3];
}
$quantity;
$totalPriceItem;
$totalDiscount;

// trả về mảng cart item có id và size trùng với id và size truyền vào
foreach ($cart as $key => $item) {
    // echo "item. $key =? $item";
    if ($item[0] == $id && $item[6] == $size && $item[7] == $color) {
        $quantity = $item[8];
        $totalPriceItem = $item[3] * $item[8];
        $totalDiscount = $discount * $quantity;
    }
}

$response['total'] = $total;
$response['totalItem'] = $totalItem;
$response['quantity'] = $quantity;
$response['totalPriceItem'] = $totalPriceItem;
$response['totalCost'] = $totalCost;
$response['totalDiscount'] = $totalDiscount;

echo json_encode($response);
