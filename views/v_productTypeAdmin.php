<?php
require("v_header_admin.php");
?>

<table class="gridList" border="1">
    <tr class="heading">
        <td>STT</td>
        <td>Loại hàng hóa</td>
        <td colspan="2">Xử lý</td>
    </tr>
    <?php $i = 0; foreach($productTypes as $productType) { ?>
    <tr class="<?php echo ($i%2 == 1)?"odd":"even";   ?>">
        <td><?=++$i?></td>
        <td><?=$productType['name'] ?></td>
        <td><a href="?page=productTypeAdmin&mode=edit&productTypeId=<?=$productType['id']?>">Sửa</a></td>
        <td><a href="?page=productTypeAdmin&mode=delete&productTypeId=<?=$productType['id']?>">Xóa</a></td>
    </tr>
    <?php } ?>
    <tr class="<?php echo ($i%2 == 1)?"odd":"even";   ?>">
        <td colspan="4" align="right" ><a href="?page=productTypeAdmin&mode=add">Thêm mới</a></td>
    </tr>
</table>

<?php
require("v_footer.php");
?>