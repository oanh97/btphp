<?php
require("v_header.php");
?>
    <div>
        <table width="100%" border="1" class="productT">
        <?php if($productType) { $i=0;  foreach($productType as $product) {            
            if($i % 1 == 0) echo "<tr>";
            $i++;
        ?>
            <td class="productCell">
                <span class="productName"><a href="?page=productDetail&id=<?=$product['id']?>"><?=$product["name"]?></a></span>
                
            </td>
        <?php 
            if($i % 5 == 0) echo "</tr>";
        }
        } else { 
            echo "Chưa có người dùng nào !";
            }
        ?>


        </table>    
    </div>









<?php
require("v_footer.php");
?>