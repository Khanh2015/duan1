<?php
include "./model/pdo.php";
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
        default:
            include "./view/home.php";
            break;
    }
} else {
    include "./view/home.php";
}
include "./view/footer.php";
