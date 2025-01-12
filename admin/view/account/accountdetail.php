<?php
            if(isset($_SESSION['user'])){
                extract($_SESSION['user']);
                $updatetk = "index.php?act=updateaccount&id=".$id_nguoidung;
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

    <title>List Account</title>
    <style>
    body {
        margin-top: 20px;
        background-color: #f2f6fc;
        color: #69707a;
    }

    .img-account-profile {
        height: 10rem;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
    }

    .card .card-header {
        font-weight: 500;
    }

    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }

    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }

    .form-control,
    .dataTable-input {
        display: block;
        width: 100%;
        padding: 0.875rem 1.125rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #69707a;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .nav-borders .nav-link.active {
        color: #0061f2;
        border-bottom-color: #0061f2;
    }

    .nav-borders .nav-link {
        color: #69707a;
        border-bottom-width: 0.125rem;
        border-bottom-style: solid;
        border-bottom-color: transparent;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0;
        padding-right: 0;
        margin-left: 1rem;
        margin-right: 1rem;
    }

    .field-icon {
        cursor: pointer;
        float: right;
        margin-right: 15px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
    }

    .container {
        margin: auto;
    }
    </style>
    <?php
    include "view/header.php";
?>

    <div class="container-fluid">
        <div class=" px-4 mt-4">
            <!-- Account page navigation-->
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Tài Khoản</div>
                        <div class="card-body text-center"
                            style="display: flex; flex-direction: column; align-items: center;">
                            <!-- Profile picture image-->
                            <img style="margin-top: 20px;" class="img-account-profile rounded-circle mb-2"
                                src="../resources/assets/img/avatar.png" alt="">
                            <!-- Profile picture help block-->
                            <div style="font-size: 16px;" class="small mt-2 text-muted mb-4"><?php echo $hoten ?></div>
                            <!-- Profile picture upload button-->
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Thông Tin Tài Khoản</div>
                        <div class="card-body">
                            <form>
                                <!-- Form Group (username)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername">Họ Tên : </label>
                                    <input class="form-control" id="inputUsername" type="text"
                                        placeholder="Enter your username" value="<?php echo $hoten ?>" disabled>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">Email :</label>
                                        <input class="form-control" id="inputFirstName" type="email"
                                            placeholder="Enter your first name" value="<?php echo $email ?>" disabled>
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Mật Khẩu :</label>
                                        <input class="form-control" id="password-field" type="password"
                                            placeholder="Enter your last name" value="<?php echo $matkhau ?>" disabled>
                                        <span toggle="#password-field"
                                            class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Địa Chỉ : </label>
                                    <input class="form-control" id="inputEmailAddress" type="text"
                                        placeholder="Enter your email address" value="<?php echo $diachi ?>" disabled>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPhone">Số Điện Thoại : </label>
                                        <input class="form-control" id="inputPhone" type="tel"
                                            placeholder="Enter your phone number" value="<?php echo $sdt ?>" disabled>
                                    </div>
                                    <!-- Form Group (birthday)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputBirthday">Ngày Đăng Ký : </label>
                                        <input class="form-control" id="inputBirthday" type="text" name="birthday"
                                            placeholder="Enter your birthday" value="<?php echo $ngaydangky ?>"
                                            disabled>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary btn-icon-split btn-sm mt-2 mb-1"
                                    onclick="window.location='<?php echo $updatetk; ?>'">
                                    <span style="display: flex; align-items: center;" class="icon text-white-50">
                                        <i class="fas fa-user-edit"></i>
                                    </span>
                                    <span class="btn btn-primary" style="font-size: 14px;">Cập
                                        Nhật Tài Khoản
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <?php
    include "view/footer.php";
?>