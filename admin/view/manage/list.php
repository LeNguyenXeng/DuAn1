<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Order Management List</title>
    <?php
    include "view/header.php";
?>
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Quản Lý Đơn Hàng</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Mã Đơn Hàng</th>
                                <th>Họ Tên Người Đặt</th>
                                <th>Số Điện Thoại</th>
                                <th>Địa Chỉ</th>
                                <th>Phương Thức Thanh Toán</th>
                                <th>Ngày Mua</th>
                                <th>Trạng Thái</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
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
                            foreach ($listBill as $bill) {
                                extract($bill);
                                $trangthai_mo_ta = isset($list_trangthai[$id_trangthai]) ? $list_trangthai[$id_trangthai] : 'Không xác định';
                                $phuongthuc = isset($list_phuongthucthanhtoan[$pttt]) ? $list_phuongthucthanhtoan[$pttt] : 'Không xác định';
                                // Xác định màu sắc dựa trên trạng thái
    $style = '';
    if ($trangthai_mo_ta == "Đã huỷ") {
        $style = 'style="color: red;"';
    } elseif ($trangthai_mo_ta == "Trả hàng") {
        $style = 'style="color: orange;"';
    } elseif ($trangthai_mo_ta == "Giao hàng thành công") {
        $style = 'style="color: green;"';
    }

                                echo ' <tr>
                                <td>'.$madh.'</td>
                                <td>'.$hoten.'</td>
                                <td>'.$sdt.'</td>
                                <td>'.$diachi.'</td>
                                <td>'.$phuongthuc.'</td>
                                <td>'.$ngaydathang.'</td>
                               <td '.$style.'>'.$trangthai_mo_ta.'</td>
                                <td>
                                    <a href="index.php?act=editmanage" class="btn btn-info btn-circle">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a href="index.php?act=updatemanage&id='.$id_donhang.'" class="btn btn-success btn-circle">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                </td>
                            </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    </div>
    <?php
    include "view/footer.php";
?>