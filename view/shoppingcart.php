<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shopping Cart</title>

    <?php
    include "header.php";
    ?>
    <hr style="margin-top: 84px">
    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-10 p-lr-0-lg">
            <a href="home.html" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Shoping Cart
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

    foreach ($spadd as $stt => $sp) { // Sử dụng $stt để đếm thứ tự
        $ttien = $sp['soluong'] * $sp['price']; // Tính tổng tiền cho sản phẩm
        $tong += $ttien;
        $hinh = $img_path . $sp['anhsp']; // Đường dẫn ảnh
        $soluong = (int)$sp['soluong'];
        $price = (float)$sp['price'];
        $xoa = "index.php?act=deletesp&name=" . $sp['name']; // Đường dẫn xóa sản phẩm
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
                <td class="column-5">' . number_format(floatval($sp['price'])) . ' VNĐ</td>
                <td class="column-6">' . number_format(floatval($ttien)) . ' VNĐ</td>
                <td class="column-7">
                    <input type="button" class="btn btn-outline-danger"value="Xóa" onclick="window.location.href=\'' . $xoa . '\'">
                </td>
            </tr> ';
    }
    echo '
    <tr>
        <td colspan="5" style="text-align:right; font-weight: bold; font-size: 18px;">Tổng tiền:</td>
        <td class="column-6" style="font-weight: bold; font-size: 20px; color: #e74c3c; text-align:center;">
            ' . number_format($tong) . ' VNĐ
        </td>
        <td class="column-7"></td>
    </tr>';
} else {
    echo '<tr><td colspan="7">Giỏ hàng trống.</td></tr>'; // Nếu giỏ hàng trống
}
?>
<?php
echo'
                        </table>
                        <div class="div" style="display: flex; justify-content: center; padding-top: 18px; gap: 20px;">
                            <a style="height: 41px; font-family: Poppins, sans-serif; text-transform: capitalize; width: 155px; text-align: center;"
                                class="flex-c-m cl2 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10"
                                href="index.php?act=checkout">Thanh toan</a>
                            <a style="height: 41px; font-family: Poppins, sans-serif; text-transform: capitalize; width: 200px; text-align: center;"
                                class="flex-c-m cl2 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10"
                                href="index.php?act=shop">quay lai</a>
                            <a style="height: 41px; font-family: Poppins, sans-serif; text-transform: capitalize; width: 155px; text-align: center;"
                                class="flex-c-m cl2 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10"
                                href="index.php?act=deleteall&id_nguoidung='.$id_nguoidung.'" name="deleteall">Xóa giỏ hàng</a>

                        </div>

                    </div>

                    <div class="button-update flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                    </div>
                </div>
            </div>
        </div>
    </div>
    '?>
    <?php
    include "footer.php";
    ?>