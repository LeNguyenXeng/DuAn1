<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>List Comment</title>
    <?php include "view/header.php"; ?>
</head>

<body>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh Sách Bình Luận</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ID Sản Phẩm</th>
                                <th>Tên Tài Khoản</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Nội Dung Bình Luận</th>
                                <th>Ngày Bình Luận</th>
                                <th>Đánh Giá</th>
                                <th>Trạng Thái</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listbinhluan as $binhluan) {
                                extract($binhluan);
                                $xoabl = "index.php?act=deletecomment&id=".$id_bl;
                                $toggleVisibility = "index.php?act=togglecomment&id=".$id_bl;
                                $icon = $visible ? 'fas fa-eye' : 'fas fa-eye-slash';

                                echo '<tr>
                                    <td>'.$id_bl.'</td>
                                    <td>'.$id_sp.'</td>
                                    <td>'.$hoten.'</td>
                                    <td>'.$tensp.'</td>
                                    <td>'.$noidung.'</td>
                                    <td>'.$ngaybl.'</td>
                                    <td>'.$star.' Sao</td>
                                    <td>';
                                
                                // Kiểm tra trạng thái visible để hiển thị thông báo
                                if ($visible) {
                                    echo '<span class="text-success">Hiện</span>'; // Nếu bình luận đang hiển thị
                                } else {
                                    echo '<span class="text-danger">Đã ẩn</span>'; // Nếu bình luận đã ẩn
                                }

                                echo '</td>
                                    <td>
                                        <a onclick="return confirm(\'Bạn có muốn ẩn/hiện bình luận này?\')" href="'.$toggleVisibility.'" class="btn btn-warning btn-circle">
                                            <i class="'.$icon.'"></i>
                                        </a>
                                    </td>
                                </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php include "view/footer.php"; ?>
</body>

</html>