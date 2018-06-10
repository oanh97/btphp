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
    
    if($_SESSION['cart']['buying-quantities'] > 0) {
     $carts = $_SESSION['cart']['products'];
        $i = 1;
        foreach($carts as $cart)
        {        
    ?>
    <tr class="<?php echo ($i%2 == 0)?"odd":"even";   ?>">
        <td><?=$i++ ?></td>
        <td><?=$cart['ten'] ?></td>
        <td><?=$cart['add-quantity'] ?></td>
        <td><?=$cart['dongia'] ?></td>
        <td><?=$cart['add-quantity']*$cart['dongia']?></td>
    </tr>
    <?php }  ?>
</table>
    <a class="purchase" href="?page=your-cart&action=insertInvoice">Mua hàng !</a>


    <?php } else {
    ?>
    Bạn chưa mua sản phẩm nào !
    
    <?php }  ?>





<?php
require("v_footer.php");
?>