<?php
include("./models/m_product.php");
$models = new m_product();



if(!empty($_GET['mode']))    
{
    $mode = $_GET['mode'];
    switch($mode)
    {
        case "add":
            require("./views/v_productTypeInsert.php");
            break;        
        case "edit":
            $productType = $models->selectOneProductTypes($_GET['productTypeId']);
            if($productType)
            {
                require("./views/v_productTypeUpdate.php");
            }
            break;        
        case "delete":
            if(!empty($_GET['productTypeId']))
            {
                $id = $_GET['productTypeId'];
                $result = $models->deleteProductType($id);
                 
                echo "<meta charset='utf-8' /> alert('Xóa thành công');</script>";
                echo "<script>window.location.href='index.php?page=productTypeAdmin';</script>";
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
            $imageURL = '';
            if(!empty($_FILES['image']))
            {
                $new_image_name = "image-".time();
                move_uploaded_file($_FILES["image"]["tmp_name"], "./image/".$new_image_name);                
                $imageURL = "/image/".$new_image_name;
            }
            $insert = $models->insertProductType($name, $description, $imageURL);
            if($insert)
            {
                echo "<meta charset='utf-8' /> <script>alert('Thêm mới thành công')</script>";
                echo "<script>window.location.href='index.php?page=productTypeAdmin'</script>";
                
            }
            break;
            
        case "update":
            $name = $_POST['name'];
            $description = $_POST['description'];
            $id = $_POST['id'];
            $imageURL = '';
            if(!empty($_FILES['image']))
            {
                $new_image_name = "image-".time();
                move_uploaded_file($_FILES["image"]["tmp_name"], "./image/".$new_image_name);                
                $imageURL = "/image/".$new_image_name;
            }
            $update = $models->updateProductType($id, $name, $description, $imageURL);
            if($update)
            {
                echo "<meta charset='utf-8' /> <script>alert('Sửa thành công')</script>";
                echo "<script>window.location.href='index.php?page=productTypeAdmin';</script>";
            }
            break;      
        

    }
}
else
{
    $productTypes = $models->selectAllProductTypes();
    require("./views/v_productTypeAdmin.php");
}



?>