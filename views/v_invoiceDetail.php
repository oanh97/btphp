<?php
require("v_header.php");
?>
<table class="gridList" border="1">
    <tr class="heading">
        <td>STT</td>
        <td>Hàng hóa</td>
        <td>Số lượng</td>
        <td>Đơn giá</td>
        <td>Thành tiền</td>
    </tr>
    <?php
    

        $i = 1;
        foreach($products as $product)
        {        
    ?>
    <tr class="<?php echo ($i%2 == 0)?"odd":"even";   ?>">
        <td><?=$i++ ?></td>
        <td><?=$product['name'] ?></td>
        <td><?=$product['quantity'] ?></td>
        <td><?=$product['price'] ?></td>
        <td><?=$product['quantity']*$product['price']?></td>
    </tr>
    <?php }  ?>
</table>

<?php
require("v_footer.php");
?>