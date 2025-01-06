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
            <a href="home.html" class="stext-109 cl8 hov-cl1 trans-04">
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
        <div style="    margin-top: 25px;
 margin-bottom: 50px;">
            <table class="table table-hover">
                <thead>
                    <tr style="font-family: Popspismedium, sans-serif; font-size: 14px;">
                        <th scope="col">Mã Đơn Hàng</th>
                        <th scope="col">Tổng Tiền</th>
                        <th scope="col">Địa Chỉ Nhận Hàng</th>
                        <th scope="col">Trạng Thái Đơn Hàng</th>
                        <th scope="col">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="font-size: 14px; font-family: Popspismedium, sans-serif;">
                        <th>#SWE270405</th>
                        <td>450,000₫</td>
                        <td>Khu phố 8, Thị Trấn Thiệu Hóa, Huyện Thiệu Hóa, Tỉnh Thanh Hóa</td>
                        <td>Chờ xác nhận</td>
                        <td><button class="btn btn-outline-danger">Hủy</button>
                            <button type="button" class="btn btn-outline-info">Xem Chi Tiết</button>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    include "view/footer.php";
?>