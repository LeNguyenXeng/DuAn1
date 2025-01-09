<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password</title>
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
                Quên Mật Khẩu
            </span>
        </div>
    </div>
    <div class="login-page">
        <h2 class="textdangnhap text-center text-uppercase">Quên Mật Khẩu</h2>
        <div class="chuacotk d-flex justify-content-center">
            <h6 class="text-center">Bạn chưa có tài khoản ?</h6>
            <a href="index.php?act=register">
                <h6 class="texta text-center">Đăng ký tại dây</h6>
            </a>
        </div>
        <form action="index.php?act=forgotpassword" method="POST">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="tkmk form-label">Email</label>
                <input type="email" class="inputform form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email" placeholder=" Email" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="tkmk form-label">Số Điện Thoại</label>
                <input type="number" class="inputform form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="sdt" placeholder=" Số Điện Thoại" required>
            </div>
            <div class="button">
                <input style="margin-top: 10px;" type="submit" class="btn btn-dark" value="Gửi" name="quenmk"></input>
            </div>
        </form>
        <p
            style="font-size: 14px; ; margin-top: 18px; text-align: center; margin-bottom: -20px; color: red;font-family: Popspismedium;">
            <?php
            if(isset($thongbao)&&($thongbao!="")){
                echo $thongbao;
            }
        ?>
        </p>
    </div>
    <?php
 include "view/footer.php";
?>