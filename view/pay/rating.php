<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bill Detail</title>
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
                Đánh giá bình luận
            </span>
        </div>
    </div>
    <div class="container">
        <div style="    margin-top: 25px; margin-bottom: 50px;">
            <h4
                style="font-family: semibold, sans-serif;  font-size: 27px;  color: black; margin-bottom: 40px; text-align: center;">
                ĐƠN HÀNG CỦA TÔI</h4>
            <div class="wrap-table-shopping-cart" style="border: 10px solid #f7f7f7;">

                <table class="table table-hover">
                    <thead>
                        <tr style="font-family: Popspismedium, sans-serif; font-size: 14px;">
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Viết đánh giá</th>
                            <th scope="col">Đánh giá sao</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
foreach ($billdetail as $bill) {
    $hinh = $img_path . $bill['img'];
    extract($bill);
    $formatted_price = number_format($price, 0, '', '.') . 'đ';
    $formatted_thanhtien = number_format($thanhtien, 0, '', '.') . 'đ';

    // Kiểm tra xem người dùng đã bình luận sản phẩm này chưa
    $existing_comment = check_existing_comment($_SESSION['user']['id_nguoidung'], $id_sp);

    echo '<tr style="font-size: 14px; font-family: Popspismedium, sans-serif;">
            <form action="index.php?act=addcomment" method="post">';
    
    echo '<td>' . $name . '</td>';       
    echo '<td><img src="' . $hinh . '" style="width: 100px;" alt=""></td>';    

    if ($existing_comment > 0) {
        echo '<td colspan="3" style="text-align:center; color: green;">Bạn đã đánh giá sản phẩm này</td>';
    } else {
        echo '<td>
                <textarea class="form-control" name="noidung" rows="3" required></textarea>
              </td> 
              <td> 
                <span class="wrap-rating fs-18 cl11 pointer" style="margin-top: -9px;">
                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                    <input class="dis-none" type="number" name="rating" min="1" max="5" required>
                </span>
              </td>
              <td>
                <input type="hidden" name="id_sp" value="' . $id_sp . '">
                <input type="hidden" name="tensp" value="' . $name . '">
                <button style="font-family: Popspismedium; font-size: 14px; margin-top: 20px;" 
                    type="submit" class="btn btn-danger">Đánh Giá</button>
              </td>';
    }

    echo '</form></tr>';
}        
?>

                    </tbody>
                </table>
            </div>
            <a href="index.php?act=bill">
                <button
                    style="display: flex; margin: 0 auto; font-family: Popspismedium; font-size: 14px; margin-top: 20px;"
                    type="button" class="btn btn-info">Quay lại đơn hàng</button>
            </a>

        </div>

    </div>
    </div>
    </div>

    <?php
    include "view/footer.php";
?>