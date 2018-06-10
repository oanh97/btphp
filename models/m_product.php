<?php
class m_product
{
    function m_product()
    {
        include_once("m_database.php");        
    }
    
    function selectAllProductTypes()
    {
        $con = new database();
        $sql = "SELECT * FROM loaihang";
        $result = $con->select_all_query($sql);
        return $result;
    }
    
    function selectOneProductTypes($id)
    {
        $con = new database();
        $sql = "SELECT * FROM loaihang WHERE id=".$id;
        $result = $con->select_query($sql);
        return $result;
    }
    
    function insertProductType($tenhang=null)
    {
        $con = new database();
        $sql = "INSERT INTO loaihang(`tenhang`) values(";
        $sql .= "'".$tenhang."')";
        
        $result = $con->execute_query($sql);
        return $result;
    }
    
    function updateProductType($id, $tenhang=null)
    {
        $con = new database();
        $sql = "UPDATE loaihang SET ";
        $sql .= "`tenhang` = '".$tenhang."',";
        
        $sql .= " WHERE id =".$id;

        $result = $con->execute_query($sql);
        return $result;
    }
    
    function deleteProductType($id)
    {
        $con = new database();
        $sql = "DELETE FROM loaihang WHERE id = ".$id;
        $result = $con->execute_query($sql);
        return $result;
    }
    
    function selectAllProduct($maloaihang = null)
    {
        $con = new database();
        $sql = "SELECT * FROM hang WHERE 1";
        if($maloaihang != null)
        {
            $sql .= " AND maloaihang = ". $maloaihang;
        }
        $result = $con->select_all_query($sql);   
        return $result;
    }
    
    function selectOneProduct($mahang)
    {
        $con = new database();      
        $sql = "SELECT * FROM hang WHERE id = ".$mahang;
        $result = $con->select_query($sql);        
        return $result;
    }
    
    function insertProduct($ten=null, $dongia=null, $soluong=null, $hinhanh=null, $maloaihang)
    {
        $con = new database();
        @session_start();
        $sql = "INSERT INTO hang(`ten`, `dongia`, `soluong`, `hinhanh`, `maloaihang`) values(";
        $sql .= "'".$ten."',";
       
        $sql .= "'".$dongia."',";
        $sql .= "'".$soluong."',";
        $sql .= "'".$hinhanh."',";
        $sql .= "'".$maloaihang."',";
        $sql .= "'".$_SESSION['userId']."')";
        print_r($sql);
        $result = $con->execute_query($sql);
        return $result;
    }
    
    function updateProduct($id, $ten=null, $dongia=null, $soluong=null, $hinhanh=null, $maloaihang)
    {
        $con = new database();
        @session_start();
        $sql = "UPDATE hang SET ";
        $sql .= "`ten` = '".$ten."',";
       
        $sql .= "`dongia` = '".$dongia."',";
        $sql .= "`soluong` = '".$soluong."',";
        // $sql .= "`lastModifiedBy` = '".$_SESSION['userId']."',";
        $sql .= "`maloaihang` = '".$maloaihang."',";
        $sql .= "`hinhanh` = '".$hinhanh."'";
        $sql .= " WHERE id =".$id;

        $result = $con->execute_query($sql);
        return $result;
    }
    
    function deleteProduct($id)
    {
        $con = new database();
        $sql = "DELETE FROM hang WHERE id = ".$id;
        $result = $con->execute_query($sql);
        return $result;
    }
    
    function addToCart($product = array())
    {
        @session_start();
        if($_SESSION['login'] == 1)
        {
            $_SESSION['cart']['products'][] = array(
                'id' => $product['id'],
                'ten' => $product['ten'],
                'dongia' => $product['dongia'],
                'add-quantity' => $product['add-quantity']
            );
            $_SESSION['cart']['buying-quantities'] += $product['add-quantity'];
            
            return true;
        }
        else
            return false;
    }
    
    function insertInvoice()
    {
        $con = new database();
        @session_start();
        if($_SESSION['cart']['buying-quantities'] > 0)
        {
            $invoiceCode = $_SESSION['userId']."-".time();
            $sql = "INSERT INTO hoadon(mahoadon, ngaytao) VALUES(";
            $sql .= "'".$mahoadon."',";
            $sql .= "'".$_SESSION['userId']."')";            
            
            if($con->execute_query($sql))
            {
                //Lấy ID của invoice vừa tạo:
                $sql1 = "SELECT id FROM hoadon WHERE mahoadon = '".$mahoadon."'";
                $invoice = $con->select_query($sql1);
                
                //Tạo các chi tiết đơn hàng:
                $sql2 = "INSERT INTO hdchitiet(mahoadon, mahang, soluong, dongia, ngaytao) VALUES";
                $i = 0;
                foreach($_SESSION['cart']['products'] as $cart)
                {
                    $i++;
                    $sql2 .= "('".$invoice['id']."','".$cart['id']."','".$cart['add-quantity']."','".$cart['dongia']."','".$_SESSION['userId']."')";
                    if($i < sizeof($_SESSION['cart']['products']))
                    {
                        $sql2 .= ",";
                    }
                }
                if($con->execute_query($sql2))
                {
                    //Nếu thêm đơn hàng thành công thì phải hủy các session lưu đơn hàng tạm thời đi.
                    unset($_SESSION['cart']);
                    $_SESSION['cart']['products'] = array();
                    $_SESSION['cart']['buying-quantities'] = 0;
                    return true;
                }
                else return false;
                
                
            }
            
        }
    }
    
    function selectInvoiceByUser($userId)
    {
        $con = new database();
        $sql = "SELECT hoadon.*, sum(hdchitiet.dongia*hdchitiet.soluong) as total
        FROM hoadon INNER JOIN hdchitiet ON 
        hoadon.mahoadon = hdchitiet.mahoadon 
        WHERE hoadon.ngaytao = ".$userId." GROUP BY hdchitiet.mahoadon";

        $result = $con->select_all_query($sql);
        return $result;

    }
    
    function selectInvoiceDetailByInvoice($mahoadon)
    {
        $con = new database();
        $sql = "SELECT hdchitiet.*, hang.ten FROM hdchitiet
        INNER JOIN hang ON hchitiet.mahang = hang.id 
         WHERE mahoadon = ".$mahoadon;

        $result = $con->select_all_query($sql);
        return $result;

    }
    

}


?>