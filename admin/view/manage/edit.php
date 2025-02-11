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
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Danh Mục</th>
                                <th>Ngày tạo</th>
                                <th>Ngày sửa</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <th>Tên Danh Mục</th>
                                <th>Tên Danh Mục</th>
                                <th>Tên Danh Mục</th>
                                <th>Tên Danh Mục</th>
                            </tr>
                        </tbody>
                    </table>
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