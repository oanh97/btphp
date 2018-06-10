<?php
include_once('./models/m_product.php');
$models = new m_product();
$productTypes = $models->selectAllProductTypes();

require("./views/v_admin.php");


?>