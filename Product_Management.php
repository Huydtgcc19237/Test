    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <div id="top">
        <form name="frm" method="post" action="">
        <h1>Product Management</h1>
        <p>
        	<a href="?page=add_product" ><img src="images/add.png" alt="" width="16" height="16" border="0" /> Add new</a>
        </p>
        <table id="tableproduct" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>Product ID</strong></th>
                    <th><strong>Product Name</strong></th>
                    <th><strong>Price</strong></th>
                    <th><strong>Quantity</strong></th>
                    <th><strong>Category ID</strong></th>
                    <th>
                        <strong>Shop ID</strong>
                    </th>
                    <th><strong>Image</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>

			<tbody>
            <script language="javascript">
            function deleteConfirm(){
                if(confirm("Are you sure to delete!")){
                    return true;
                }
                else{
                    return false;
                }
            }
            </script>
            <?php
            if(isset($_GET["function"])=="del"){
                if(isset($_GET["id"])){
                    $id=$_GET["id"];
                    $sq="select pro_image from product where Pro_ID='$id'";
                    $res=pg_query($sq);
                    $row=pg_fetch_array($res);
                    $filePic=$row['Pro_image'];
                    unlink("image/".$filePic);
                    pg_query("DELETE FROM product WHERE Pro_ID='$id'");
                }
            }   
            ?>
                <?php
				include_once("connection.php");
                $No=1;
                $result=pg_query("SELECT product.pro_id, product.pro_name, product.pro_price, product.pro_qty, product.pro_image, category.cat_id
                from product, category where product.cat_id = category.cat_id");
                while($row=pg_fetch_array($result))
                {
                    var_dump($result);

                
                ?>
			<tr>
              <td ><?php echo $No; ?></td>
              <td ><?php echo $row['pro_id']; ?></td>
              <td><?php echo $row['pro_name']; ?></td>
              <td><?php echo $row['pro_price']; ?></td>
              <td ><?php echo $row['pro_qty']; ?></td>
              <td><?php echo $row['cat_id']; ?></td>
              <td><?php echo $row['shop_id']; ?></td>
             <td align='center' class='cotNutChucNang'>
                 <img src='images/<?php echo $row['pro_image']; ?>' border='0' width="50" height="50"  /></td>
             <td align='center'><a href="?page=update_product&&id=<?php echo $row["pro_id"]; ?>"><img src='images/edit.png' border='0'/></a></td>
             <td align='center'><a href="?page=product_management&&function=del&&id=<?php echo $row["pro_id"]; ?>" onclick="return deleteConfirm()">
              <img src='images/delete.png' border='0' /></td>
            </tr>
            <?php
            $No++;
                }
			?>
			</tbody>
        
        </table>  

 </form>
            </div>
