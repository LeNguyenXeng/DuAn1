<?php

if (isset($sanpham) && is_array($sanpham)) {
    extract($sanpham);
}

$hinhpart = "../upload/" . (isset($anhsp) ? $anhsp : '');
$hinh = is_file($hinhpart) ? "<img src='" . $hinhpart . "' height='80'>" : "No Photo";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cập Nhật Sản Phẩm</title>
    <?php include "view/header.php"; ?>
</head>

<body>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cập Nhật Sản Phẩm</h6>
            </div>
            <form action="index.php?act=updateproduct" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Danh Mục</label>
                                <select class="form-control" name="iddm">
                                    <?php
                                    foreach ($listdanhmuc as $danhmuc) {
                                        extract($danhmuc);
                                        $s = ($sanpham['id_dm'] == $id_dm) ? "selected" : "";
                                        echo '<option value="' . $id_dm . '" ' . $s . '>' . $ten_danhmuc . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="hang" class="form-label">Hãng</label>
                                <input type="text" class="form-control" id="hang" name="hang"
                                    value="<?php echo $hang ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="tensp" class="form-label">Tên Sản Phẩm</label>
                                <input type="text" class="form-control" id="tensp" name="tensp"
                                    value="<?php echo $tensp ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="giasp" class="form-label">Giá Sản Phẩm</label>
                                <input type="text" min="0" class="form-control" id="giasp" name="giasp"
                                    value="<?php echo number_format($gia, 0, '', ',')?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="giasp" class="form-label">Số Lượng </label>
                                <input type="text" min="0" class="form-control" id="soluong" name="soluong"
                                    value="<?php echo $soluong ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="customFile" class="form-label">Hình Ảnh Sản Phẩm</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="hinh">
                                    <label class="custom-file-label" for="customFile">Chọn tệp</label>
                                    <p><?php echo $hinh; ?></p>
                                </div>
                            </div>
                            <div class="mb-3 mt-5">
                                <label for="mota" class="form-label">Mô Tả</label>
                                <textarea class="form-control" id="mota" rows="8"
                                    name="mota"><?php echo $mota ?></textarea>
                            </div>
                            <a href="index.php?act=listproduct" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-sync-alt"></i>
                                </span>
                                <input name="id_sp" type="hidden" value="<?php echo $id_sp ?>">
                                <input name="capnhat" type="submit" value="Cập Nhật Sản Phẩm" class="btn btn-primary">
                            </a>

                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include "view/footer.php"; ?>
</body>

</html>