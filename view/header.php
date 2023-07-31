<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css" integrity="sha512-C8Movfk6DU/H5PzarG0+Dv9MA9IZzvmQpO/3cIlGIflmtY3vIud07myMu4M/NTPJl8jmZtt/4mC9bAioMZBBdA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./view/css/cart.css">
    <link rel="stylesheet" href="./view/css/index.css">
    <link rel="stylesheet" href="./view/css/order.css">
    <link rel="stylesheet" href="./view/css/product_detail.css">
    <link rel="stylesheet" href="./view/css/product_list.css">
    <link rel="stylesheet" href="./view/css/sign_up.css">
    <title>Dự án 1</title>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <header>
            <!-- Logo -->
            <div class="logo">
                <a href="index.php?act=home">
                    <img src="./view/img/logo-web.png" alt="" />
                </a>
            </div>
            <!-- Navbar -->
            <nav class="navbar">
                <ul>
                    <li><a href="index.php?act=home">Trang chủ</a></li>
                    <li>
                        <a href="index.php?act=home">Áo đá bóng <i class="fa-solid fa-chevron-down"></i></i></a>
                        <ul class="subnav">
                            <li><a href="index.php?act=home">Áo Manchester United</a></li>
                            <li><a href="index.php?act=home">Áo Manchester City</a></li>
                            <li><a href="index.php?act=home">Áo Liverpool</a></li>
                            <li><a href="index.php?act=home">Áo Chelsea</a></li>
                            <li><a href="index.php?act=home">Áo Paris Saint-Germain</a></li>
                            <li><a href="index.php?act=home">Áo Tottenham</a></li>
                            <li><a href="index.php?act=home">Áo Real Madrid</a></li>
                            <li><a href="index.php?act=home">Áo Barcelona</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?act=home">Phụ kiện thể thao <i class="fa-solid fa-chevron-down"></i></i></a>
                        <ul class="subnav">
                            <li><a href="index.php?act=home">Giày đá bóng</a></li>
                            <li><a href="index.php?act=home">Găng tay bắt bóng</a></li>
                            <!-- <li><a href="index.php?act=home">Tất thể thao</a></li> -->
                        </ul>
                    </li>
                    <li><a href="index.php?act=gioithieu">Giới thiệu</a></li>
                    <li><a href="index.php?act=lienhe">Liên hệ</a></li>
                    <li><a href="admin/index.php">Đăng nhập Admin</a></li>
                </ul>
            </nav>
            <!-- Search, Cart, Login -->
            <div class="nav-right">
                <form action="" method="post">
                    <input class="search-input" type="text" placeholder="Nhập tên sản phẩm" />
                    <button class="search-button" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
                <div class="cart">
                    <a href="index.php?act=home">
                        <i class="fa-solid fa-cart-shopping cart-icon"><span>99</span></i>
                    </a>
                </div>
                <div class="account">
                    <div class="account-title">
                        <i class="fa-solid fa-user"></i>
                        <span>Tài khoản</span>
                    </div>
                    <div class="account-option">
                        <a href="index.php?act=home">Đăng nhập</a>
                        <a href="index.php?act=home">Đăng ký</a>
                        <!-- <a href="index.php?act=home">Chỉnh sửa tài khoản</a> -->
                        <a href="index.php?act=home">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </header>