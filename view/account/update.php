<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Account</title>
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
                Update Account
            </span>
        </div>
    </div>
    <div class="login-page">
        <h2 class="textdangnhap text-center text-uppercase">Cập nhật tài khoản</h2>
        <?php
                if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                    extract($_SESSION['user']);
                };
        ?>
        <form action="index.php?act=updateaccount" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="tkmk form-label">Họ tên<nav></nav></label>
                <input type="text" class="inputform form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="hoten" value="<?php echo $hoten ?>" required>
            </div>
            <div class=" mb-3">
                <label for="exampleInputEmail1" class="tkmk form-label">Số điện thoại</label>
                <input type="number" class="inputform form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    value="<?php echo $sdt ?>" name="sdt" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="tkmk form-label">Email</label>
                <input type="email" class="inputform form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    value="<?php echo $email ?>" name="email" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="tkmk form-label">Mật khẩu</label>
                <input type="text" id="myInput" class="inputform form-control" id="exampleInputPassword1"
                    value="<?php echo $matkhau ?>" name="matkhau">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="tkmk form-label">Địa Chỉ</label>
                <input type="text" class="inputform form-control" id="exampleInputPassword1" placeholder=" Địa Chỉ"
                    value="<?php echo $diachi ?>" name="diachi">
            </div>
            <div class="button">
                <input type="hidden" name="id" value="<?php echo $id_nguoidung ?>">
                <input type="submit" style="margin-top: 10px;" class="btn btn-dark" value="Cập Nhật"
                    name="dangky"></input>
            </div>
        </form>

        <?php
            if(isset($thongbao)&&($thongbao!="")){
                echo $thongbao;
            }
        ?>
    </div>
    <?php
 include "view/footer.php";
?>