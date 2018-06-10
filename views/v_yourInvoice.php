<?php
require("v_header.php");
?>
<table class="gridList" border="1">
    <tr class="heading">
        <td>STT</td>
        <td>Mã đơn hàng</td>
        <td>Thành tiền</td>
        <td>Chi tiết</td>

    </tr>
    <?php
    if($invoices) {
        $i = 1;
        foreach($invoices as $invoice)
        {        
    ?>
    <tr class="<?php echo ($i%2 == 0)?"odd":"even";   ?>">
        <td><?=$i++ ?></td>
        <td><?=$invoice['mahoadon'] ?></td>
        <td><?=$invoice['total'] ?></td>
        <td><a href="?page=invoiceDetail&invoiceId=<?=$invoice['id'] ?>">Chi tiết</a></td>

    </tr>
    <?php } 
    } else echo "Bạn chưa có đơn hàng nào";
     ?>
</table>
    






<?php
require("v_footer.php");
?>