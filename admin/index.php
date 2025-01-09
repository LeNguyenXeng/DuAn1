<?php
ob_start();
session_start();
include "../model/danhmuc.php";
include "../model/taikhoan.php";
include "../model/pdo.php";
if(!isset($_SESSION['user'])){
    header('location: login.php');
    exit();
}
$userRole = $_SESSION['role'];
if($userRole !== 1){
    header('location: login.php');
    exit();
}
if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
        // Account
        case "listaccount":
            $listnguoidung = loadall_nguoidung();
            include "view/account/list.php";
            break;
        case "updateaccount":
            if(isset($_GET['id'])&&($_GET['id']>0)){
                $sql = "select * from nguoi_dung where id_nguoidung=".$_GET['id'];
                $tk = pdo_query_one($sql);
            }
            include "view/account/update.php";
            break;  
        case "editaccount":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id_nguoidung = $_POST['id_nguoidung'];
                $email = $_POST['email'];
                $matkhau = $_POST['matkhau'];
                $diachi = $_POST['diachi'];
                $sdt = $_POST['sdt'];
                $role = $_POST['role'];
                $hoten = $_POST['hoten'];
                $sql = "UPDATE nguoi_dung set hoten='".$hoten."', email='".$email."', matkhau='".$matkhau."', diachi='".$diachi."', sdt='".$sdt."', role='".$role."' where id_nguoidung=".$id_nguoidung;
                pdo_execute($sql);
                $thongbao = "Cập nhật thành công";
                header("location: index.php?act=listaccount");
            }
            $sql = "SELECT * FROM nguoi_dung order by id_nguoidung desc";
            $listnguoidung = pdo_query($sql);
            include "view/account/update.php";
            break;

        case 'deleteaccount':
            if(isset($_GET['id'])&&($_GET['id']>0)){
                delete_taikhoan($_GET['id']);
            }
            $listnguoidung = loadall_nguoidung();
            include "view/account/list.php";
            break;
        // Product
        case "listproduct":
            include "view/products/list.php";
            break;
        case "addproduct":
            include "view/products/add.php";
            break;
        case "updateproduct":
            include "view/products/update.php";
            break;
            
        // Category
        case "listcategory":
            $list_dm=loadAll_danhmuc();
            include "view/category/list.php";
            break;
         case "addcategory":
            if (isset($_POST['ten_danhmuc']) && !empty($_POST['ten_danhmuc'])) {
                $ten_danhmuc = $_POST['ten_danhmuc'];
                // $ngay_tao = $_POST['ngay_tao'];
                // $ngay_sua = $_POST['ngay_sua'];
                insert_dm($ten_danhmuc);
                $_SESSION['succsess']="";
                header('location:index.php?act=listcategory');
                exit();
        }
            include "view/category/add.php";
            break;
        case "suadm":
            if (isset($_GET['id_dm']) && ($_GET['id_dm'])>0) {
                    
                    $id_dm = $_GET['id_dm'];
                    $dm = loadAll_iddanhmuc($id_dm);
            }
            include "./view/category/update.php";
            break;
            case "updatedm":
                if (isset($_POST['sua']) && $_POST['sua']) {
                    $id_dm = $_POST['id']; // Đảm bảo nhận đúng ID
                    $ten_danhmuc = $_POST['ten_danhmuc'];
                    update_dm($id_dm, $ten_danhmuc);
                }
                $list_dm = loadAll_danhmuc();
                include "view/category/list.php";                
                break;
        case "xoadm":
            if (isset($_GET['id_dm']) && ($_GET['id_dm'] > 0)) {
                $id_dm = $_GET['id_dm'];
                $xoa = delete_dm($id_dm);
                echo "<script>alert('Xóa danh mục thành công');</script>";
                header('location:index.php?act=listcategory');
            } else {
                echo "<script>alert('ID danh mục không hợp lệ');</script>";
            }
            $list_dm = loadAll_danhmuc();
            include "view/category/list.php";
            break;
        // Comment
        case "listcomment":
            include "view/comment/list.php";
            break;
        
        // Statistical
        case "liststatistical":
            include "view/statistical/list.php";
            break;

         // Statistical
         case "liststatistical":
            include "view/statistical/list.php";
            break;
        
        // Manage
        case "listmanage":
            include "view/manage/list.php";
            break;
        case "editmanage":
            include "view/manage/edit.php";
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