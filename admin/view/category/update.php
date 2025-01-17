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
                <h6 class="m-0 font-weight-bold text-primary">Cập Nhật Danh Mục</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <form action="index.php?act=updatedm" method="post">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">ID Danh Mục</label>
                                <input readonly type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id"  value="<?php  if(isset($dm['id_dm'])&&($dm['id_dm']!='')) echo $dm['id_dm'];?> " >
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tên Danh Mục</label>
                                <input type="text" class="form-control" id="ten_danhmuc" name="ten_danhmuc"
                                    aria-describedby="emailHelp" value="<?php echo $dm['ten_danhmuc']  ?>"  >
                            </div>
                            <a href="" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-sync-alt"></i>
                                </span>
                                    <input class="btn btn-primary" type="submit" name="sua" id="" value="Cập Nhật Danh Mục" >
                            </a>
                        </form>
                    </table>

                </div>
            </div>
        </div>

    </div>

    </div>
    <!-- End of Main Content -->

    <?php
    include "view/footer.php";
?>