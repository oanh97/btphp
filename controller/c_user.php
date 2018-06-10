<?php
include("./models/m_function.php");
include("./models/m_user.php");

$models = new m_users();
$users = $models->selectAll();

require("./views/v_user.php");

?>