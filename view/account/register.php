<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
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
                Register
            </span>
        </div>
    </div>
    <div class="login-page">
        <h2 class="textdangnhap text-center text-uppercase">Đăng ký tài khoản</h2>
        <div class="chuacotk d-flex justify-content-center">
            <h6 class="text-center">Bạn đã có tài khoản ?</h6>
            <a href="index.php?act=login">
                <h6 class="texta text-center">Đăng nhập tại dây</h6>
            </a>
        </div>
        <form action="index.php?act=register" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="tkmk form-label">Họ tên<nav></nav></label>
                <input type="text" class="inputform form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="hoten" placeholder=" Họ tên" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="tkmk form-label">Số điện thoại</label>
                <input type="number" class="inputform form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder=" Số điện thoại" name="sdt" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="tkmk form-label">Địa Chỉ</label>
                <input type="text" class="inputform form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder=" Địa chỉ" name="diachi" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="tkmk form-label">Email</label>
                <input type="email" class="inputform form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder=" Email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="tkmk form-label">Mật khẩu</label>
                <input type="password" class="inputform form-control" id="exampleInputPassword1" placeholder=" Mật khẩu"
                    name="matkhau">
            </div>
            <div class="button">
                <input type="submit" style="margin-top: 10px;" class="btn btn-dark" value="Đăng Ký"
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