<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shopping Cart</title>
    <style>
    .how-itemcart1 {
        width: 90px !important;
    }
    </style>

    <?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Bắt đầu session nếu chưa bắt đầu
}
include "header.php";
?>
    <hr style="margin-top: 84px">
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-10 p-lr-0-lg">
            <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Shopping Cart
            </span>
        </div>
    </div>
    <div class="container">
        <div class="row" style="margin-top: 20px;">
            <div style="width: 100%; margin-bottom: 50px;">
                <div class="m-l-25 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart ">
                            <tr class="table_head">
                                <th class="column-1">STT</th>
                                <th class="column-2">Tên sản phẩm</th>
                                <th class="column-3">Hình ảnh</th>
                                <th class="column-4">Số lượng</th>
                                <th class="column-5">Đơn giá</th>
                                <th class="column-6">Thành tiền</th>
                                <th class="column-7">Thao tác</th>
                            </tr>
                            <?php
                        $tong = 0;

                        if (is_array($spadd) && !empty($spadd)) {
                            foreach ($spadd as $stt => $sp) {
                                $ttien = $sp['soluong'] * $sp['price'];
                                $tong += $ttien;
                                $hinh = $img_path . $sp['anhsp'];
                                $xoa = "index.php?act=deletesp&name=" . $sp['name'];

                                echo '
                                    <tr class="table_row">
                                        <td class="column-1">' . ($stt + 1) . '</td>
                                        <td class="column-2">' . $sp['name'] . '</td>
                                        <td class="column-3">
                                            <div class="how-itemcart1">
                                                <img src="' . $hinh . '" alt="IMG">
                                            </div>
                                        </td>
                                        <td class="column-4">' . $sp['soluong'] . '</td>
                                        <td class="column-5">' . number_format(floatval($sp['price'])) . '₫</td>
                                        <td class="column-6">' . number_format(floatval($ttien)) . '₫</td>
                                        <td class="column-7">
                                            <input style="cursor: pointer;" type="button" class="btn btn-outline-danger" value="Xóa" onclick="window.location.href=\'' . $xoa . '\'">
                                        </td>
                                    </tr>';
                            }

                            // Lưu tổng tiền vào session
                            $_SESSION['tong_tien'] = $tong;

                            echo '
                            <tr>
                                <td colspan="5" style="padding-bottom: 20px; padding-top: 20px; text-align:right; font-weight: bold; font-size: 16px;">Tổng tiền:</td>
                                <td class="column-6" style="font-weight: bold; font-size: 16px; color: #e74c3c; text-align:center;">
                                    ' . number_format($tong) . '₫
                                </td>
                            </tr>';
                        } else {
                            echo '<tr><td style="color: red; font-weight: 600; padding-left: 40px; padding-bottom: 20px; padding-top: 20px;" colspan="7">Giỏ hàng trống.</td></tr>';
                        }
                        ?>
                        </table>
                        <div class="div" style="display: flex; justify-content: center; padding-top: 18px; gap: 20px;">
                            <?php if (!empty($spadd)) { ?>
                            <a style="height: 41px; font-family: Poppins, sans-serif; text-transform: capitalize; width: 155px; text-align: center;"
                                class="flex-c-m cl2 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10"
                                href="index.php?act=checkout">Thanh Toán</a>
                            <?php } else { ?>
                            <button
                                style="height: 41px; font-family: Poppins, sans-serif; text-transform: capitalize; width: 155px; text-align: center;"
                                class="flex-c-m cl2 bg8 bor13 p-lr-15 trans-04 pointer m-tb-10" disabled>Thanh
                                Toán</button>
                            <?php } ?>

                            <a style="height: 41px; font-family: Poppins, sans-serif; text-transform: capitalize; width: 200px; text-align: center;"
                                class="flex-c-m cl2 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10"
                                href="index.php?act=shop">Tiếp Tục Mua Hàng</a>

                            <a style="height: 41px; font-family: Poppins, sans-serif; text-transform: capitalize; width: 155px; text-align: center;"
                                class="flex-c-m cl2 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10"
                                href="index.php?act=deleteall&id_nguoidung=<?php echo $id_nguoidung; ?>"
                                name="deleteall">Xóa giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
include "footer.php";
?>