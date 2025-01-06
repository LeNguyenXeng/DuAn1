<?php
if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
        case "shop":
            include "view/shop.php";
            break;
        case 'shoppingcart':
            include "view/shoppingcart.php";
            break;
        case "about":
            include "view/about.php";
            break;  
        case "contact":
            include "view/contact.php";
            break;

        // Account
        case "login":
            include "view/account/login.php";
            break;
        case "register":
            include "view/account/register.php";
            break;
        case "forgotpassword":
            include "view/account/forgot_password.php";
            break;

        // Product
        case "productdetail":
            include "view/products/product_detail.php";
            break;
        

        // Pay
        case "checkout":
            include "view/pay/checkout.php";
            break;
        case "changeinformation":
            include "view/pay/change_information.php";
            break;
        case "bill":
            include "view/pay/bill.php";
            break;
        case "success":
            include "view/pay/success.php";
            break;
        
    default:
        include "view/home.php";
        break;
    }
}
else{
    include "view/home.php";
}


?>