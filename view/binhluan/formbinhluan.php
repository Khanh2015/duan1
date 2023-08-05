<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
$idsanpham = $_REQUEST["idsanpham"];
$danhsachbinhluan = loadall_binhluan_tentaikhoan($idsanpham);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sign_up.css">
    <title>Document</title>
</head>

<body>

    <div class="my-6">
        <h1 class="mt-20 text-[#f8303a] font-semibold">Bình luận:</h1>
        <div class=" border-gray-400 rounded-md border-[1px] border-solid overflow-hidden">
            <?php
            if (isset($danhsachbinhluan)) {
                foreach ($danhsachbinhluan as $binhluan) {
                    extract($binhluan);
            ?>
                    <div class="comment-user flex justify-between items-center px-6 py-4">
                        <p class="comment-content max-w-[80%]"><?php if (isset($noidung)) echo $noidung ?></p>
                        <div class="comment-username-date flex justify-center items-center gap-5 max-w-[20%]">
                            <p class="comment-username"><?php if (isset($tentaikhoan)) echo $tentaikhoan ?></p>
                            <p class="comment-date"><?php if (isset($ngaybinhluan)) echo $ngaybinhluan ?></p>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
            <?php
            if (isset($_SESSION["taikhoan"])) {
            ?>
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" class="commet-form w-full mt-5" method="post">
                    <input type="hidden" name="idsanpham" value="<?php echo $idsanpham ?>">
                    <input class="w-[80%] p-4 border-blue-600 rounded-bl-md border-[2px] outline-none" type="text" name="binhluan" placeholder="Nhập vào bình luân của bạn..."><button class="w-[20%] p-4 bg-blue-600 text-xl h-[59.2px] font-semibold text-white translate-y-[2px] duration-200 hover:opacity-70" name="thembinhluan" type="submit">Gửi</button>
                </form>
            <?php
            } else {
                echo '<h3 style="color: red; padding: 20px;">Bạn cần đăng nhập để có thể bình luận ❌</h3>';
            }
            ?>
        </div>
    </div>

    <?php
    if (isset($_POST["thembinhluan"])) {
        $binhluan = $_POST["binhluan"];
        $idsanpham = $_POST["idsanpham"];
        $idtaikhoan = $_SESSION["taikhoan"]["id"];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ngaybinhluan = date('h:i:sa d/m/Y');
        insert_binhluan($binhluan, $idtaikhoan, $idsanpham, $ngaybinhluan);
        header("location:" . $_SERVER["HTTP_REFERER"]);
    }
    ?>

</body>

</html>