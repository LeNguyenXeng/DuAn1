<?php
if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
        // Account
        case "listaccount":
            include "view/account/list.php";
            break;
        case "updateaccount":
            include "view/account/update.php";
            break;  
        
        // Product
        case "listproduct":
            include "view/products/list.php";
            break;
        case "addproduct":
            include "view/products/add.php";
            break;
        case "updateproduct":
            include "view/products/update.php";
            break;

        // Category
        case "listcategory":
            include "view/category/list.php";
            break;
         case "addcategory":
            include "view/category/add.php";
            break;
        case "updatecategory":
            include "view/category/update.php";
            break;


        // Comment
        case "listcomment":
            include "view/comment/list.php";
            break;
        
        // Statistical
        case "liststatistical":
            include "view/statistical/list.php";
            break;

         // Statistical
         case "liststatistical":
            include "view/statistical/list.php";
            break;
        
        // Manage
        case "listmanage":
            include "view/manage/list.php";
            break;
        case "editmanage":
            include "view/manage/edit.php";
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