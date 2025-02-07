<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thay Đổi Thông Tin</title>

    <?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Bắt đầu session nếu chưa bắt đầu
}
include "view/header.php";
$tong = isset($_SESSION['tong_tien']) ? $_SESSION['tong_tien'] : 0; // Lấy tổng tiền từ session
?>
    <hr style="margin-top: 84px">
    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-10 p-lr-0-lg">
            <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>
            <a href="index.php?act=shoppingcart" class="stext-109 cl8 hov-cl1 trans-04">
                Shopping Cart
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>
            <span class="stext-109 cl4">
                Thay Đổi Thông Tin Mua Hàng
            </span>
        </div>
    </div>
    <!-- Shoping Cart -->
    <div class="container">
        <div>
            <div class="bor10 p-lr-40 p-t-30 p-b-40 m-lr-0-xl p-lr-15-sm" style="margin-top: 20px; margin-bottom:50px">
                <h4 class="mtext-109 cl2 p-b-30" style="font-weight: 600; font-size: 22px">
                    Tổng giỏ hàng
                </h4>

                <div class="flex-w flex-t bor12 p-b-13">
                    <div>
                        <span class="stext-110 cl2">
                            Tổng số tiền:
                        </span>
                    </div>

                    <div class="size-209">
                        <span class="mtext-110 cl2">
                            <?php echo number_format($tong) . ' ₫'; ?>
                        </span>
                    </div>
                </div>

                <div class="bor12 p-t-15 p-b-30">
                    <div class="w-full-ssm">
                        <span class="stext-110 cl2">
                            Thông tin nhận hàng:
                        </span>
                    </div>


                    <form action="" method="POST" style="margin-top:20px">
                        <input type="hidden" value="" name="tongdonhang">
                        <input type="hidden" value="" name="dienthoai">
                        <input type="hidden" value="" name="name">
                        <input type="hidden" value="" name="user">
                        <table class="table-shopping-cart">
                            <div class="bor8 bg0 m-b-12">
                                <input style="height: 50px;" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                    name="hoten" placeholder="Nhập họ tên">
                            </div>
                            <div class=" bor8 bg0 m-b-12">
                                <input style="height: 50px;" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                    name="diachi" placeholder="Nhập địa chỉ nhà">
                            </div>
                            <div class="bor8 bg0 m-b-12">
                                <input style="height: 50px;" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                    name="email" placeholder="Nhập email">
                            </div>
                            <div class="bor8 bg0 m-b-12">
                                <input style="height: 50px;" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                    name="sdt" placeholder="Nhập số điện thoại">
                            </div>

                            <div class="formcheck" style="margin-left: 22px; margin-top: 25px; margin-bottom: 30px;">
                                <div class="cl2" style="font-family: Poppins, sans-serif; text-transform: capitalize;">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label for="flexRadioDefault1" style="font-size: 14px;">
                                        Thanh Toán khi nhận hàng
                                    </label>
                                </div>
                                <div class="cl2" style="font-family: Poppins, sans-serif; text-transform: capitalize;">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2" checked>
                                    <label for="flexRadioDefault2" style="font-size: 14px;">
                                        Thanh toán với Momo
                                    </label>
                                </div>
                                <div class="div" style="display: flex; justify-content: center; gap: 20px;">
                                    <a class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn1 p-lr-15 trans-04"
                                        style="width: 50px; height: 41px;" href="index.php?act=success">Đặt Hàng</a>
                                    <a class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn1 p-lr-15 trans-04"
                                        style="width: 220px; height: 41px;" href="index.php?act=shop">Tiếp tục mua
                                        hàng</a>

                                </div>
                        </table>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <?php
    include "view/footer.php";
?>