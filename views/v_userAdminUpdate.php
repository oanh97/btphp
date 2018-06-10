<?php
require("v_header_admin.php");
?>

<form method="post" action="?page=userAdmin&action=update" enctype="multipart/form-data"> <!-- Bổ sung khi có upload file -->
<table>
    <tr>
        <td>Tên đăng nhập</td>
        <td><input type="text" name="username" value="<?=$user['username'] ?>" /></td>
    </tr>
    <tr>
        <td>Pass</td>
        <td><input type="text" name="password" value="<?=$user['password'] ?>" /></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" name="email" value="<?=$user['email'] ?>" /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="user" value="Sửa đổi" /></td>
    </tr>
</table>
        <input type="hidden" value="<?=$user['id'] ?>" name="id" />
</form>

<?php
require("v_footer.php");
?>