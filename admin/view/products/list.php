<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>List Products</title>
    <?php
    include "view/header.php";
?>
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh Sách Sản Phẩm</h6>
            </div>
            <form class="timkiem" action="index.php?act=listproduct" method="post"
                style="display: flex; gap: 5px; margin-top: 20px;  margin-left: 20px;">
                <div class="btn-timkiem">
                    <input type="text"
                        style="width: 200px; height: 35px; border: 1px solid #bebebe; border-radius: 5px;"
                        placeholder="  Tìm kiếm..." name="kyw">
                </div>
                <div class="btn-danhmuc">
                    <select name="iddm"
                        style="width: 200px; height: 35px; border: 1px solid #bebebe; border-radius: 5px; color: rgb(116, 116, 116);">
                        <option value="0" selected>Tất Cả</option>
                        <?php
                        foreach($listdanhmuc as $danhmuc){
                            extract($danhmuc);
                            echo '<option value="'.$id_dm.' " >'.$ten_danhmuc.' </option>';
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
                                <th>Mã Loại</th>
                                <th>Hãng</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Hình Ảnh</th>
                                <th>Giá Sản Phẩm</th>
                                <th>Giảm Giá</th>
                                <th>Số Lượng</th>
                                <th>Mô Tả</th>
                                <th>Ngày Tạo</th>
                                <th>Ngày Cập Nhật</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              foreach($listsanpham as $sanpham){
                                extract($sanpham);
                                $suasp = "index.php?act=updateproduct&id=".$id_sp;
                                $xoasp = "index.php?act=deleteproduct&id=".$id_sp;
                                $hinhpart="../upload/".$anhsp;
                               if(is_file($hinhpart)){
                                $hinh="<img src='".$hinhpart."' height='80'>";

                               }else{
                                $hinh="no photo";
                               }
                                echo '<tr>
                                <td>'.$id_sp.'</td>
                                <td>'.$hang.'</td>
                                <td>'.$tensp.'</td>
                                <td>'.$hinh.'</td>
                                <td>'.number_format($gia, 0, '', ',').'đ</td>
                                <td>'.$giamgia.'</td>
                                <td>'.$soluong.'</td>
                                <td>'.$mota.'</td>
                                <td>'.$ngaytao.'</td>
                                <td>'.$ngaycapnhat.'</td>
                                
                                <td>
                                    <div style="display: flex; gap: 5px;">
                                        <a href="'.$suasp.'" class="btn btn-info btn-circle">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a onclick="return confirm(\'Bạn có muốn xoá không?\')" href="'.$xoasp.'" class="btn btn-danger btn-circle">
                                            <i class="fas fa-trash"></i>
                                        </a>

                                    </div>
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