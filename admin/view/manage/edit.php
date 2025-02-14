<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Order Management</title>
    <?php
    include "view/header.php";
?>

    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chi Tiết Đơn Hàng</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Đơn hàng</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Hình Ảnh</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $tongtien = 0;
                            foreach ($billdetail as $bill) {
                            $tongtien += $bill['thanhtien'];
                            $hinh = "../upload/" . $bill['img'];
                               extract($bill);
                               $formatted_price = number_format($price, 0, '', '.') . 'đ';
                               $formatted_thanhtien = number_format($thanhtien, 0, '', '.') . 'đ';
                               echo ' <tr>
                                <td>'.$id_donhang .'</td>
                                <td>'.$name.'</td>
                               <td><img src="'.$hinh.'" alt="'.$name.'" style="max-width: 100px; max-height: 100px;"></td>
                                <td>'.$formatted_price.'</td>
                                <td>'.$soluong.'</td>
                                <td>'.$formatted_thanhtien.'</td>
                            </tr>';
                            } ?>

                        </tbody>
                    </table>
                    <p style="font-size: 16px; margin-right: 18px; text-align: right; font-weight: 700;">
                        Tổng
                        Tiền: <span
                            style="color: red; margin-left: 5px; font-size: 16x;"><?php echo number_format($tongtien, 0, '', '.') . 'đ' ?></span>
                    </p>
                    <a href="index.php?act=listmanage" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-undo"></i>
                        </span>
                        <span class="text">Danh Sách Đơn Hàng</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
    </div>
    <?php
    include "view/footer.php";
?>