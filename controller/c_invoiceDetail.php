<?php
include("./models/m_product.php");
$models = new m_product();

$productTypes = $models->selectAllProductTypes();

if(!empty($_GET['invoiceId']))
{
    $products = $models->selectInvoiceDetailByInvoice($_GET['invoiceId']);
    include("./views/v_invoiceDetail.php");
}
?>