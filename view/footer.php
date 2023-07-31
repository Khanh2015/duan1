<footer>
    <div class="footer-top">
        <div class="contact-info">
            <h3 class="footer-title-margin">THÔNG TIN LIÊN HỆ</h3>
            <div class="info">
                <p><i style="color: #fff;" class="fa-solid fa-location-dot icon-margin-right"></i> 123 Street, Old Trafford, NewYork, USA</p>
                <p><i style="color: #fff;" class="fa-regular fa-envelope icon-margin-right"></i> info@sitename.com</p>
                <p><i style="color: #fff;" class="fa-solid fa-phone icon-margin-right"></i> + 457 789 789 65</p>
            </div>
            <div class="social-list">
                <a href=""><img src="./view/img/fblogo.png" alt="" /></a>
                <a href=""><img src="./view/img/instalogo.png" alt="" /></a>
                <a href=""><img src="./view/img/gmaillogo.png" alt="" /></a>
                <a href=""><img src="./view/img/tiktoklogo.png" alt="" /></a>
                <a href=""><img src="./view/img/twlogo.png" alt="" /></a>
            </div>
        </div>

        <div class="menu-footer">
            <h3 class="footer-title-margin">MENU</h3>
            <div class="footer-menu-wapper">
                <a href="">Trang chủ</a>
                <a href="">Áo đá bóng</a>
                <a href="">Phụ kiện thể thao</a>
                <a href="">Giới thiệu</a>
                <a href="">Liên hệ</a>
            </div>
        </div>

        <div class="service-footer">
            <h3 class="footer-title-margin">DỊCH VỤ</h3>
            <div class="footer-menu-wapper">
                <p>Miễn phí giao hàng</p>
                <p>Chính sách hoàn tiền</p>
                <p>Hỗ trợ 24/7</p>
                <p>Bảo mật thanh toán</p>
            </div>
        </div>

        <div class="endow">
            <h3 class="footer-title-margin">NHẬP EMAIL ĐỂ NHẬN NHIỀU ƯU ĐÃI</h3>
            <p style="word-wrap: break-word;">
                Nếu bạn muốn nhận email từ chúng tôi mỗi khi chúng tôi có ưu đãi
                đặc biệt mới, hãy đăng ký tại đây!
            </p>
            <form action="">
                <input type="email" required placeholder="Nhập email của bạn vào đây" />
                <button type="submit"> <i style="color: #fff;" class="fa-solid fa-envelope-open-text"></i></button>
            </form>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© 2023 All Rights Reserved by Goup 2</p>
    </div>
</footer>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(".banner").owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplaySpeed: 1500,
        navSpeed: 1500,
        dotsSpeed: 1500,
        // autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });

    $(".top-10").owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        dots: false,
        navText: ["<i class='fa-solid fa-arrow-left'></i>", "<i class='fa-solid fa-arrow-right'></i>"],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 5,
            },
        },
    });

    $(".slide-products").owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        // autoplayHoverPause: true,
        autoplaySpeed: 1000,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 6,
            },
        },
    });

    $(".slide-logo").owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        // autoplayHoverPause: true,
        autoplaySpeed: 1000,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 8,
            },
        },
    });
</script>
<script src="./javascript/pagination.js"></script>
<script src="./javascript/rangeFilter.js"></script>
<script src="./javascript/in-decrease-detail.js"></script>
<script src="./javascript/in-decrease.js"></script>
<script src="./javascript/register.js"></script>
</body>

</html>