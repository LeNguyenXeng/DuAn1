<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bill</title>

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
                Bill
            </span>
        </div>
    </div>
    <!-- Shoping Cart -->
    <div class="container">
        <div style="    margin-top: 25px; margin-bottom: 50px;">
            <h4
                style="font-family: semibold, sans-serif;  font-size: 27px;  color: black; margin-bottom: 40px; text-align: center;">
                ĐƠN HÀNG CỦA TÔI</h4>
            <div class="wrap-table-shopping-cart" style="border: 10px solid #f7f7f7;">

                <table class="table table-hover">
                    <thead>
                        <tr style="font-family: Popspismedium, sans-serif; font-size: 14px;">
                            <th scope="col">Mã Đơn Hàng</th>
                            <th scope="col">Tổng Tiền</th>
                            <th scope="col">Địa Chỉ</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr style="font-size: 14px; font-family: Popspismedium, sans-serif;">
                            <!-- <td>#SWE270405</td>
                            <td>450,000₫</td>
                            <td>Khu phố 8, Thị Trấn Thiệu Hóa, Huyện Thiệu Hóa, Tỉnh Thanh Hóa</td>
                            <td>Chờ xác nhận</td>
                            <td><button class="btn btn-outline-danger">Hủy</button>
                                <a href="index.php?act=billdetail">
                                    <button type="button" class="btn btn-outline-info">Xem Chi Tiết</button>
                                </a>

                            </td> -->
                        </tr>



                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <?php
    include "view/footer.php";
?>