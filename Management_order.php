<?php
    if(isset($_SESSION['us']) && $_SESSION['admin']==1)
    {
?>
<form name="frm" method="post">
    <h2 style="text-align: center;">Management Order</h2>
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
            </tr>
        </thead>

		<tbody>
            <?php
                include_once("connection.php");
                $No=1;
                $result = mysqli_query($conn, "SELECT * FROM orders ") 
                        or die(mysqli_error($conn));
                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                {
            ?>
                    <tr>
                        <td style='text-align:center'><?php echo $No;?></td>
                        <td><?php echo $row["OrderID"];?></td>
                        <td><?php echo $row["username"];?></td>
                        <td><?php echo $row["OrderDate"];?></td>
                        <td><?php echo $row["DeliveryDate"];?></td>
                        <td><?php echo $row["Delivery_loca"];?></td>
                        <td><?php echo $row["Payment"];?></td>
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
