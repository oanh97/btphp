<?php
include("./models/m_userAdmin.php");
$models = new m_userAdmin;



if(!empty($_GET['mode']))    
{
    $mode = $_GET['mode'];
    switch($mode)
    {
        case "add":
            require("./views/v_userAdminInsert.php");
            break;        
        case "edit":
            $user = $models->selectOneUsers($_GET['userId']);
            if($user)
            {
                require("./views/v_userAdminUpdate.php");
            }
            break;        
        case "delete":
            if(!empty($_GET['userId']))
            {
                $id = $_GET['userId'];
                $result = $models->deleteUser($id);
                 
                echo "<meta charset='utf-8' /> alert('Xóa thành công');</script>";
                echo "<script>window.location.href='index.php?page=userAdmin';</script>";
            }
    }
}
else if(!empty($_GET['action']))
{
    $action = $_GET['action'];
    switch($action)
    {
        case "insert":
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            
            $insert = $models->insertUser($username, $password, $email);
            if($insert)
            {
                echo "<meta charset='utf-8' /> <script>alert('Thêm mới thành công')</script>";
                echo "<script>window.location.href='index.php?page=userAdmin'</script>";
                
            }
            break;
            
        case "update":
            $username = $_POST['username'];
            $password = $_POST['password'];
            $id = $_POST['id'];
            $email = $_POST['email'];
            
            $update = $models->updateUser($id, $username, $password, $email);
            if($update)
            {
                echo "<meta charset='utf-8' /> <script>alert('Sửa thành công')</script>";
                echo "<script>window.location.href='index.php?page=userAdmin';</script>";
            }
            break;      
        

    }
}
else
{
    $users = $models->selectAllUsers();
    require("./views/v_userAdmin.php");
}



?>