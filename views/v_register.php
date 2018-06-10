<?php
require("v_header.php");
?>
<script>
function checkForm()
{
     var username = document.forms['register']["username"].value;
     var pass = document.forms['register']["pass"].value;
     var confirmPassword = document.forms['register']["confirm"].value;
     var email = document.forms['register']["email"].value;
     
     if(username == '')
     {
        alert('Bạn phải nhập đầy đủ thông tin người dùng');
        document.forms["register"]["username"].focus();
        return false;
     }
     else if(pass == '')
     {
        alert('Bạn phải nhập mật khẩu');
        document.forms["register"]["pass"].focus();
        return false;
     }
     else if(email == '')
     {
        alert('Bạn phải nhập email');
        document.forms["register"]["email"].focus();
        return false;
     }
     else if(pass != confirmPassword)
     {
        alert('Mật khẩu xác nhận chưa khớp !');
        return false;
     }
     else return true;
  
}

</script>
<form method="post" name="register" action="?page=register&action=insert" onsubmit="return checkForm()">
    <table class="register">
        <tr>
            <td>Username:</td>
            <td><input name="username" type="text" /></td>
        </tr> 
        <tr>
            <td>Password:</td>
            <td><input name="pass" type="password" /></td>
        </tr> 
        <tr>
            <td>Confirm password:</td>
            <td><input name="confirm" type="password" /></td>
        </tr>  
        <tr>
            <td>Email:</td>
            <td><input name="email" type="text" /></td>
        </tr> 
        <tr>
            <td></td>
            <td><input type="submit" value="Đăng ký" /></td>
        </tr> 
    </table>
</form>

<?php
require("v_footer.php");
?>