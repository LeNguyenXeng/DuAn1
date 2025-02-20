<?php
 extract($onesp);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product Detail</title>

    <?php
     include "view/header.php";
?>
    <!-- Product -->
    <hr style="margin-top: 84px">
    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-20 p-lr-0-lg">
            <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="index.php?act=shop" class="stext-109 cl8 hov-cl1 trans-04">
                Shop
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                <?php echo $tensp ?>

            </span>
        </div>
    </div>


    <!-- Product Detail -->
    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                <div class="item-slick3" data-thumb="./resources/assets/img/product-detail-01.jpg">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="./upload/<?=$anhsp?>" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                            href="./upload/<?=$anhsp?>">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14" style="font-family: Poppins">
                            <?php echo $tensp ?>

                        </h4>

                        <span class="mtext-106 cl2">
                            <?php echo  number_format($gia, 0, '', ','). '₫';  ?>
                        </span>
                        <br>
                        <div style="display: flex;gap: 8px;margin-top: 20px; font-size: 15px;">
                            <span style="font-family: Poppins">Số lượng kho: </span>
                            <p class=" cl2" style="font-family: Poppins">
                                <?php echo number_format($soluong, 0, '', '.'). ' sản phẩm';  ?>
                            </p>
                        </div>

                        <p style="font-family: Poppins-Regular, sans-serif; font-size: 14px; line-height: 1.7;"
                            class=" cl3 p-t-23">
                            <?php echo $mota ?>
                        </p>
                        <!--  -->
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">
                                    Size
                                </div>

                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2" name="time">
                                            <option>Chọn Size</option>
                                            <option>Size S</option>
                                            <option>Size M</option>
                                            <option>Size L</option>
                                            <option>Size XL</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">
                                    Color
                                </div>

                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2" name="time">
                                            <option>Chọn Màu</option>
                                            <option>Đỏ</option>
                                            <option>Xanh</option>
                                            <option>Trắng</option>
                                            <option>Xám</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        

                                        <input class="mtext-104 cl3 txt-center num-product" type="number"
                                            name="num-product" value="1">

                                        
                                    </div> -->
                            <?php
                    echo' <form action="index.php?act=shoppingcart" method="post" >
                        <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 respon6-next">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>
                                        <input class="mtext-104 cl3 txt-center num-product" type="number"
                                            name="num-product" value="1" min="1" max="'.$soluong.'">
                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                            <input type="hidden" name="hinh" value="' . $anhsp . '"> <!-- Thêm dòng này -->
                                <input type="hidden" name="id_sp" value="' . $id_sp . '">
                                <input type="hidden" name="tensp" value="' . $tensp . '">
                                <input type="hidden" name="gia" value="' . $gia . '">
                                <button type="submit" name="addtocart" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15" style="cursor:pointer">
                                    Thêm vào giỏ hàng
                                </button>
                            </form>';

                        ?>

                        </div>
                    </div>
                </div>

                <!--  -->
                <div class=" flex-w flex-m p-l-100 p-t-40 respon7">
                    <div class="flex-m bor9 p-r-10 m-r-11">
                        <a href="index.php?act=shoppingcart" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </a>
                    </div>

                    <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                        onclick="window.open('https://www.facebook.com/streetweareazy')" data-tooltip="Facebook">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                        onclick="window.open('https://www.instagram.com/swe.vn?fbclid=IwZXh0bgNhZW0CMTAAAR2eVGEt-mSt9nCtCppMc2zQ8ZbeJ8wahw8I2NEeQKGtOoWw5Fv3cL4uADU_aem_C9l3HfbUojAv2xgfsw2asw')"
                        data-tooltip="Instagram">
                        <i class="fa fa-instagram"></i>
                    </a>

                    <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                        onclick="window.open('https://www.behance.net/lenguyenxeng')" data-tooltip="Behance">
                        <i class="fa fa-behance"></i>
                    </a>
                </div>
            </div>
        </div>
        </div>

        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Mô
                            Tả</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Đánh Giá</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                                <?php echo $mota ?>
                        </div>
                    </div>


                    <!-- - -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm">
                                    <!-- Review -->
                                    <div class="flex-w flex-t">
                                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                            <img src="./resources/assets/img/avatar-01.jpg" alt="AVATAR">
                                        </div>

                                        <?php 
                                        //     foreach ($listbl as $binhluan) {
                                        //         extract($binhluan);
                                        //         echo '<div class="size-207">
                                        //     <div class="flex-w flex-sb-m p-b-17">
                                        //         <span class="mtext-107 cl2 p-r-20">
                                        //             Xèng
                                        //         </span>

                                        //         <span class="fs-18 cl11">
                                        //             <i class="zmdi zmdi-star"></i>
                                        //             <i class="zmdi zmdi-star"></i>
                                        //             <i class="zmdi zmdi-star"></i>
                                        //             <i class="zmdi zmdi-star"></i>
                                        //             <i class="zmdi zmdi-star-half"></i>
                                        //         </span>
                                        //     </div>

                                        //     <p class="stext-102 cl6">
                                        //         Sản phẩm đẹp, chất liệu áo tốt. Cho shop 5 sao, lần sau sẽ
                                        //         ủng hộ
                                        //         tiếp. Chất lượng là số 1!!
                                        //     </p>
                                        // </div>';
                                        //     }

                                        if (is_array($listbl) || is_object($listbl)) {
                                            foreach ($listbl as $binhluan) {
                                                extract($binhluan);
                                                echo '<div class="size-207">
                                                <div class="flex-w flex-sb-m p-b-17">
                                                    <span class="mtext-107 cl2 p-r-20">
                                                        Xèng
                                                    </span>
    
                                                    <span class="fs-18 cl11">
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star-half"></i>
                                                    </span>
                                                </div>
    
                                                <p class="stext-102 cl6">
                                                    Sản phẩm đẹp, chất liệu áo tốt. Cho shop 5 sao, lần sau sẽ
                                                    ủng hộ
                                                    tiếp. Chất lượng là số 1!!
                                                </p>
                                            </div>';
                                            }
                                        } else {
                                            echo '<p>Không có bình luận nào.</p>';
                                        }
                                        ?>
                                    </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Related Products -->
    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Related Products
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">
                    <?php
 foreach  ($spnew as $sp) {
    extract($sp); 
    $hinh=$img_path.$anhsp; 
    $gia = number_format($gia, 0, '', ','). '₫'; 
    echo '
     <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src='.$hinh.' alt="IMG-PRODUCT">

                    <a href="index.php?act=shoppingcart"
                        class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
                        Add To Cart
                    </a>
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                       <a href="index.php?act=productdetail&idsp='.$id_sp.'" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            '.$tensp.'
                    </a>

                    <span class="stext-105 cl3">
                       '.$gia.'
                    </span>
                </div>
            </div>
        </div>
        </div>';
        }
        ?>

                </div>
            </div>
        </div>
        </div>
    </section>


    <?php
     include "view/footer.php";
?>