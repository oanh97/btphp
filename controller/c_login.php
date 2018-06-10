<?php
include_once('./models/m_product.php');
$models = new m_product();
$productTypes = $models->selectAllProductTypes();
session_start(); 
if(!empty($_GET['action']))
{
    $action = $_GET['action'];
    switch ($action)
    {
        case 'login':
            $username = $_POST['username'];
            $pass = $_POST['pass'];
            
            include_once('./models/m_user.php');
            $user = new m_users;
            $row = $user->login($username, $pass);

            if($row)
            {   //Khởi tạo các session cần thiết

                $_SESSION['login'] = 1; // Đánh dấu là đã đăng nhập
                $_SESSION['cart']['products'] = array(); //Khai báo session giỏ hàng
                $_SESSION['cart']['buying-quantities'] = 0; //Đếm số lượng hàng hóa hiện thời đang định mua
                
                //Lưu một số thông tin cần thiết của người đang đăng nhập
                $_SESSION['username'] = $row['username'];
                $_SESSION['userId'] = $row['id'];
                $_SESSION['isAdmin'] = $row['isAdmin'];
                

                echo "<meta charset='utf-8' /> <script>alert('Đăng nhập thành công !')</script>";
                echo "<script>window.location.href = 'http://localhost:81/mystore/index.php'</script>";   
          

            }
            else
            {
                require("./views/v_login.php");
                echo " <meta charset='utf-8' /> <script>alert('Tên hoặc mật khẩu không tồn tại !')</script>";
            }
            break;
        case 'logout':
 
            session_destroy();
            echo "<script>window.location.href = 'http://localhost:81/btlweb/index.php'</script>";  
            break;
    }
    
    
}
else if(empty($_SESSION['login']))
{
    require("./views/v_login.php");
}
else
{
    require("./views/v_index.php");
}

?>