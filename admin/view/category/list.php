<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>List Category</title>
    <?php
    include "view/header.php";
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh Sách Danh Mục</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Danh Mục</th>
                                <th>Ngày tạo</th>
                                <th>Ngày sửa</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($list_dm as $key =>  $value) {
                            
                           ?>
                                <tr>
                                    <td><?php echo $value['id_dm'] ?></td>
                                    <td><?php echo $value['ten_danhmuc']; ?></td>
                                    <td><?php echo $value['ngay_tao']; ?></td>
                                    <td><?php echo $value['ngay_sua']; ?></td>
                                    <td>
                                        <div style="display: flex; gap: 5px;">
                                            <a href="index.php?act=suadm&id_dm=<?php echo $value['id_dm']; ?>" class="btn btn-info btn-circle">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a type="button"onclick="return confirm('Bạn có muốn xóa không?')" href="index.php?act=xoadm&id_dm=<?php echo $value['id_dm']; ?>"  class="btn btn-danger btn-circle">
                                                <i class="fas fa-trash" ></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
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