<?php
include("./models/m_product.php");
include("./models/m_function.php");
$models = new m_product();
$productTypes = $models->selectAllProductTypes();




if(!empty($_GET["id"]))
{
    $mahang = $_GET["id"];
    $product = $models->selectOneProduct($mahang);
    require("./views/v_productDetail.php");
}
else
{
    require("./views/v_index.php");
}



?>