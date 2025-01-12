<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Products</title>
    <?php
    include "view/header.php";
    ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thêm Sản Phẩm</h6>
            </div>
            <div class=" row frmcontent">
                <form action="index.php?act=addproduct" method="post" enctype="multipart/form-data">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Danh Mục</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="iddm">
                                <?php
                                foreach ($list_dm as $danhmuc) {
                                    extract($danhmuc);
                                    echo '<option value="' . $id_dm . '">' . $ten_danhmuc . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Hãng</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="hang"
                                aria-describedby="emailHelp" placeholder="Nhập hãng">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên Sản Phẩm</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="tensp"
                                aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm ">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Giá Sản Phẩm</label>
                            <input type="number" min="0" class="form-control" id="exampleInputEmail1" name="giasp"
                                aria-describedby="emailHelp"placeholder="Nhập giá sản phẩm " >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Hình Ảnh Sản Phẩm</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="hinh"
                                    style="cursor: pointer;" placeholder="Nhập hình ảnh sản phẩm">
                                <label class="custom-file-label" for="customFile">Choose file</label >
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Mô Tả</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" name="mota" placeholder="Nhập mô tả sản phẩm "></textarea>
                        </div>
                        <a class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <input type="submit" class="btn btn-primary"  name="themmoi" value="Thêm Sản Phẩm"></span>
                            </a>
                        </form>
                    </table>

                </div>
            </div>
        </div>

    </div>

    </div>

    <?php
    include "view/footer.php";
    ?>