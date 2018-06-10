<?php
include_once('./models/m_function.php');
include_once('./models/m_product.php');
$models = new m_product();
$productTypes = $models->selectAllProductTypes();

if(!empty($_GET['action']))
{
    $action = $_GET['action'];
    switch ($action)
    {
        case 'insert':
            $username = $_POST['username'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];
            
            include_once('./models/m_user.php');
            $insert = new m_users;
            if($insert->insert($username, $pass, $email))
            {
                require("./views/v_register_success.php");
            }
            else
            {
                require("./views/v_register.php");
                echo "<script>alert('Tên hoặc email đã tồn tại !');</script>";
                
            }
            break;
    }
    
    
}
else
{
    require("./views/v_register.php");
}

?>