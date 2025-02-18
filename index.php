<?php
session_start();
include "model/taikhoan.php";
include "model/pdo.php";
include "model/giohang.php";
include "model/sanpham.php";
include "model/cart.php";
include "model/bill.php";
include "global.php";
var_dump($_SESSION['gio_hang']);
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
                    insert($id_nguoidung, $soluong, $price, $anhsp, $name);
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
                // Lấy giá trị của phương thức thanh toán (pttt)
                $pttt = isset($_POST['pttt']) && $_POST['pttt'] == 'on' ? 1 : 0;

                $hoten = $_SESSION['user']['hoten'];
                $diachi = $_SESSION['user']['diachi'];
                $email = $_SESSION['user']['email'];
                $sdt = $_SESSION['user']['sdt'];
                $ngaydathang = date('Y-m-d');  // Lấy ngày theo định dạng DD-MM-YYYY
                $tongtien = $_SESSION['tong_tien'];
                // Duyệt qua tất cả sản phẩm trong giỏ hàng để kiểm tra tồn kho
                
                foreach ($_SESSION['gio_hang'] as $key => $value) {
                    $idsp = $value['id_sp'];
                    $soluong = $value['soluong'];
                    // Kiểm tra số lượng tồn kho
                    $stock_quantity = slkho($idsp);

                    if ($soluong > $stock_quantity) {
                        echo "<script>
                    alert('Sản phẩm {$value['tensp']} không đủ trong kho. Chỉ còn $stock_quantity sản phẩm.');
                    window.location ='index.php?act=viewcart';
                  </script>";
                        exit; // Nếu có sản phẩm không đủ kho, dừng đơn hàng
                    }

                    // Cập nhật tồn kho
                    $update_result = updatesl($idsp, $soluong);
                    if (!$update_result) {
                        echo "<script>
                    alert('Có lỗi khi cập nhật số lượng tồn kho cho sản phẩm {$value['tensp']}');
                    window.location ='index.php?act=viewcart';
                  </script>";
                        exit; // Dừng lại nếu cập nhật tồn kho thất bại
                    }
                }
                $idbill = insert_bill($id_nguoidung, $id_trangthai, $madh, $pttt, $hoten, $sdt, $diachi, $email, $ngaydathang, $tongtien);
                // / Lưu chi tiết đơn hàng vào database
                $cart_items = get_cart_items($id_nguoidung); // Lấy tất cả sản phẩm trong giỏ từ database
                if (!empty($cart_items)) {
                    foreach ($cart_items as $item) {
                        $name = $item['name'];
                        $image = $item['anhsp'];
                        $price = $item['price'];
                        $quantity = $item['soluong'];
                        $total_price = $price * $quantity;
                        insert_billdetail($idbill, $quantity, $total_price, $image, $name, $price, null);
                    }
                }

                // Xóa giỏ hàng sau khi đặt hàng thành công
                deleteall($id_nguoidung);
                unset($_SESSION['gio_hang']);
                // Chuyển hướng tới trang xác nhận đơn hàng
                header("location:index.php?act=success");
                exit;
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
            include "view/pay/rating.php";
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
