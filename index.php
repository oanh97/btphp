<?php
if(empty($_GET["page"]))
{
    require("controller/c_index.php");
}
else
{
    $page = $_GET["page"];
    switch($page)
    {
        case "productList": //danh sách sản phẩm
            require("controller/c_productList.php");
            break;
        case "productDetail": // chi tiết sản phẩm
            require("controller/c_productDetail.php");
            break;
        case "register": //đăng ký
            require("controller/c_register.php");
            break;
        case "login": //đăng nhập
            require("controller/c_login.php");
            break;
        case "admin"; //trang chủ
            require("controller/c_admin.php");
            break;
        case "productTypeAdmin"; //trang chủ loại sản phẩm
            require("controller/c_productTypeAdmin.php");
            break;
        case "productAdmin"; //trang chủ sản phẩm
            require("controller/c_productAdmin.php");
            break;
        case "userAdmin"; //tải khoản admin
            require("controller/c_userAdmin.php");
            break;
        // case "newsAdmin";
        //     require("controller/c_newsAdmin.php");
        //     break;
        case "your-cart"; //giỏ hàng
            require("controller/c_your-cart.php");
            break;
        case "your-invoice"; //hóa đơn
            require("controller/c_your-invoice.php");
            break;
        case "invoiceDetail"; //chi tiết hóa đơn
            require("controller/c_invoiceDetail.php");
            break;
        case "user"; //tài khoản
            require("controller/c_user.php");
            break; 
         case "productType"; //loại sản phẩm
            require("controller/c_productType.php");
            break;    
        default:
            require("controller/c_index.php");
    }
}



?>
