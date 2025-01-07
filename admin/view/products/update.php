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

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <form action="">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Danh Mục</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Áo</option>
                                    <option>Quần</option>
                                    <option>Phụ Kiện</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tên Sản Phẩm</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="HOLLOW TEE - WHITE">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Giá Sản Phẩm</label>
                                <input type="number" min="0" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="400,000₫">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Hình Ảnh Sản Phẩm</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile"
                                        style="cursor: pointer;">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <img style="width: 120px; margin-bottom: 100px; margin-top: 20px;"
                                        src="https://product.hstatic.net/1000344185/product/1__19__aa8e810b0ea3421799b73efcaf9e243b_master.jpg"
                                        alt="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Mô Tả</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="8"
                                    placeholder="| SWE® | HOLLOW TEE COLOR: WHITE MATERIAL: COTTON 100% SIZE: S/M/L/XL HOLLOW TEE - Chiếc áo thun mới với tone màu phối ấn tượng. Điểm nhấn của áo nằm ở họa tiết số 25 mặt trước và chữ Kid Atelier mặt sau được thêu đắp sắc nét. Logo SWE mới được thêu tinh tế ở giữa ngực. Áo thun SWE vẫn được sử dụng COTTON 100% thuần tự nhiên 2 chiều, định lượng 250gsm, thiết kế form SWE regular nên chất lượng các bạn có thể hoàn toàn yên tâm với sản phẩm nhà SWE."></textarea>
                            </div>
                            <a href="index.php?act=listproduct" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-sync-alt"></i>
                                </span>
                                <span class="text">Cập Nhật Sản Phẩm</span>
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