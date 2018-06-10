<?php
include("./models/m_product.php");
$models = new m_product();



if(!empty($_GET['mode']))    
{
    $mode = $_GET['mode'];
    switch($mode)
    {
        case "add":
            $productTypes = $models->selectAllProductTypes();
            require("./views/v_productInsert.php");
            break;        
        case "edit":
            $product = $models->selectOneProduct($_GET['productId']);
            if($product)
            {
                $productTypes = $models->selectAllProductTypes();
                require("./views/v_productUpdate.php");
            }
            break;        
        case "delete":
            if(!empty($_GET['productId']))
            {
                $id = $_GET['productId'];
                $result = $models->deleteProduct($id);
                echo " <meta charset='utf-8' /> alert('Xóa thành công');</script>";
                echo "<script>window.location.href='index.php?page=productAdmin'; alert('Xóa thành công');</script>";
                
                
               
            }
    }
}
else if(!empty($_GET['action']))
{
    $action = $_GET['action'];
    switch($action)
    {
        case "insert":
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $productTypeId = $_POST['productTypeId'];
            $imageURL = '';
            if(!empty($_FILES['image']))
            {
                $new_image_name = "image-".time();
                move_uploaded_file($_FILES["image"]["tmp_name"], "./image/".$new_image_name);                
                $imageURL = "/image/".$new_image_name;
            }
            $insert = $models->insertProduct($name, $description, $imageURL, $price, $quantity, $productTypeId);
            if($insert)
            {
                echo " <meta charset='utf-8' /> <script>alert('Thêm mới thành công')</script>";
                echo "<script>window.location.href='index.php?page=productAdmin'</script>";
                
            }
            break;
            
        case "update":
            $name = $_POST['name'];
            $description = $_POST['description'];
            $id = $_POST['productId'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $productTypeId = $_POST['productTypeId'];
            $imageURL = '';
            if(!empty($_FILES['image']))
            {
                $new_image_name = "image-".time();
                move_uploaded_file($_FILES["image"]["tmp_name"], "./image/".$new_image_name);                
                $imageURL = "/image/".$new_image_name;
            }
            $update = $models->updateProduct($id, $name, $description, $imageURL, $price, $quantity, $productTypeId);
            if($update)
            {
                echo "<meta charset='utf-8' />  alert('Sửa thành công');</script>";
                echo "<script>window.location.href='index.php?page=productAdmin'; alert('Sửa thành công');</script>";
            }
            break;      
        

    }
}
else
{
    $products = $models->selectAllProduct();
    require("./views/v_productAdmin.php");
}



?>