<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>List Comment</title>
    <?php
    include "view/header.php";
?>
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
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listbinhluan as $binhluan) {
                                extract($binhluan);
                                $xoabl = "index.php?act=deletecomment&id=".$id_bl;
                                echo '<tr>
                                <td>'.$id_bl.'</td>
                                <td>'.$id_sp.'</td>
                                <td>'.$hoten.'</td>
                                <td>'.$tensp.'</td>
                                <td>'.$noidung.'</td>
                                <td>'.$ngaybl.'</td>
                                <td>'.$star.' Sao</td>
                                <td>
                                    <a onclick="return confirm(\'Bạn có muốn xoá không?\')" href="'.$xoabl.'"  class="btn btn-danger btn-circle">
                                        <i class="fas fa-trash"></i>
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
    <?php
    include "view/footer.php";
?>