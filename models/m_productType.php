<?php
class m_productType
{
    function m_productType()
    {
        include_once('m_database.php');
    }
    
    function selectAll()
    {
        $con = new database();
        $sql = "SELECT * FROM mis_product_types";
        $result = $con->select_all_query($sql);
        if($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
    
    
 
}
 ?>