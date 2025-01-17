<?php

  if (isset($sanpham) && is_array($sanpham)) {
    extract($sanpham);
  }

  $hinhpart="../upload/".$anhsp;
                               if(is_file($hinhpart)){
                                $hinh="<img src='".$hinhpart."' height='80'>";

                               }else{
                                $hinh="No Photo";
                               }
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Products</title>
    <?php
    include "view/header.php";
    ?>
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cập Nhật Sản Phẩm</h6>
            </div>
            <form action="index.php?act=updateproduct" method="post">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Danh Mục</label>
    <select class="form-control" id="exampleFormControlSelect1" name="iddm">
        <?php
        foreach ($listdanhmuc as $danhmuc) {
            extract($danhmuc);
            // Kiểm tra danh mục của sản phẩm hiện tại
            if ($sanpham['id_dm'] == $id_dm) $s = "selected";
            else $s = "";
            echo '<option value="' . $id_dm . '" ' . $s . '>' . $ten_danhmuc . '</option>';
        }
        ?>
    </select>
</div>
<div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Hãng</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="hang" aria-describedby="emailHelp" value="<?php echo $hang ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tên Sản Phẩm</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="tensp" aria-describedby="emailHelp" value="<?php echo $tensp ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Giá Sản Phẩm</label>
                                <input type="number" min="0" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="giasp" value="<?php echo $gia ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Hình Ảnh Sản Phẩm</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" style="cursor: pointer;" name="anhsp" >
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <p style="width: 120px; margin-bottom: 100px; margin-top: 20px;"><?php echo $hinh ?> </p>
                                </div>
                            </div>
                            <div class="mb-3 mt-5">
                                <label for="exampleFormControlTextarea1" class="form-label">Mô Tả</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" name="mota"><?php echo $mota ?></textarea>
                            </div>
                            <a href="index.php?act=listproduct" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-sync-alt"></i>
                                </span>
                                <input name="id_sp" type="hidden" value="<?php echo $id_sp ?>"
                                class="btn btn-primary"></input>
                                <input name="capnhat" type="submit" value="Cập Nhật Sản Phẩm"
                                    class="btn btn-primary"></input>
                            </a>
                        </table>

                    </div>
                </div>
            </form>
        </div>

    </div>

    </div>

    <?php
    include "view/footer.php";
    ?>  
