<?php
    if(is_array($tk)){
        extract($tk);
    }
?>
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
                        <form action="index.php?act=editaccount" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tên Tài Khoản</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="hoten"
                                    value="<?php if (isset($hoten) && ($hoten != "")) echo $hoten; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Mật Khẩu</label>
                                <input type="password" class="form-control" name="matkhau" id="myInput"
                                    aria-describedby="emailHelp"
                                    value="<?php if (isset($matkhau) && ($matkhau != "")) echo $matkhau; ?>">
                                <div class="custom-control custom-switch" style="margin-top: 10px;">
                                    <input type="checkbox" class="custom-control-input" id="switch1"
                                        onclick="myFunction()">
                                    <label class="custom-control-label" for="switch1">Hiển thị mật khẩu</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                    aria-describedby="emailHelp"
                                    value="<?php if (isset($email) && ($email != "")) echo $email; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" name="diachi" id="exampleInputEmail1"
                                    aria-describedby="emailHelp"
                                    value="<?php if (isset($diachi) && ($diachi != "")) echo $diachi; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Số Điện Thoại</label>
                                <input type="number" min="0" class="form-control" name="sdt" id="exampleInputEmail1"
                                    aria-describedby="emailHelp"
                                    value="<?php if (isset($sdt) && ($sdt != "")) echo $sdt; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Vai Trò</label>
                                <input type="number" min="0" name="role" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp"
                                    value="<?php if (isset($role) && ($role != "")) echo $role; ?>">
                            </div>
                            <a href="index.php?act=listaccount" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-sync-alt"></i>
                                </span>
                                <input type="hidden" name="id_nguoidung"
                                    value="<?php if (isset($id_nguoidung) && ($id_nguoidung>0)) echo $id_nguoidung; ?>">
                                <input name="capnhat" type="submit" value="Cập Nhật Tài Khoản"
                                    class="btn btn-primary"></input>
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