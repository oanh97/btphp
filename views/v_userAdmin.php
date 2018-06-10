<?php
require("v_header_admin.php");
?>

<table class="gridList" border="1">
    <tr class="heading">
        <td>STT</td>
        <td>Tên đăng nhập</td>
        <td colspan="2">Xử lý</td>
    </tr>
    <?php $i = 0; foreach($users as $user) { ?>
    <tr class="<?php echo ($i%2 == 1)?"odd":"even";   ?>">
        <td><?=++$i?></td>
        <td><?=$user['username'] ?></td>
        <td><a href="?page=userAdmin&mode=edit&userId=<?=$user['id']?>">Sửa</a></td>
        <td><a href="?page=userAdmin&mode=delete&userId=<?=$user['id']?>">Xóa</a></td>
    </tr>
    <?php } ?>
    <tr class="<?php echo ($i%2 == 1)?"odd":"even";   ?>">
        <td colspan="4" align="right" ><a href="?page=userAdmin&mode=add">Thêm mới</a></td>
    </tr>
</table>

<?php
require("v_footer.php");
?>