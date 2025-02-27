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
                // Kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng đến trang login
                if (!isset($_SESSION['user']['id_nguoidung'])) {
                    header("Location: index.php?act=login");
                    exit();
                }
            
                $id_nguoidung = $_SESSION['user']['id_nguoidung'];
            
                // Lấy giỏ hàng từ database khi người dùng vào giỏ hàng
                $spadd = get_cart_items($id_nguoidung);
            
                // Kiểm tra nếu giỏ hàng trong database có sản phẩm, cập nhật vào session
                if (!empty($spadd)) {
                    $_SESSION['gio_hang'] = [];
                    foreach ($spadd as $item) {
                        $_SESSION['gio_hang'][$item['id_sp']] = [
                            'id_sp'   => isset($item['id_sp']) ? $item['id_sp'] : null,
                            'soluong' => isset($item['soluong']) ? $item['soluong'] : 1,
                            'gia'     => isset($item['gia']) ? $item['gia'] : 0,
                            'hinh'    => isset($item['hinh']) ? $item['hinh'] : 'no-image.png',
                            'tensp'   => isset($item['tensp']) ? $item['tensp'] : 'Sản phẩm không tên'
                        ];
                    }
                }
                
            
                // Nếu người dùng thêm sản phẩm vào giỏ hàng
                if (isset($_POST['addtocart'])) {
                    // Kiểm tra và lấy dữ liệu từ $_POST
                    $id_sp = $_POST['id_sp'] ?? null;
                    $soluong = isset($_POST['num-product']) ? (int)$_POST['num-product'] : 1;
                    $price = $_POST['gia'] ?? null;
                    $anhsp = $_POST['hinh'] ?? null;
                    $name = $_POST['tensp'] ?? null;
                
                    // Kiểm tra dữ liệu hợp lệ
                    if ($id_sp && $price && $anhsp && $name) {
                        $existingProduct = check_product_in_cart($id_nguoidung, $name);
                        $stock_quantity = slkho($id_sp); // Lấy số lượng tồn kho
                
                        if ($existingProduct) {
                            // Nếu sản phẩm đã có trong giỏ hàng
                            $current_quantity = $_SESSION['gio_hang'][$id_sp]['soluong'];
                            $new_quantity = $current_quantity + $soluong;
                
                            // Kiểm tra xem số lượng yêu cầu có vượt quá tồn kho không
                            if ($new_quantity > $stock_quantity) {
                                echo "<script>alert('Lỗi: Không đủ hàng trong kho để thêm sản phẩm này!'); window.location.href='index.php';</script>";
                                exit();
                            } else {
                                update_cart_quantity($id_nguoidung, $name, $soluong);
                            }
                        } else {
                            // Nếu sản phẩm chưa có trong giỏ hàng
                            if ($soluong > $stock_quantity) {
                                echo "<script>alert('Lỗi: Không đủ hàng trong kho để thêm sản phẩm này!');</script>";
                                exit();
                            } else {
                                insert($id_nguoidung, $soluong, $price, $anhsp, $name, $id_sp);
                            }
                        }
                
                        // Cập nhật session giỏ hàng
                        if (isset($_SESSION['gio_hang'][$id_sp])) {
                            $_SESSION['gio_hang'][$id_sp]['soluong'] += $soluong;
                        } else {
                            $_SESSION['gio_hang'][$id_sp] = [
                                'id_sp'   => $id_sp,
                                'soluong' => $soluong,
                                'gia'     => $price,
                                'hinh'    => $anhsp,
                                'tensp'   => $name
                            ];
                        }
                
                        header("Location: index.php?act=shoppingcart");
                        exit();
                    } else {
                        echo "<script>alert('Lỗi: Dữ liệu không hợp lệ!');</script>";
                    }
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
            case "returnbill":
                if (isset($_GET['id_donhang'])) { // Kiểm tra nếu id_donhang tồn tại
                    $id_donhang = $_GET['id_donhang'];
                    if (updateOrderStatus($id_donhang, 7)) {
                        header("Location: index.php?act=bill");
                        exit();
                    } else {
                        // Xử lý lỗi nếu cập nhật không thành công
                        echo "Cập nhật trạng thái đơn hàng thất bại.";
                    }
                } else {
                    echo "ID đơn hàng không tồn tại.";
                }
            break; // Đảm bảo có break ở đây
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
                $diachi = $_POST['diachi'];
                insert_nguoidung($hoten,$sdt,$email,$matkhau,$diachi);
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
            case 'logout':
                session_start(); // Đảm bảo session đã được khởi tạo
                session_unset(); // Xóa tất cả các biến session
                session_destroy(); // Hủy toàn bộ session
                
                // Chuyển hướng về trang chủ hoặc trang đăng nhập
                header("Location: index.php");
                exit();
            
            // Product
        case "productdetail":
            if (isset($_GET['idsp'])) {
                $onesp = loadone_sanpham($_GET['idsp']);
                $id_sp = $_GET['idsp']; 
                $listbinhluan = loadId_binhluan($id_sp); 
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
                    deleteall($id_nguoidung);
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
                include "view/pay/rating.php";
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
                            // Kiểm tra nếu đã có đánh giá thì không thêm nữa
                            if (check_existing_comment($id_nguoidung, $id_sp) == 0) {
                                insert_rating($id_bl, $id_nguoidung, $hoten, $id_sp, $tensp, $noidung, $ngaybl, $star);
                            }
                            header("Location: index.php?act=productdetail&idsp=$id_sp");
                            exit();
                        }
                    }
                    break;
                    case "returnbill":
                        if (isset($_GET['id_donhang'])) { // Kiểm tra nếu id_donhang tồn tại
                            $id_donhang = $_GET['id_donhang'];
                            if (updateOrderStatus($id_donhang, 7)) {
                                header("Location: index.php?act=bill");
                                exit();
                            } else {
                                // Xử lý lỗi nếu cập nhật không thành công
                                echo "Cập nhật trạng thái đơn hàng thất bại.";
                            }
                        } else {
                            echo "ID đơn hàng không tồn tại.";
                        }
                    break; // Đảm bảo có break ở đây
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}