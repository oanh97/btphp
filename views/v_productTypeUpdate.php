<?php
require("v_header_admin.php");
?>

<form method="post" action="?page=productTypeAdmin&action=update" enctype="multipart/form-data"> <!-- Bổ sung khi có upload file -->
<table>
    <tr>
        <td>Loại sản phẩm</td>
        <td><input type="text" name="name" value="<?=$productType['name'] ?>" /></td>
    </tr>
    <tr>
        <td>Mô tả</td>
        <td><input type="text" name="description" value="<?=$productType['description'] ?>" /></td>
    </tr>
    <tr>
        <td>Hình minh họa</td>
        <td><input type="file" name="image" /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="productType" value="Sửa đổi" /></td>
    </tr>
</table>
        <input type="hidden" value="<?=$productType['id'] ?>" name="id" />
</form>

<?php
require("v_footer.php");
?>