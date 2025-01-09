<?php
ob_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
session_start();
if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
        // Account
        case "listaccount":
            include "view/account/list.php";
            break;
        case "updateaccount":
            include "view/account/update.php";
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