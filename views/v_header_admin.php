<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="./css/style.css" rel="stylesheet" type="text/css">
    <link href="./css/jquery.bxslider.css" rel="stylesheet" type="text/css">
    <script src="./lib/jquery-1.9.1.min.js"  type="text/javascript"></script>
    <script src="./lib/jquery.bxslider.min.js"  type="text/javascript"></script>
    <title>Gian hàng của tôi</title>
</head>
<body>
    <div class="banner">
        <img alt="Ảnh banner ở đây" src="./image/banner.png" width="100%" />
    </div>
    <div class="navigation">
        <ul>
            <li><a href="?page=home">Trang chủ</a></li>
            <li><a href="?page=introduction">Giới thiệu</a></li>
            <li><a href="?page=productList">Sản phẩm</a></li>
            <li><a href="?page=newsList">Tin tức</a></li>
            <li><a href="?page=contact">Liên hệ</a></li>
            <?php @session_start(); if(!empty($_SESSION['isAdmin']) and $_SESSION['isAdmin'] == 1) { ?>
            <li><a href="?page=admin">Quản trị</a></li>
            <?php } else { ?>
            <script>alert('Bạn không được phép vào trang này !'); window.location.href = "http://localhost:81/mystore/index.php";</script>
            <?php } ?>
        </ul>
        
        
    </div>    
    <div class="main">
        <div class="left">
            <div class="vertical">
                 <ul>
                        <li><span>Danh mục quản trị</span></li>                    
                        <li><a href="?page=productTypeAdmin">Loại hàng hóa</a></li>
                        <li><a href="?page=productAdmin">Hàng hóa</a></li> 
                        <li><a href="?page=userAdmin">Người dùng</a></li>  
                        <li><a href="?page=newsAdmin">Tin tức</a></li>            

                </ul>
                <ul>
                        <li><span>Tài khoản</span></li>
                        <?php  if(!empty($_SESSION['login']) and $_SESSION['login'] == 1 ) {    ?>                    
                            <li><a >Xin chào bạn<br /> <?=$_SESSION["username"]  ?></a></li>
                            <li><a href="?page=login&action=logout" >Đăng xuất</a></li>
                        <?php } else {    ?>  
                            <li><a href="?page=login&">Đăng nhập</a></li>
                            <li><a href="?page=register">Đăng ký</a></li> 
                        <?php  } ?>        
                </ul>
            </div>
            
            
        </div>
        <div class="center">

