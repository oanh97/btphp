<?php
class m_users
{
    function m_users()
    {
        include_once('m_database.php');
    }
    
    function selectAll()
    {
        $con = new database();
        $sql = "SELECT * FROM users";
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
    
    function insert($username, $pass, $email)
    {
        $con = new database();
        $sql = 'SELECT * FROM users WHERE username ="'.$username.'" or email ="'.$email.'"';
        $result = $con->select_all_query($sql);
        if(!$result)
        {
            $sql1 = "INSERT INTO users(`username`, `pass`, `email`) values(";
            $sql1 .= "'".$username."',";
            $sql1 .= "'".md5($pass)."',";
            $sql1 .= "'".$email."')";
            $result = $con->execute_query($sql1);
            return true;
        }
        else
        {
            return false;
        }  
    }
    
    function login($username, $pass)
    {
        $con = new database();
        $sql = 'SELECT * FROM users WHERE username = "'.$username.'" and pass = "'.md5($pass).'"';
        $result = $con->select_query($sql);
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