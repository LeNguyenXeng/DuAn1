<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>List Account</title>
    <?php
    include "view/header.php";
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh Sách Tài Khoản</h6>
            </div>
            <form class="timkiem" action="index.php?act=listaccount" method="post"
                style="display: flex; gap: 5px; margin-top: 20px;  margin-left: 20px;">
                <div class="btn-timkiem">
                    <input type="email"
                        style="width: 200px; height: 35px; border: 1px solid #bebebe; border-radius: 5px;"
                        placeholder="  Tìm kiếm theo email..." name="kyw">
                </div>
                <div class="btn-danhmuc">
                    <select name="role"
                        style="width: 200px; height: 35px; border: 1px solid #bebebe; border-radius: 5px; color: rgb(116, 116, 116);">
                        <option value="-1" selected>Tất cả vai trò</option>
                        <?php
                        foreach($listrole as $role){
                            extract($role);
                            echo '<option value="'.$role.'">'.$role.' </option>';
                        }
                        ?>

                    </select>
                </div>
                <div class="btn-nuttimkiem">
                    <input name="listok" type="submit" class="btn btn-outline-secondary" value="Tìm Kiếm"
                        style="width: 100px; height: 35px; border-radius: 5px;">
                </div>
            </form>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Tài Khoản</th>
                                <th>Mật Khẩu</th>
                                <th>Email</th>
                                <th>Địa Chỉ</th>
                                <th>Số Điện Thoại</th>
                                <th>Ngày Đăng Ký</th>
                                <th>Vai Trò</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($listnguoidung as $nguoidung) {
                                    extract($nguoidung);
                                    $updatetk = "index.php?act=updateaccount&id=".$id_nguoidung;
                                    $deletetk = "index.php?act=deleteaccount&id=".$id_nguoidung;
                                    echo '
                                <tr>
                                <td>'.$id_nguoidung.'</td>
                                <td>'.$hoten.'</td>
                                <td>'.$matkhau.'</td>
                                <td>'.$email.'</td>
                                <td>'.$diachi.'</td>
                                <td>'.$sdt.'</td>
                                <td>'.$ngaydangky.'</td>
                                <td>'.$role.'</td>
                                <td>
                                    <div style="display: flex; gap: 5px;">
                                        <a href="'.$updatetk.'" class="btn btn-info btn-circle">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a onclick="return confirm(\'Bạn có muốn xoá không?\')" href="'.$deletetk.'" class="btn btn-danger btn-circle">
                                            <i class="fas fa-trash"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                                ';
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