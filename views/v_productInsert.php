<?php
require("v_header_admin.php");
?>

<form method="post" action="?page=productAdmin&action=insert" enctype="multipart/form-data"> <!-- Bổ sung khi có upload file -->
<table>
    <tr>
        <td>Tên sản phẩm</td>
        <td><input type="text" name="name" /></td>
    </tr>
    <tr>
        <td>Loại sản phẩm</td>
        <td><select name="productTypeId">
                <option value="0">--Loại sản phẩm--</option>  
            <?php foreach($productTypes as $productType) { ?>
                <option value="<?=$productType['id']?>"><?=$productType['name']?></option>            
            <?php } ?>
        
        </select></td>
    </tr>
    <tr>
        <td>Mô tả</td>
        <td><input type="text" name="description" /></td>
    </tr>
    <tr>
        <td>Hình minh họa</td>
        <td><input type="file" name="image" /></td>
    </tr>
    <tr>
        <td>Giá cả</td>
        <td><input type="text" name="price" /></td>
    </tr>
    <tr>
        <td>Số lượng</td>
        <td><input type="text" name="quantity" /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="productType" value="Thêm mới" /></td>
    </tr>
</table>
    
</form>

<?php
require("v_footer.php");
?>