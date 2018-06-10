<?php
class m_userAdmin
{
    function m_userAdmin()
    {
        include_once("m_database.php");        
    }
    
    function selectAllUsers()
    {
        $con = new database();
        $sql = "SELECT * FROM mis_users";
        $result = $con->select_all_query($sql);
        return $result;
    }
    
    function selectOneUsers($id)
    {
        $con = new database();
        $sql = "SELECT * FROM mis_users WHERE id=".$id;
        $result = $con->select_query($sql);
        return $result;
    }
    
    function insertUser($username=null, $password=null, $email=null)
    {
        $con = new database();
        $sql = "INSERT INTO mis_users(`username`,`password`, `email`) values(";
        $sql .= "'".$username."',";
        $sql .= "'".$password."',";
        $sql .= "'".$email."')";
        $result = $con->execute_query($sql);
        return $result;
    }
    
    function updateUser($id, $username=null, $password=null, $email=null)
    {
        $con = new database();
        $sql = "UPDATE mis_users SET ";
        $sql .= "`username` = '".$username."',";
        $sql .= "`password` = '".$password."',";
        $sql .= "`email` = '".$email."'";
        $sql .= " WHERE id =".$id;

        $result = $con->execute_query($sql);
        return $result;
    }
    
    function deleteUser($id)
    {
        $con = new database();
        $sql = "DELETE FROM mis_users WHERE id = ".$id;
        $result = $con->execute_query($sql);
        return $result;
    }
    
    
    
    

}


?>