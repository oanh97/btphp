<?php
include("./models/m_function.php");
include("./models/m_productType.php");

$models = new m_productType();
$productType = $models->selectAll();

require("./views/v_productType.php");

?>