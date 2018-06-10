<?php
include("./models/m_function.php");
include("./models/m_product.php");

$models = new m_product();
$productTypes = $models->selectAllProductTypes();


$productTypeId = null;
if(!empty($_GET['typeId']))
{
    $productTypeId = $_GET['typeId'];
}
$productList = $models->selectAllProduct($productTypeId);

require("./views/v_productList.php");

?>