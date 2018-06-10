<?php
include("./models/m_product.php");
$models = new m_product();

$productTypes = $models->selectAllProductTypes();


if(!empty($_GET['action']))
{
    $action = $_GET['action'];
    switch($action)
    {
        case "add-to-cart":
            $product = $_POST['product'];
            if(is_array($product))
            {
                if($models->addToCart($product))
                {
                    echo "<meta charset='utf-8' /> <script>alert('Đã thêm vào giỏ hàng ');</script>";
                    echo "<script>window.location.href = 'index.php?page=productList'</script>";
                    
                }
            }
            break;
        case "insertInvoice":
            @session_start();
            if($_SESSION['cart']['buying-quantities'] > 0)
            {
                if($models->insertInvoice())
                {
                    echo "<meta charset='utf-8' /> <script>alert('Đã thêm đơn hàng thành công ! ');</script>";
                    echo "<script>window.location.href = 'index.php?page=your-invoice'</script>";
                }
                else
                {
                    echo "<meta charset='utf-8' /> <script>alert('Thất bại ! ');</script>";
                }
            }
                    

            break;
        default: break;
    }
}
else
{
    require("./views/v_yourCart.php");
}



?>