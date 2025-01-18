<?php
session_start();
include "model/taikhoan.php";
include "model/pdo.php";
include "model/sanpham.php";

$spnew = loadAll_sanpham_home();


if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
        case "shop":
            include "view/shop.php";
            break;
        case 'shoppingcart':
            include "view/shoppingcart.php";
            break;
        case "about":
            include "view/about.php";
            break;  
        case "contact":
            include "view/contact.php";
            break;

        // Account
        case "login":
            if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
                $email = $_POST['email'];
                $matkhau = $_POST['matkhau'];
                $checkuser = checkuser($email,$matkhau);
                if(is_array($checkuser)){
                    $_SESSION['user'] = $checkuser;
                    $_SESSION['matkhau'] = $checkuser['matkhau'];
                    header('location: index.php');  
                }
                else{
                    $thongbao = "Tài khoản không tồn tại";  
                    
                }
            }
            include "view/account/login.php";
            break;
        case "register":
            if(isset($_POST['dangky'])&&($_POST['dangky'])){
                $hoten = $_POST['hoten'];
                $sdt = $_POST['sdt'];
                $email = $_POST['email'];
                $matkhau = $_POST['matkhau'];
                insert_nguoidung($hoten,$sdt,$email,$matkhau);
                $thongbao = "Đăng ký thành công";
                header("location: index.php?act=login");
            }
            include "view/account/register.php";
            break;
        case "forgotpassword":
            if(isset($_POST['quenmk'])&&($_POST['quenmk'])){
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];

                $checkemail = checkemail($email, $sdt);
                if(is_array($checkemail)){
                $thongbao = "Mật khẩu của bạn là: ".$checkemail['matkhau'];
                    
                }
                else{
                    $thongbao = "Tài khoản không tồn tại!";
                }
            }
            include "view/account/forgot_password.php";
            break;

        case "updateaccount":
            if(isset($_POST['dangky'])&&($_POST['dangky'])){
                $hoten = $_POST['hoten'];
                $sdt = $_POST['sdt'];
                $email = $_POST['email'];
                $matkhau = $_POST['matkhau'];
                $diachi = $_POST['diachi'];
                $id_nguoidung = $_POST['id'];
                update_nguoidung($id_nguoidung,$hoten, $matkhau, $email,$diachi,$sdt);
                $_SESSION['user'] = checkuser($email,$matkhau);
                header("location: index.php?act=login");
            }
            include "view/account/update.php";
            break;

        case 'logout':
            session_unset();
            header("location: index.php");
            break;
        // Product
        case "productdetail":
            include "view/products/product_detail.php";
            break;
        

        // Pay
        case "checkout":
            include "view/pay/checkout.php";
            break;
        case "changeinformation":
            include "view/pay/change_information.php";
            break;
        case "bill":
            include "view/pay/bill.php";
            break;
        case "success":
            include "view/pay/success.php";
            break;
        case "billdetail":
            include "view/pay/billdetail.php";
            break;
        
    default:
        include "view/home.php";
        break;
    }
}
else{
    include "view/home.php";
}


?>