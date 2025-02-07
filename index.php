<?php
session_start();
include "model/taikhoan.php";
include "model/pdo.php";
include "model/giohang.php";
include "model/sanpham.php";
include "model/cart.php";
include "global.php";

$spnew = loadAll_sanpham_home();
if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
        case "shop":
                $spnew = loadAll_sanpham_shop();
            include "view/shop.php";
            break;
            case 'shoppingcart':
                $id_nguoidung = $_SESSION['user']['id_nguoidung'];
                if (!isset($id_nguoidung)) {
                    header("Location: index.php?act=login");
                    exit();
                }
                $spadd = get_cart_items($id_nguoidung);
                if (isset($_POST['addtocart'])) {
                    $soluong = isset($_POST['num-product']) ? (int)$_POST['num-product'] : 1;
                    $price = $_POST['gia'];
                    $anhsp = $_POST['hinh'];
                    $name = $_POST['tensp'];
                    $existingProduct = check_product_in_cart($id_nguoidung, $name);
                    if ($existingProduct) {
                        update_cart_quantity($id_nguoidung, $name, $soluong);
                    } else {
                        insert($id_nguoidung, $soluong, $price, $anhsp, $name);
                    }
                    header("Location: index.php?act=shoppingcart");
                    exit();
                }
                include "view/shoppingcart.php";
                break;    
                case "deletesp":
                    if (isset($_SESSION['user']['id_nguoidung'])) {
                        $id_nguoidung = $_SESSION['user']['id_nguoidung'];
                        $name = $_GET['name'];
                        deletesp($id_nguoidung, $name);
                        header("Location: index.php?act=shoppingcart");
                        exit();
                    }
                   else {
                    header("Location: index.php?act=login");

                   }
                    include "view/shoppingcart.php";
                    break;
                        case "deleteall":
                            if (isset($_SESSION['user']['id_nguoidung'])) {
                                $id_nguoidung = $_SESSION['user']['id_nguoidung'];
                                deleteall($id_nguoidung);
                                header("Location: index.php?act=shoppingcart");
                                exit();
                            }
                           else {
                            header("Location: index.php?act=login");
        
                           }
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
            if(isset($_GET['idsp'])){
                $onesp=loadone_sanpham($_GET['idsp']);
            }
            include "view/products/product_detail.php";
            break;
        // Pay
        case "checkout":
            if(isset($_POST['dongydathang'])&&($_POST['dongydathang'])){
                $hoten = $_POST['hoten'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $sdt = $_POST['sdt'];
                $pttt = $_POST['pttt'];
                $ngaydathang = date('h:i:sa d-m-Y ');
                $tongdonhang = tongdonhang();
                
                $idbill = insert_bill($tongdonhang, $hoten, $diachi, $email, $sdt, $ngaydathang, $pttt);

                foreach ($_SESSION['user'] as $cart) {
                    insert_cart(['user']['id'],$cart[0],$cart[1],$cart[3],$cart[4],$cart[5],$idbill);
                }
            }
                
            
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