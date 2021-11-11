    <!-- Bootstrap --> 
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
        <script>
        function deleteConfirm()
        {
            if(confirm("Are you sure to delete!")){
                return true;
            }
            else{
                return false;
            }
        }
        </script>
        <?php
        include_once("connection.php");
        if(isset($_GET["function"])=='del')
        {
            if(isset($_GET["id"]))
            {
                $id=$_GET["id"];
                pg_query("delete from shop where shop_id='$id'");
            }
        }
        ?>
<form name="frm" method="post">
    <h2 style="text-align: center;">Management Shop</h2>
    <p>
        <img src="images/add.png" alt="Add new" width="16" height="16" border="0" /> 
        <a href="?page=add_shop">Add</a>
    </p>
    <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th style='text-align:center'><strong>No.</strong></th>
                <th style='text-align:center'><strong>Name Shop</strong></th>
                <th style='text-align:center'><strong>Shop Address</strong></th>
                <th><strong>Edit</strong></th>
                <th><strong>Delete</strong></th>

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