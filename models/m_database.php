<?php
class database
{
	var $connection = null;
 
    function connect()
    {
        require("./config.php");
        if($this->connection == null)
        {
            $this->connection = mysqli_connect($hostname,$dbuser,$dbpass,$dbname);
            if(!$this->connection)
    		{
    			die("Trang web đang bảo trì, vui lòng quay lại sau !");
    		}
            else    mysqli_query($this->connection,'set names utf8');
        }
    }
    
    function disconnect()
    {
        mysqli_close($this->connection);
        $this->connection = null;
    }
    
    function select_all_query($sql)
    {
        if($sql != '')
        {
            $this->connect();
            $list = mysqli_query($this->connection,$sql);
            $result = array();
            if( mysqli_num_rows($list) > 0)
            {
                while($row = mysqli_fetch_array($list,MYSQLI_ASSOC))
                {
                    $result[] = $row;
                }            
                $this->disconnect();
                return $result;
            }
            else
            {
                return false;
            }
        }
    }
    
    function select_query($sql)
    {
        if($sql != '')
        {
            $this->connect();
            $list = mysqli_query($this->connection,$sql);
            $result = array();
            if(mysqli_num_rows($list) > 0)
            {
                while($row = mysqli_fetch_array($list,MYSQLI_ASSOC))
                {
                    $result[] = $row;
                }            
                $this->disconnect();
                return $result[0];
            }
            else
            {
                return false;
            }
        }
    }
    
    function execute_query($sql)
    {
        if($sql != '')
        {
            $this->connect();
            $execute = mysqli_query($this->connection,$sql);
            if($execute)
            {
                $this->disconnect();
                return true;
            }
            else
                return false;
            
        }
    }
    
    

}
?>