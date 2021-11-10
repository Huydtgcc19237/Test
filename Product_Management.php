    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script>
    function deleteConfirm(){
        if(confirm("Are you sure to delete!")){
            return true;
        }
        else{
            return false;
        }
    }
    </script>
        <form name="frm" method="post" action="">
        <h1>Product Management</h1>
        <p>
        	<img src="images/add.png" alt="Thêm mới" width="16" height="16" border="0" /><a href="?page=add_product">Add new</a>
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
                    <th><strong>Image</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
            include_once("connection.php");
            if(isset($_GET["function"])=="del"){
                if(isset($_GET["id"])){
                    $id=$_GET["id"];
                    $sq="SELECT pro_image FROM product WHERE Pro_ID='$id'";
                    $res=pg_query($conn,$sq);
                    $row=pg_fetch_array($res);
                    $filePic=$row['Pro_image'];
                    unlink("images/".$filePic);
                    pg_query("delete from product where Pro_ID='$id'");
                }
            }
            ?>
            
            <?php
			$No=1;
            $result=pg_query("SELECT product.pro_id, product.pro_name, product.pro_price, product.pro_qty, product.pro_image, category.cat_id,
            from product, category where product.cat_id = category.cat_id");
            while($row=pg_fetch_array($result)){
                var_dump($result)	
			?>
			<tr>
              <td ><?php echo $No; ?></td>
              <td ><?php echo $row["Product_ID"];  ?></td>
              <td><?php echo $row["Product_Name"];  ?></td>
              <td><?php echo $row["Price"];   ?></td>
              <td ><?php echo $row["Pro_qty"]; ?></td>
              <td><?php echo $row["Cat_id"]; ?></td>
             <td align='center' class='cotNutChucNang'>
                 <img src='images/<?php echo $row['Pro_image'] ?>' border='0' width="50" height="50"  /></td>
             <td align='center' class='cotNutChucNang'><a href="?page=update_product&&id=<?php echo $row["Product_ID"];?>"><img src='images/edit.png' border='0'/></a></td>
             <td align='center' class='cotNutChucNang'><a href="?page=product_management&&function=del&&id=<?php echo $row["Product_ID"];?>"onclick="return deleteConfirm()"><img src='images/delete.png' border='0' /></a></td>
            </tr>
            <?php
               $No++;
            }
			?>
			</tbody>
        
        </table>  
 </form>
