<?php
require("v_header.php");
?>
    <div>
        <table width="100%" border="1" class="userGrid">
        <?php if($users) { $i=0;  foreach($users as $user) {            
            if($i % 5 == 0) echo "<tr>";
            $i++;
        ?>
            <td class="userCell">
                <span class="userName"><a href="?page=userDetail&id=<?=$user['id']?>"><?=$user["username"]?></a></span>
                <span class="userEmail"><?=$user["email"]?></a></span>
              
                

                <span class="userpassword"><?=$user["pass"]?></a></span>
    
                
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