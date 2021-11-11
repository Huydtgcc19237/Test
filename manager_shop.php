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
                pg_query("delete from category where Cat_ID='$id'");
            }
        }
        ?>
<form name="frm" method="post">
    <h2 style="text-align: center;">Management Shop</h2>
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