<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Category</title>
    <?php
    include "view/header.php";
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thêm Danh Mục</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <form action="">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">ID Danh Mục</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" disabled placeholder="ID Tự Động">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tên Danh Mục</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <a href="index.php?act=listcategory" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Thêm Danh Mục</span>
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