<?php
include("./models/m_product.php");
$models = new m_product();

$productTypes = $models->selectAllProductTypes();
include("./views/v_index.php");
?>