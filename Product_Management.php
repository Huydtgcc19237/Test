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
                        $sq="SELECT pro_image from product WHERE product_id='$id'";
                        $res= pg_query($sq);
                        $row= pg_fetch_array($res);
                        $filePic= $row['pro_image'];
                        pg_query("DELETE FROM product WHERE product_id='$id'");
                }
            }
            ?>
            
            <?php
			$No=1;
            $result=pg_query($conn,"select Pro_ID, Pro_Name,Pro_Price,Pro_qty,Pro_image,Cat_Name, shop_name
                From product a, category b , shop c Where a.Cat_ID =b.Cat_ID and a.shop_id = c.shop_id");
            while($row=pg_fetch_array($result)){	
			?>
			<tr>
              <td ><?php echo $No; ?></td>
              <td ><?php echo $row['product_id'];  ?></td>
              <td><?php echo $row['product_name'];  ?></td>
              <td><?php echo $row['price'];   ?></td>
              <td ><?php echo $row['pro_qty']; ?></td>
              <td><?php echo $row['cat_name']; ?></td>
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
