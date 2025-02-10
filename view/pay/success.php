<!DOCTYPE html>
<html lang="en">

<head>
    <title>Check Out</title>

    <?php
    include "view/header.php";
?>
    <hr style="margin-top: 84px">
    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-10 p-lr-0-lg">
            <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Thanh Toán Thành Công
            </span>
        </div>
    </div>
    <div>
        <div class="thanhcong" style="text-align: center; ">
            <div class="icon" style="font-size: 130px; color: #2dac2d;">
                <i class="zmdi zmdi-check-all"></i>
            </div>
            <div class="textthanhcong" style="font-size: 18px; margin-top: -30px; font-family: semibold; color: green;">
                <p>Bạn đã mua hàng thành công</p>
            </div>
        </div>

        <div class="text-btn"
            style="text-align: center; margin-bottom: 40px; margin-top: 16px; font-family: Popspismedium;">
            <a href="index.php?act=shop">
                <button type="button" class="btn btn-outline-info" style=" font-size: 14px;">Tiếp tục mua hàng</button>
            </a>
            <a href="index.php?act=bill">
                <button type="button" class="btn btn-outline-success" style=" font-size: 14px;">Xem đơn hàng</button>
            </a>
        </div>

        <?php
    include "view/footer.php";
?>
    </div>
    </div>