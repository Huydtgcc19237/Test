<?php
    if(isset($_SESSION['us']) && $_SESSION['admin']==1)
    {
?>
<form name="frm" method="post">
    <h2 style="text-align: center;">Management Order Details</h2>
    <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th style='text-align:center'><strong>No.</strong></th>
                <th style='text-align:center'><strong>Order ID</strong></th>
                <th style='text-align:center'><strong>Username</strong></th>
                <th style='text-align:center'><strong>Order Day</strong></th>
                <th style='text-align:center'><strong>Delivery Day</strong></th>
                <th style='text-align:center'><strong>Delivery Address</strong></th>
                <th style='text-align:center'><strong>Payment</strong></th>
                <th style='text-align:center'><strong>Prouduct ID</strong></th>

            </tr>
        </thead>

		<tbody>
            <?php
                include_once("connection.php");
                $No=1;
                $result = pg_query("SELECT * FROM orderdetails ") 
                        or die(pg_error());
                while($row=pg_fetch_array($result))
                {
            ?>
                    <tr>
                        <td style='text-align:center'><?php echo $No;?></td>
                        <td><?php echo $row["orderid"];?></td>
                        <td><?php echo $row["username"];?></td>
                        <td><?php echo $row["orderdate"];?></td>
                        <td><?php echo $row["deliverydate"];?></td>
                        <td><?php echo $row["delivery_loca"];?></td>
                        <td><?php echo $row["payment"];?></td>
                        <td><?php echo $row["pro_id"];?></td>
                        <td style='text-align:center'><a href="?page=update_order&&id=<?php echo $row["orderid"];?>"><img src='images/edit.png' border='0'  /></a></td>
                        <td style='text-align:center'><a href="?page=order&&function=del&&id=<?php echo $row["orderid"];?>" onclick="deleteConfirm()"><img src='images/delete.png' border='0'></a></td>
            <?php
                $No++;
                }
            ?>
		</tbody>
    </table>  
</form>
<?php
    }
?>
<br>
<br>
