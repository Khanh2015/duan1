<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css" integrity="sha512-C8Movfk6DU/H5PzarG0+Dv9MA9IZzvmQpO/3cIlGIflmtY3vIud07myMu4M/NTPJl8jmZtt/4mC9bAioMZBBdA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="./dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="./view/css/cart.css">
    <link rel="stylesheet" href="./view/css/index.css">
    <link rel="stylesheet" href="./view/css/order.css">
    <link rel="stylesheet" href="./view/css/product_detail.css">
    <link rel="stylesheet" href="./view/css/product_list.css">
    <link rel="stylesheet" href="./view/css/sign_in_up.css">
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
                        <a href="index.php?act=home">Danh sách danh mục <i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="subnav">
                            <?php
                            if (isset($danhsachdanhmuc)) {
                                foreach ($danhsachdanhmuc as $danhmuc) {
                                    extract($danhmuc);
                                    echo '<li><a href="index.php?act=locdanhmuc&iddanhmuc=' . $id . '">' . $tendanhmuc . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </li>
                    <li><a href="index.php?act=gioithieu">Giới thiệu</a></li>
                    <li><a href="index.php?act=lienhe">Liên hệ</a></li>
                    <?php if (!isset($_SESSION["taikhoan"])) {
                        echo '<li><a href="index.php?act=lienhe">Hỏi đáp</a></li>';
                    }
                    ?>
                    <?php if (isset($_SESSION["taikhoan"]) && $_SESSION["taikhoan"]["chucvu"] == 1) {
                        echo '<li><a href="admin/index.php">Đăng nhập Admin</a></li>';
                    } ?>
                </ul>
            </nav>
            <div class="nav-right">
                <form action="index.php?act=timkiemsanpham" method="post">
                    <input class="search-input" type="text" name="keyword" placeholder="Nhập tên sản phẩm" required />
                    <button class="search-button" type="submit" name="timkiem">
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
                        <span><?php echo isset($_SESSION["taikhoan"]) ? $_SESSION["taikhoan"]["tentaikhoan"] : "Tài khoản" ?></span>
                    </div>
                    <div class="account-option">
                        <?php if (!isset($_SESSION["taikhoan"])) {
                            echo '<a href="index.php?act=dangnhap">Đăng nhập</a>';
                            echo '<a href="index.php?act=dangky">Đăng ký</a>';
                        } ?>
                        <?php if (isset($_SESSION["taikhoan"])) {
                            echo '<a href="index.php?act=edit_taikhoan">Chỉnh sửa tài khoản</a>';
                            echo '<a id="dangxuat" href="index.php?act=dangxuat">Đăng xuất</a>';
                        } ?>
                        <script>
                            const dangxuat = document.querySelector("#dangxuat");
                            dangxuat.addEventListener("click", e => {
                                let choice = confirm("Bạn có muốn đăng xuất không?");
                                if (!choice) {
                                    e.preventDefault();
                                }
                            })
                        </script>
                    </div>
                </div>
            </div>
        </header>