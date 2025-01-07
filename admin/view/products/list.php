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
            <div class="timkiem" style="display: flex; gap: 5px; margin-top: 20px;  margin-left: 20px;">
                <div class="btn-timkiem">
                    <input type="text"
                        style="width: 200px; height: 35px; border: 1px solid #bebebe; border-radius: 5px;"
                        placeholder="  Tìm kiếm...">
                </div>
                <div class="btn-danhmuc">
                    <select
                        style="width: 200px; height: 35px; border: 1px solid #bebebe; border-radius: 5px; color: rgb(116, 116, 116);">
                        <option selected>Tất Cả</option>
                        <option value="1">Quần</option>
                        <option value="2">Áo</option>
                    </select>
                </div>
                <div class="btn-nuttimkiem">
                    <input type="button" class="btn btn-outline-secondary" value="Tìm Kiếm"
                        style="width: 100px; height: 35px; border-radius: 5px;">
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Mã Loại</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Danh Mục</th>
                                <th>Hình Ảnh</th>
                                <th>Giá Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Mô Tả</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>HOLLOW TEE - WHITE</td>
                                <td>Áo</td>
                                <td><img src="https://product.hstatic.net/1000344185/product/1__19__aa8e810b0ea3421799b73efcaf9e243b_master.jpg"
                                        alt="" style="width: 100px;"></td>
                                <td>400,000₫</td>
                                <td>300</td>
                                <td>| SWE® | HOLLOW TEE
                                    COLOR: WHITE
                                    MATERIAL: COTTON 100%
                                    SIZE: S/M/L/XL
                                    HOLLOW TEE - Chiếc áo thun mới với tone màu phối ấn tượng. Điểm nhấn của
                                    áo nằm ở họa tiết số 25 mặt trước và chữ Kid Atelier mặt sau được thêu
                                    đắp sắc nét. Logo SWE mới được thêu tinh tế ở giữa ngực.
                                    Áo thun SWE vẫn được sử dụng COTTON 100% thuần tự nhiên 2 chiều, định
                                    lượng 250gsm, thiết kế form SWE regular nên chất lượng các bạn có thể
                                    hoàn toàn yên tâm với sản phẩm nhà SWE.
                                </td>
                                <td>
                                    <div style="display: flex; gap: 5px;">
                                        <a href="index.php?act=updateproduct" class="btn btn-info btn-circle">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-circle">
                                            <i class="fas fa-trash"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
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