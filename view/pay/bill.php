<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bill</title>
    <?php include "view/header.php"; ?>
    <hr style="margin-top: 84px">
</head>

<body>
    <!-- Breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-10 p-lr-0-lg">
            <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>
            <span class="stext-109 cl4">Bill</span>
        </div>
    </div>

    <!-- Shopping Cart -->
    <div class="container">
        <div style="margin-top: 25px; margin-bottom: 50px;">
            <h4
                style="font-family: semibold, sans-serif; font-size: 27px; color: black; margin-bottom: 40px; text-align: center;">
                ĐƠN HÀNG CỦA TÔI
            </h4>
            <div class="wrap-table-shopping-cart" style="border: 10px solid #f7f7f7;">
                <table class="table table-hover">
                    <thead>
                        <tr style="font-family: Popspismedium, sans-serif; font-size: 14px;">
                            <th scope="col">Mã Đơn Hàng</th>
                            <th scope="col">Tổng Tiền</th>
                            <th scope="col">Địa Chỉ</th>
                            <th scope="col">Phương Thức Thanh Toán</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($bill)) { ?>
                        <tr>
                            <td colspan="6"
                                style="text-align: center; color: red; font-family: Popspismedium, sans-serif;">
                                Bạn chưa có đơn hàng nào
                            </td>
                        </tr>
                        <?php } else {
                            $list_trangthai = [
                                1 => "Chờ xác nhận",
                                2 => "Đã xác nhận",
                                3 => "Chờ lấy hàng",
                                4 => "Đang giao hàng",
                                5 => "Giao hàng thành công",
                                6 => "Đã huỷ",
                                7 => "Trả hàng"
                            ];
                            $list_phuongthucthanhtoan = [
                                1 => "Thanh toán khi nhận hàng",
                            ];

                            foreach ($bill as $mybill) {  
                                extract($mybill);
                                $trangthai_mo_ta = isset($list_trangthai[$id_trangthai]) ? $list_trangthai[$id_trangthai] : 'Không xác định';
                                $phuongthuc = isset($list_phuongthucthanhtoan[$pttt]) ? $list_phuongthucthanhtoan[$pttt] : 'Không xác định';
                                $xoa = "index.php?act=deletebill&id_donhang=" . $mybill['id_donhang'];
                                echo '
                                   <tr style="font-size: 14px; font-family: Popspismedium, sans-serif;">
                                   <td>'.$madh.'</td>
                                   <td>'.number_format($tongtien, 0, '', ',') . '₫'.'</td>
                                   <td>'.$diachi.'</td>
                                   <td>'.$phuongthuc.'</td>
                                   <td>'.$trangthai_mo_ta.'</td>
                                   <td>';

                                if ($id_trangthai < 4) {
                                    echo '<a href="'.$xoa.'" class="btn btn-outline-danger" onclick="return confirm(\'Bạn có chắc chắn muốn hủy đơn hàng này không?\');">Hủy</a>';
                                }
                                
                                echo '<a href="index.php?act=billdetail&id_donhang='.$mybill['id_donhang'].'">
                                            <button type="button" class="btn btn-outline-info">Xem Chi Tiết</button>
                                        </a>
                                   </td>
                                   </tr>';
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include "view/footer.php"; ?>
</body>

</html>