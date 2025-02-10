<!DOCTYPE html>
<html lang="en">

<head>
    <title>Check Out</title>

    <?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Bắt đầu session nếu chưa bắt đầu
}
include "view/header.php";
$tong = isset($_SESSION['tong_tien']) ? $_SESSION['tong_tien'] : 0; // Lấy tổng tiền từ session
?>
    <hr style="margin-top: 84px">
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
                Thanh Toán
            </span>
        </div>
    </div>
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
                            <?php echo number_format($tong) . '₫'; ?>
                        </span>
                    </div>
                </div>

                <div class="bor12 p-t-15 p-b-30">
                    <div class="w-full-ssm">
                        <span class="stext-110 cl2">
                            Thông tin nhận hàng:
                        </span>
                    </div>

                    <form action="index.php?act=checkout" method="POST" style="margin-top:20px">
                        <table class="table-shopping-cart">
                            <?php
                        if (isset($_SESSION['user'])) {
                           
                            $hoten = $_SESSION['user']['hoten'];
                            $diachi = $_SESSION['user']['diachi'];
                            $email = $_SESSION['user']['email'];
                            $sdt = $_SESSION['user']['sdt'];
                        } else {
                            $hoten = "";
                            $diachi = "";
                            $email = "";
                            $sdt = "";
                        }
                        ?>

                            <div class="bor8 bg0 m-b-12">
                                <input style="height: 50px;" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                    name="hoten" value="<?php echo $hoten ?>" disabled>
                            </div>
                            <div class="bor8 bg0 m-b-12">
                                <input style="height: 50px;" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                    name="diachi" value="<?php echo $diachi ?>" disabled>
                            </div>
                            <div class="bor8 bg0 m-b-12">
                                <input style="height: 50px;" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                    name="email" value="<?php echo $email ?>" disabled>
                            </div>
                            <div class="bor8 bg0 m-b-12">
                                <input style="height: 50px;" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                    name="sdt" value="<?php echo $sdt ?>" disabled>
                            </div>
                            <!-- Thông tin thanh toán -->
                            <div class="formcheck" style="margin-left: 22px; margin-top: 25px; margin-bottom: 30px;">
                                <div class="cl2" style="font-family: Poppins, sans-serif; text-transform: capitalize;">
                                    <input class="form-check-input" type="radio" name="pttt" id="flexRadioDefault1">
                                    <label for="flexRadioDefault1" style="font-size: 14px;">
                                        Thanh Toán khi nhận hàng
                                    </label>
                                </div>
                                <div style="display: flex; justify-content: center; padding-top: 18px; gap: 20px;">
                                    <input type="submit"
                                        class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn1 p-lr-15 trans-04"
                                        style="width: 50px; height: 41px; cursor: pointer;" value="Đặt Hàng"
                                        name="dongydathang"></input>
                                    <a href="index.php?act=shop"
                                        class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn1 p-lr-15 trans-04"
                                        style="width: 220px; height: 41px; display: flex; align-items: center; justify-content: center; text-decoration: none; color: white;">
                                        Tiếp tục mua hàng
                                    </a>
                                </div>
                            </div>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
include "view/footer.php";

// Optionally, clear the total after checkout
// unset($_SESSION['tong_tien']);
?>