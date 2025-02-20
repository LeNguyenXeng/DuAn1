<?php
session_start();
include "model/taikhoan.php";
include "model/pdo.php";
include "model/giohang.php";
include "model/sanpham.php";
include "model/cart.php";
include "model/bill.php";
include "model/binhluan.php";
include "global.php";
$spnew = loadAll_sanpham_home();
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case "shop":
            if (isset($_POST['keyword']) && $_POST['keyword'] != "") {
                $keyword = $_POST['keyword'];
                $spnew = loadAll_sanpham_shop($keyword);
            } else {
                $spnew = loadAll_sanpham_shop();
            }
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
                $id_sp = $_POST['id_sp'];
                $soluong = isset($_POST['num-product']) ? (int)$_POST['num-product'] : 1;
                $price = $_POST['gia'];
                $anhsp = $_POST['hinh'];
                $name = $_POST['tensp'];
                $existingProduct = check_product_in_cart($id_nguoidung, $name);

                if ($existingProduct) {
                    update_cart_quantity($id_nguoidung, $name, $soluong);
                } else {
                    insert($id_nguoidung, $soluong, $price, $anhsp, $name, $id_sp);
                }
                // Kiểm tra sản phẩm có trong session chưa
                if (isset($_SESSION['gio_hang'][$name])) {
                    // Cập nhật số lượng trong session
                    $_SESSION['gio_hang'][$name]['soluong'] += $soluong;
                } else {
                    // Thêm sản phẩm vào session
                    $_SESSION['gio_hang'][$name] = array(
                        'id_sp' => $id_sp,
                        'soluong' => $soluong,
                        'gia' => $price,
                        'hinh' => $anhsp,
                        'tensp' => $name
                    );
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
                unset($_SESSION['gio_hang'][$name]);
                header("Location: index.php?act=shoppingcart");
                exit();
            } else {
                header("Location: index.php?act=login");
            }
            include "view/shoppingcart.php";
            break;
        case "deleteall":
            if (isset($_SESSION['user']['id_nguoidung'])) {
                $id_nguoidung = $_SESSION['user']['id_nguoidung'];
                deleteall($id_nguoidung);
                if ($idbill) { // Kiểm tra nếu đơn hàng đã tạo thành công
                    unset($_SESSION['gio_hang']);
                }


                header("Location: index.php?act=shoppingcart");
                exit();
            } else {
                header("Location: index.php?act=login");
            }
            include "view/shoppingcart.php";
            break;
        case "deletebill":
            if (isset($_SESSION['user']['id_nguoidung']) && isset($_GET['id_donhang'])) {
                $id_nguoidung = $_SESSION['user']['id_nguoidung'];
                $id_donhang = $_GET['id_donhang'];

                $products =  get_order_products($id_donhang);
                // Cập nhật lại số lượng trong kho theo tên sản phẩm
                foreach ($products as $product) {
                    $name = $product['name'];
                    $soluong = $product['soluong'];
                    increase_product_quantity($name, $soluong);
                }

                // Giả sử trạng thái "Đã hủy" là 6
                if (updateOrderStatus($id_donhang, 6)) {
                    header("Location: index.php?act=bill");
                    exit();
                } else {
                    // Xử lý lỗi nếu cập nhật không thành công
                    echo "Cập nhật trạng thái đơn hàng thất bại.";
                }
            }
            break;
        case "about":
            include "view/about.php";
            break;
        case "contact":
            include "view/contact.php";
            break;
            // Account
        case "login":
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $email = $_POST['email'];
                $matkhau = $_POST['matkhau'];
                $checkuser = checkuser($email, $matkhau);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    $_SESSION['matkhau'] = $checkuser['matkhau'];
                    header('location: index.php');
                } else {
                    $thongbao = "Tài khoản không tồn tại";
                }
            }
            include "view/account/login.php";
            break;
        case "register":
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $hoten = $_POST['hoten'];
                $sdt = $_POST['sdt'];
                $email = $_POST['email'];
                $matkhau = $_POST['matkhau'];
                insert_nguoidung($hoten, $sdt, $email, $matkhau);
                $thongbao = "Đăng ký thành công";
                header("location: index.php?act=login");
            }
            include "view/account/register.php";
            break;
        case "forgotpassword":
            if (isset($_POST['quenmk']) && ($_POST['quenmk'])) {
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];

                $checkemail = checkemail($email, $sdt);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['matkhau'];
                } else {
                    $thongbao = "Tài khoản không tồn tại!";
                }
            }
            include "view/account/forgot_password.php";
            break;

        case "updateaccount":
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $hoten = $_POST['hoten'];
                $sdt = $_POST['sdt'];
                $email = $_POST['email'];
                $matkhau = $_POST['matkhau'];
                $diachi = $_POST['diachi'];
                $id_nguoidung = $_POST['id'];
                update_nguoidung($id_nguoidung, $hoten, $matkhau, $email, $diachi, $sdt);
                $_SESSION['user'] = checkuser($email, $matkhau);
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
            if (isset($_GET['idsp'])) {
                $onesp = loadone_sanpham($_GET['idsp']);
            }
            include "view/products/product_detail.php";
            break;
            // Pay
            case "checkout":
                if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $id_nguoidung = $_SESSION['user']['id_nguoidung'];
                    $id_trangthai = 1;
                    $madh = 'SWE' . date('YmdHis');  // Lấy ngày và giờ theo định dạng YYYYMMDDHHMMSS
                    $pttt = isset($_POST['pttt']) && $_POST['pttt'] == 'on' ? 1 : 0;
                    $hoten = $_SESSION['user']['hoten'];
                    $diachi = $_SESSION['user']['diachi'];
                    $email = $_SESSION['user']['email'];
                    $sdt = $_SESSION['user']['sdt'];
                    $ngaydathang = date('Y-m-d');  
                    $tongtien = $_SESSION['tong_tien'];
            
                    $idbill = insert_bill($id_nguoidung, $id_trangthai, $madh, $pttt, $hoten, $sdt, $diachi, $email, $ngaydathang, $tongtien);
                    
                    // Lấy giỏ hàng từ database
                    $cart_items = get_cart_items($id_nguoidung);
                    
                    if (!empty($cart_items)) {
                        foreach ($cart_items as $item) {
                            $id_bl = 0;
                            $id_nguoidung = $_SESSION['user']['id_nguoidung'];
                            $id_donhang = $idbill;
                            $name = $item['name'];
                            $image = $item['anhsp'];
                            $price = $item['price'];
                            $quantity = $item['soluong'];
                            $id_sp = isset($item['id_sp']) ? $item['id_sp'] : null;
            
                            
                            if ($id_sp === null) {
                                error_log("Lỗi: id_sp bị null, không thể lưu sản phẩm: " . print_r($item, true));
                                continue;
                            }
            
                            $total_price = $price * $quantity;
            
                            insert_billdetail($id_donhang, $quantity, $total_price, $image, $name, $price, null, $id_sp);
                        }
                    } else {
                        
                        error_log("Lỗi: Giỏ hàng rỗng, không có sản phẩm nào được lưu.");
                    }
                    $listbl = load_All_rating($id_bl);
                    // Xóa giỏ hàng sau khi đặt hàng thành công
                    unset($_SESSION['gio_hang']);
            
                    // Chuyển hướng tới trang xác nhận đơn hàng
                    header("location:index.php?act=success");
                    exit();
                }
                include "view/pay/checkout.php";
                break;        
                        case "bill":
                            if (session_status() == PHP_SESSION_NONE) {
                                session_start();
                            }
                            if (isset($_SESSION['user']['id_nguoidung'])) {
                                $id_nguoidung = $_SESSION['user']['id_nguoidung'];
                                $bill = load_donhang($id_nguoidung);
                                $trangthai = load_trangthai();
                                include "view/pay/bill.php";
                            } else {
                                header("Location: index.php?act=login");
                                exit();
                            }
                            break;
            
        case "success":
            include "view/pay/success.php";
            break;
        case "billdetail":
            if (isset($_GET['id_donhang']) && ($_GET['id_donhang'] > 0)) {
                $id = $_GET['id_donhang'];
                $billdetail = loadall_chitietdonhang($id);
            }
            include "view/pay/billdetail.php";
            break;
            case "rating":
                if (isset($_GET['id_donhang']) && ($_GET['id_donhang'] > 0)) {
                    $id = $_GET['id_donhang'];
                    $billdetail = loadall_chitietdonhang($id);
                }
                include "view/pay/rating.php"; // Hiển thị trang bình luận
                break;
                case "addcomment":
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (!isset($_SESSION['user'])) {
                            header('Location: index.php?act=login');
                            exit();
                        }
                        $id_bl = 0;
                        $id_nguoidung = $_SESSION['user']['id_nguoidung'];
                        $hoten = $_SESSION['user']['hoten'];
                        $id_sp = isset($_POST['id_sp']) ? (int)$_POST['id_sp'] : 0;
                        $tensp = isset($_POST['tensp']) ? $_POST['tensp'] : '';
                        $noidung = isset($_POST['noidung']) ? trim($_POST['noidung']) : '';
                        $star = isset($_POST['rating']) ? (int)$_POST['rating'] : 0;
                        $ngaybl = date('Y-m-d H:i:s');
                
                        if ($id_sp > 0 && !empty($noidung) && $star > 0) {
                            insert_rating($id_bl,$id_nguoidung, $hoten, $id_sp, $tensp, $noidung, $ngaybl, $star);
                            header("Location: index.php?act=productdetail&idsp=$id_sp");
                            exit();
                        } else {
                            echo "<script>alert('Vui lòng nhập nội dung và chọn số sao!');</script>";
                        }
                    }
                    break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
