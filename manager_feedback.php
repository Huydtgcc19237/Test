<?php
    if(isset($_SESSION['us']) && $_SESSION['admin']==1)
    {
?>
<form name="frm" method="post">
    <h2 style="text-align: center;">Management Feedback</h2>
    <p>
        <img src="images/add.png" alt="Add new" width="16" height="16" border="0" /> 
        <a href="?page=add_category"> Add</a>
        </p>
    <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th style='text-align:center'><strong>No.</strong></th>
                <th style='text-align:center'><strong>Username</strong></th>
                <th style='text-align:center'><strong>Small Feedback</strong></th>
                <th style='text-align:center'><strong>Detail Feedback</strong></th>
            </tr>
        </thead>

		<tbody>
            <?php
                include_once("connection.php");
                $No=1;
                $result = pg_query( "SELECT * FROM feedback ") 
                        or die(pg_error());
                while($row=pg_fetch_array($result))
                {
            ?>
                    <tr>
                        <td style='text-align:center'><?php echo $No;?></td>
                        <td><?php echo $row["username"];?></td>
                        <td><?php echo $row["fb_smalldes"];?></td>
                        <td><?php echo $row["fb_des"];?></td>
                        <td style='text-align:center'><a href="?page=update_category&&id=<?php echo $row["fb_id"];?>"><img src='images/edit.png' border='0'  /></a></td>
                        <td style='text-align:center'><a href="?page=category_management&&function=del&&id=<?php echo $row["fb_id"];?>" onclick="deleteConfirm()"><img src='images/delete.png' border='0'></a></td>
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