<?php


ob_start();
session_start();
include "../model/danhmuc.php";
include "../model/taikhoan.php";
include "../model/pdo.php";
include "../model/sanpham.php";
include "../model/cart.php";

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
            if (isset($_POST['listok'])&&($_POST['listok'])){
                $kyw=$_POST['kyw'];
                $role=$_POST['role'];
            } else{
                $kyw = '';
                $role = '-1';
            }
            $listnguoidung = loadall_nguoidung($kyw,$role);
            $listrole = loadall_role();
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
            
                    $sql = "UPDATE nguoi_dung SET hoten='".$hoten."', email='".$email."', matkhau='".$matkhau."', diachi='".$diachi."', sdt='".$sdt."', role='".$role."' WHERE id_nguoidung=".$id_nguoidung;
                    pdo_execute($sql);
            
                    if ($_SESSION['user']['id_nguoidung'] == $id_nguoidung) {
                        $_SESSION['user']['hoten'] = $hoten;
                        $_SESSION['user']['email'] = $email;
                        $_SESSION['user']['matkhau'] = $matkhau;
                        $_SESSION['user']['diachi'] = $diachi;
                        $_SESSION['user']['sdt'] = $sdt;
                        $_SESSION['user']['role'] = $role;
                    }
            
                    $thongbao = "Cập nhật thành công";
            
                    if ($_SESSION['user']['id_nguoidung'] == $id_nguoidung) {
                        header("location: index.php?act=listaccount");
                    } else {
                        header("location: index.php?act=listaccount");
                    }
                    exit();
                }
            
                if(isset($_GET['id']) && $_GET['id'] > 0){
                    $sql = "SELECT * FROM nguoi_dung WHERE id_nguoidung=".$_GET['id'];
                    $tk = pdo_query_one($sql);
                }
                include "view/account/update.php";
                break;
        case "accountdetail":
                include "view/account/accountdetail.php";
                break;

        case 'deleteaccount':
            if(isset($_GET['id'])&&($_GET['id']>0)){
                delete_taikhoan($_GET['id']);
            }
            $listnguoidung = loadall_nguoidung('', '');
            include "view/account/list.php";
            break;

        case "logout":
            session_unset();
            header("location: login.php");
            break;
        // Product
        case "listproduct":
            if (isset($_POST['listok'])&&($_POST['listok'])){
            $kyw=$_POST['kyw'];
            $id_dm=$_POST['iddm'];
            } else{
                $kyw = '';
                $id_dm = '0';
            }
            $listdanhmuc = loadAll_danhmuc();
            $listsanpham = loadAll_sanpham($kyw, $id_dm);
            include "view/products/list.php";
            break;
        case "addproduct":
            if (isset($_POST['themmoi'])&&($_POST['themmoi'])) {
                $id_dm=$_POST['iddm'];
                $hang = $_POST['hang'];
                $tensp=$_POST['tensp'];
                $giasp=$_POST['giasp'];
                $mota=$_POST['mota'];
                $filename=$_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                  } else {
                    // echo "Sorry, there was an error uploading your file.";
                  }
                  insert_sanpham($tensp,$giasp,$filename,$mota,$id_dm,$hang);
            header('location:index.php?act=listproduct');

                $thongbao="Thêm thành công";
            }
            $list_dm = loadAll_danhmuc();
            include "view/products/add.php";
            break;
            case "updateproduct":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $sanpham = loadone_sanpham($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
            
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $id_dm = $_POST['iddm'];
                    $id_sp = $_POST['id_sp'];
                    $hang = $_POST['hang'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $hinh = ""; // Khởi tạo biến hinh
            
                    // Xử lý hình ảnh
                    if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] == 0) {
                        $hinh = $_FILES['hinh']['name'];
                        $target_dir = "../upload/";
                        $target_file = $target_dir . basename($hinh);
            
                        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                            // Tệp đã được tải lên thành công
                        } else {
                            // Xử lý lỗi tải lên nếu cần
                        }
                    } else {
                        // Nếu không tải lên hình ảnh mới, giữ nguyên tên hình ảnh cũ
                        $hinh = $sanpham['anhsp']; // Giữ lại hình ảnh cũ
                    }
            
                    // Cập nhật sản phẩm
                    update_sanpham($id_sp, $hang, $id_dm, $tensp, $giasp, $mota, $hinh);
                    header("location: index.php?act=listproduct");
                    exit; // Thêm exit sau header để dừng thực thi
                }
            
                $listsanpham = loadAll_sanpham('', '');
                include "view/products/update.php";
                break;
       
        case "deleteproduct":
            if(isset($_GET['id'])&&($_GET['id']>0)){
                delete_sanpham($_GET['id']);
            }
            $listsanpham = loadAll_sanpham("",0);
            include "view/products/list.php";
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
            $listBill = loadall_bill_admin(0);
            include "view/manage/list.php";
            break;
        case "editmanage":
            include "view/manage/edit.php";
            break;
        case "updatemanage":
            
            include "view/manage/update.php";
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