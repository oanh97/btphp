<?php
require("v_header_admin.php");
?>

<form method="post" action="?page=userAdmin&action=insert" enctype="multipart/form-data"> <!-- Bổ sung khi có upload file -->
<table>
    <tr>
        <td>Tên đăng nhập</td>
        <td><input type="text" name="username" /></td>
    </tr>
    <tr>
        <td>Pass</td>
        <td><input type="text" name="password" /></td>
    </tr>
    <tr>
        <td>email</td>
        <td><input type="text" name="email" /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="user" value="Thêm mới" /></td>
    </tr>
</table>
    
</form>

<?php
require("v_footer.php");
?>