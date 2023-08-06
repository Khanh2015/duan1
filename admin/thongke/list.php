<div class="content">
    <div class="header">
        <h1>Thống kê</h1>
        </h1>
        <div class="logo">
            <img src="../view/img/logo-web.png" alt="" />
        </div>
    </div>
    <div class="main-content">
        <h1 class="main-content-title">Bảng thống kê</h1>
        <div class="table-product-wapper table-category-wapper">
            <table class="list-product list-category">
                <thead>
                    <tr>
                        <th>Mã danh mục</th>
                        <th>Tên danh mục</th>
                        <th>Số lượng loại</th>
                        <th>Giá sale cao nhất</th>
                        <th>Giá sale thấp nhất</th>
                        <th>Giá sale trung bình</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($danhsachthongke) && !empty($danhsachthongke)) {
                        foreach ($danhsachthongke as $thongke) {
                            extract($thongke);
                    ?>
                            <tr>
                                <td><?php echo $iddanhmuc ?></td>
                                <td><?php echo $tendanhmuc ?></td>
                                <td><?php echo $soluong ?></td>
                                <td><?php echo number_format($minprice, 0, ",", ".") ?>đ</td>
                                <td><?php echo number_format($maxprice, 0, ",", ".") ?>đ</td>
                                <td><?php echo number_format($avgprice, 0, ",", ".") ?>đ</td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div style="margin: 70px 150px 0">
            <h3 style="text-align: center; margin-bottom: 30px; font-size: 22px; font-weight: 700;">BIỂU ĐỒ THỐNG KÊ DANH MỤC</h3>
            <div id="myChart" style="width: 100%; height:500px;">
            </div>

            <script>
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Danh mục', 'Số lượng sản phẩm'],
                        <?php
                        $tongdm = count($danhsachthongke);
                        $i = 1;
                        foreach ($danhsachthongke as $thongke) {
                            extract($thongke);
                            if ($i == $tongdm) {
                                $dauphay = "";
                            } else {
                                $dauphay = ",";
                            }
                            echo "['" . $thongke['tendanhmuc'] . "', " . $thongke['soluong'] . "]" . $dauphay;
                            $i++;
                        }
                        ?>
                    ]);
                    var chart = new google.visualization.PieChart(document.getElementById('myChart'));
                    chart.draw(data);
                }
            </script>
        </div>
    </div>
</div>