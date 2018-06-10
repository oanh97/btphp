<?php
include("./models/m_product.php");
$models = new m_product();

$productTypes = $models->selectAllProductTypes();

@session_start();
$invoices = $models->selectInvoiceByUser($_SESSION['userId']);
include("./views/v_yourInvoice.php");
?>