<!-- Banner -->
<div class="owl-carousel owl-theme banner">
  <div class="item"><img src="./view/img/banner 01.jpg" alt="" /></div>
  <div class="item"><img src="./view/img/banner 02.jpg" alt="" /></div>
  <div class="item"><img src="./view/img/banner 3.png" alt="" /></div>
  <div class="item"><img src="./view/img/banner 04.jpg" alt="" /></div>
</div>

<!-- Main content -->
<div class="main-content">
  <!-- <div class="content"> -->
  <!-- Service -->
  <div class="services">
    <div class="service">
      <img src="./view/img/service1.png" alt="" />
      <div class="service-desc">
        <h4>Miễn phí giao hàng</h4>
        <p>Toàn quốc</p>
      </div>
    </div>

    <div class="service">
      <img src="./view/img/service2.png" alt="" />
      <div class="service-desc">
        <h4>Hoàn tiền</h4>
        <p>Hoàn tiền trong 30 ngày</p>
      </div>
    </div>

    <div class="service">
      <img src="./view/img/service3.png" alt="" />
      <div class="service-desc">
        <h4>Hỗ trợ online 24/7</h4>
        <p>Hỗ trợ khách hàng</p>
      </div>
    </div>

    <div class="service">
      <img src="./view/img/service4.png" alt="" />
      <div class="service-desc">
        <h4>Bảo mật thanh toán</h4>
        <p>Thanh toán an toàn</p>
      </div>
    </div>
  </div>

  <!-- Top 10 trending items -->
  <div class="top10-products">
    <h1 class="top10-title">Top 10 sản phẩm yêu thích nhất</h1>
    <div class="owl-carousel owl-theme top-10">
      <?php
      if (isset($top10)) {
        foreach ($top10 as $sanpham) {
          $link = "index.php?act=chitietsanpham&id=" . $sanpham["id"];
          extract($sanpham);
      ?>
          <div class="item">
            <div class="product">
              <a href="<?php echo $link ?>"><img src="./upload/<?php echo $anhsanpham ?>" alt="" /></a>
              <a href="<?php echo $link ?>">
                <h4><?php echo $tensanpham ?></h4>
              </a>
              <div class="price">
                <p class="init-price"><?php echo number_format($giasale, 0, ",", ".") ?>đ</p>
                <p class="sale"><del><?php echo number_format($giagoc, 0, ",", ".") ?>đ</del></p>
              </div>
              <a href="<?= $link ?>" class="xemchitiet">Xem chi tiết</a>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </div>
  </div>

  <!-- category -->
  <div class="category">

    <div class="soccer-jersey-category">
      <div class="category-title">
        <h2>ÁO ĐÁ BÓNG</h2>
        <p>Barcelona,<br> Real Madrid,<br> Tottenham, <br> Paris Saint-Germain,<br> Chelsea, Liverpool, <br> Manchester City,<br> Manchester United,...</p>
        <a href="index.php?act=locdanhmuc&iddanhmuc=1">Xem thêm...</a>
      </div>
      <img src="./view/img/áo_mu_đỏ.png" alt="" />
    </div>

    <div class="">
      <div class="sneaker-category">
        <div class="category-title">
          <h2>Giày đá bóng</h2>
          <p>Giày đá bóng NIKE, giày đá bóng ADIDAS, giày đá bóng PUMA,...</p>
          <a href="index.php?act=locdanhmuc&iddanhmuc=2">Xem thêm...</a>
        </div>
        <img src="./view/img/categori-sneaker.png" alt="" />
      </div>

      <div class="sneaker-category gloves-category">
        <div class="category-title">
          <h2>Găng tay bắt bóng</h2>
          <p>Găng tay bắt bóng NIKE, Găng tay bắt bóng ADIDAS, Găng tay bắt bóng PUMA,...</p>
          <a href="index.php?act=locdanhmuc&iddanhmuc=3">Xem thêm...</a>
        </div>
        <img src="./view/img/danhmucgangtay.png" alt="" />
      </div>
    </div>


  </div>

  <!-- Products list -->
  <div class="products-list">
    <h1 class="products-list-title">Danh sách sản phẩm</h1>
    <div class="products">
      <?php
      if (isset($danhsachsanpham)) {
        foreach ($danhsachsanpham as $sanpham) {
          $link = "index.php?act=chitietsanpham&id=" . $sanpham["id"];
          extract($sanpham);
      ?>
          <div class="product">
            <a href="<?php echo $link ?>"><img src="./upload/<?php echo $anhsanpham ?>" alt="" /></a>
            <a href="<?php echo $link ?>">
              <h4><?php echo $tensanpham ?></h4>
            </a>
            <div class="price">
              <p class="init-price"><?php echo number_format($giasale, 0, ",", ".") ?>đ</p>
              <p class="sale"><del><?php echo number_format($giagoc, 0, ",", ".") ?>đ</del></p>
            </div>
            <a href="<?= $link ?>" class="xemchitiet">Xem chi tiết</a>
          </div>
      <?php
        }
      }
      ?>
    </div>
    <a href="index.php?act=danhsachsanpham" class="see-more">Xem tất cả</a>
  </div>
</div>

<!-- slide products -->
<div class="owl-carousel owl-theme slide-products">
  <div class="item"><a href=""><img style="width: 253px;" src="./view/img/banner-bottom 11.png" alt="" /></a></div>
  <div class="item"><a href=""><img style="width: 253px;" src="./view/img/banner-bottom 2.png" alt="" /></a></div>
  <div class="item"><a href=""><img style="width: 253px;" src="./view/img/banner-bottom 3.png" alt="" /></a></div>
  <div class="item"><a href=""><img style="width: 253px;" src="./view/img/banner-bottom 4.png" alt="" /></a></div>
  <div class="item"><a href=""><img style="width: 253px;" src="./view/img/banner-bottom 5.png" alt="" /></a></div>
  <div class="item"><a href=""><img style="width: 253px;" src="./view/img/banner-bottom 6.png" alt="" /></a></div>
  <div class="item"><a href=""><img style="width: 253px;" src="./view/img/banner-bottom 7.png" alt="" /></a></div>
  <div class="item"><a href=""><img style="width: 253px;" src="./view/img/banner-bottom 8.png" alt="" /></a></div>
  <div class="item"><a href=""><img style="width: 253px;" src="./view/img/banner-bottom 9.png" alt="" /></a></div>
  <div class="item"><a href=""><img style="width: 253px;" src="./view/img/banner-bottom 10.png" alt="" /></a></div>
</div>

<!-- slide logo -->
<div class="slide-logo-wapper">
  <div class="owl-carousel owl-theme slide-logo">
    <div class="item"><a href="index.php?act=locdanhmuc&iddanhmuc=1"><img src="./view/img/Logo-barca.png" alt=""></a></div>
    <div class="item"><a href="index.php?act=locdanhmuc&iddanhmuc=1"><img src="./view/img/Logo-chelsea.png" alt=""></a></div>
    <div class="item"><a href="index.php?act=locdanhmuc&iddanhmuc=1"><img src="./view/img/Logo-liverpool.png" alt=""></a></div>
    <div class="item"><a href="index.php?act=locdanhmuc&iddanhmuc=1"><img src="./view/img/Logo-man-city.png" alt=""></a></div>
    <div class="item"><a href="index.php?act=locdanhmuc&iddanhmuc=1"><img src="./view/img/Logo-mu.png" alt=""></a></div>
    <div class="item"><a href="index.php?act=locdanhmuc&iddanhmuc=1"><img src="./view/img/Logo-psg.png" alt=""></a></div>
    <div class="item"><a href="index.php?act=locdanhmuc&iddanhmuc=1"><img src="./view/img/Logo-real.png" alt=""></a></div>
    <div class="item"><a href="index.php?act=locdanhmuc&iddanhmuc=1"><img src="./view/img/Logo-tottenham.png" alt=""></a></div>
  </div>
</div>