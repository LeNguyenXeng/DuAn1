<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Account</title>
    <?php
    include "view/header.php";
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cập Nhật Tài Khoản</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <form action="">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tên Tài Khoản</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="Admin">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Mật Khẩu</label>
                                <input type="password" class="form-control" id="myInput" aria-describedby="emailHelp"
                                    value="12345678">
                                <div class="custom-control custom-switch" style="margin-top: 10px;">
                                    <input type="checkbox" class="custom-control-input" id="switch1"
                                        onclick="myFunction()">
                                    <label class="custom-control-label" for="switch1">Hiển thị mật khẩu</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="admin@gmail.com	">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp"
                                    value="Khu phố 8, Thị trấn Thiệu Hóa, Huyện Thiệu Hóa,Thanh Hoá">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Số Điện Thoại</label>
                                <input type="number" min="0" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="0396180619">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Vai Trò</label>
                                <input type="number" min="0" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="0">
                            </div>
                            <a href="index.php?act=listaccount" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-sync-alt"></i>
                                </span>
                                <span class="text">Cập Nhật Tài Khoản</span>
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