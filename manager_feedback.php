<?php
    if(isset($_SESSION['us']) && $_SESSION['admin']==1)
    {
?>
<form name="frm" method="post">
    <h2 style="text-align: center;">Management Feedback</h2>
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
                        <td><?php echo $row["fb_id"];?></td>
                        <td><?php echo $row["fb_des"];?></td>
                        <td><?php echo $row["fb_smalldesc"];?></td>
                        <td><?php echo $row["username"];?></td>
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