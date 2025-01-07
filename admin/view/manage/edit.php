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
                <h6 class="m-0 font-weight-bold text-primary">Cập Nhật Trạng Thái Đơn Hàng</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <form action="">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Mã Đơn Hàng</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="SWE161197" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Họ Tên Người Đặt</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="Lê Nguyên Tùng" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Số Điện Thoại</label>
                                <input type="number" min="0" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="0396180619" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp"
                                    value="Số Nhà 11, Ngõ 82, Phố Mễ Trì Hạ, Phường Mễ Trì, Quận Nam Từ Liêm" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="tunglnph49038@gmail.com" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Số Lượng</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="1" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tổng Tiền</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="679,000 VNĐ" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Phương Thức Thanh Toán</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="Thanh toán khi nhận hàng" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Trạng Thái</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Chờ xác nhận</option>
                                    <option>Đã xác nhận</option>
                                    <option>Chờ lấy hàng</option>
                                    <option>Đang vận chuyển</option>
                                    <option>Giao hàng thành công</option>
                                    <option>Hủy đơn hàng</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Hình Ảnh Sản Phẩm</label>
                                <div class="custom-file">

                                    <img style="width: 190px;"
                                        src="https://product.hstatic.net/1000344185/product/1__19__aa8e810b0ea3421799b73efcaf9e243b_master.jpg"
                                        alt="">
                                </div>
                            </div>
                            <a href="index.php?act=listmanage" class="btn btn-primary btn-icon-split"
                                style="margin-top: 80px;">
                                <span class="icon text-white-50">
                                    <i class="fas fa-sync-alt"></i>
                                </span>
                                <span class="text">Cập Nhật Đơn Hàng</span>
                            </a>
                        </form>
                    </table>

                </div>
            </div>
        </div>

    </div>

    </div>
    <?php
    include "view/footer.php";
?>