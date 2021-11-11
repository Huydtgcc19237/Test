<?php
    if(isset($_SESSION['us']) && $_SESSION['admin']==1)
    {
?>
<form name="frm" method="post">
    <h2 style="text-align: center;">Management Shop</h2>
    <p>
        <img src="images/add.png" alt="Add new" width="16" height="16" border="0" /> 
        <a href="?page=add_shop"> Add</a>
    </p>
    <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th style='text-align:center'><strong>No.</strong></th>
                <th style='text-align:center'><strong>ID Shop</strong></th>
                <th style='text-align:center'><strong>Name Shop</strong></th>
                <th style='text-align:center'><strong>Shop Address</strong></th>
            </tr>
        </thead>

		<tbody>
            <?php
                include_once("connection.php");
                $No=1;
                $result = pg_query( "SELECT * FROM shop ") 
                        or die(pg_error());
                while($row=pg_fetch_array($result))
                {
            ?>
                    <tr>
                        <td style='text-align:center'><?php echo $No;?></td>
                        <td><?php echo $row["shop_id"];?></td>
                        <td><?php echo $row["shop_name"];?></td>
                        <td><?php echo $row["shop_loca"];?></td>
                        <td style='text-align:center'><a href="?page=update_shop&&id=<?php echo $row["fb_id"];?>"><img src='images/edit.png' border='0'  /></a></td>
                        <td style='text-align:center'><a href="?page=manager_shop&&function=del&&id=<?php echo $row["shop_id"];?>" onclick="deleteConfirm()"><img src='images/delete.png' border='0'></a></td>
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