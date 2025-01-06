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
                            <tr class="table_row">
                                <td class="column-1">1</td>
                                <td class="column-2">COLLAR SHIRT - WHITE</td>
                                <td class="column-3">
                                    <div class="how-itemcart1">
                                        <img src="./resources/assets/img/item-cart-05.jpg" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number"
                                            name="num-product2" value="1">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="column-5">380,000₫</td>
                                <td class="column-6">380,000₫</td>

                                <td class="column-7">
                                    <a>
                                        <input type="button" class="btn btn-outline-danger" value="Xóa">
                                    </a>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <div style="display: flex; margin: 15px 46px 35px; font-size: 17px;">
                            <p style="font-family: Poppins, sans-serif;">
                                Tổng Tiền:
                            </p>
                            <span
                                style="color: red; margin-left: 10px;     font-family: Poppins, sans-serif;">10.000.000đ</span>
                        </div>
                        <hr>

                        <div class="div" style="display: flex; justify-content: center; padding-top: 18px; gap: 20px;">
                            <a style="height: 41px; font-family: Poppins, sans-serif; text-transform: capitalize; width: 155px; text-align: center;"
                                class="flex-c-m cl2 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10"
                                href="index.php?act=checkout">Thanh
                                Toán</a>
                            <a style="height: 41px; font-family: Poppins, sans-serif; text-transform: capitalize; width: 200px; text-align: center;"
                                class="flex-c-m cl2 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10"
                                href="index.php?act=shop">Tiếp tục mua hàng</a>
                            <a style="height: 41px; font-family: Poppins, sans-serif; text-transform: capitalize; width: 155px; text-align: center;"
                                class="flex-c-m cl2 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10"
                                href="index.php?act=delcart">Xóa giỏ hàng</a>

                        </div>

                    </div>

                    <div class="button-update flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    include "footer.php";
?>