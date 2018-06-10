<?php
require("v_header.php");
?>
    <div>
        <table width="100%" border="1" class="productGrid">
        <?php if($productList) { $i=0;  foreach($productList as $product) {            
            if($i % 5 == 0) echo "<tr>";
            $i++;
        ?>
            <td class="productCell">
                <span class="productName"><a href="?page=productDetail&id=<?=$product['id']?>"><?=$product["ten"]?></a></span>
                <span class="productPrice"><?=$product['dongia']?></span>
                <span class="productImage"><a href="?page=productDetail&id=<?=$product['id']?>"><img width="60px" src="<?=$product['hinhanh']?>" /></a></span>
                
            </td>
        <?php 
            if($i % 5 == 0) echo "</tr>";
        }
        } else { 
            echo "Chưa có sản phẩm nào !";
            }
        ?>


        </table>    
    </div>









<?php
require("v_footer.php");
?>