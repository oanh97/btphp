<?php
require("v_header_admin.php");
?>

<form method="post" action="?page=productAdmin&action=update" enctype="multipart/form-data"> <!-- Bổ sung khi có upload file -->
<table>
    <tr>
        <td>Tên sản phẩm</td>
        <td><input type="text" name="name" value="<?=$product['name'] ?>" /></td>
    </tr>
    <tr>
        <td>Loại sản phẩm</td>
        <td><select name="productTypeId">
                <option value="0">--Loại sản phẩm--</option>  
            <?php foreach($productTypes as $productType) { ?>
                <option <?php if($productType['id'] == $product['productTypeId']) { ?> 
                            selected="1"
                        <?php } ?>
                    value="<?=$productType['id']?>"><?=$productType['name']?></option>            
            <?php } ?>
        
        </select></td>
    </tr>
    <tr>
        <td>Mô tả</td>
        <td><input type="text" name="description" value="<?=$product['description'] ?>" /></td>
    </tr>
    <tr>
        <td>Hình minh họa</td>
        <td><input type="file" name="image" /></td>
    </tr>
    <tr>
        <td>Giá cả</td>
        <td><input type="text" name="price" value="<?=$product['price'] ?>" /></td>
    </tr>
    <tr>
        <td>Số lượng</td>
        <td><input type="text" name="quantity" value="<?=$product['quantity'] ?>" /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="productType" value="Sửa đổi" /></td>
    </tr>
</table>
        <input type="hidden" name="productId" value="<?=$product['id'] ?>" />
</form>

<?php
require("v_footer.php");
?>