<?php
require("v_header.php");
?>

    <table class="productDetail">
        <tr>
            <td rowspan="4" class="productImage"><img src="<?=$product['hinhanh']?>" /></td>
        </tr>
                        
        <tr>
            <td class="productName"><?=$product["ten"]?></td>
        </tr>
        <tr>
            <td class="productPrice">Giá bán: <?=$product["dongia"]?></td>
        </tr>
        
        <tr>
            <td class="productStatus">Trạng thái: <?php if($product["soluong"] > 0) echo "Còn hàng"; else echo "Hết hàng"; ?></td>
        </tr>
        <tr>
            <form method="post" action="?page=your-cart&action=add-to-cart" >
                <td class="add-to-cart">                
                    Số lượng: <input type="text" name="product[add-quantity]" value="1" /> <!-- Truyền biến với mảng trong HTML -->
                    <input type="submit" class="add-to-cart-submit" value="Đặt hàng" />
    
                </td>
                <input type="hidden" name="product[id]" value="<?=$product["id"]?>" />
                <input type="hidden" name="product[dongia]" value="<?=$product["dongia"]?>" />
                <input type="hidden" name="product[ten]" value="<?=$product["ten"]?>" />
            </form>    
        </tr>
        

    </table>

    
<?php
require("v_footer.php");
?>