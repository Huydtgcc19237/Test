 <!-- Bootstrap --> 
 <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<?php
	include_once('connection.php');
    function bind_Username_List(){
        $sqlstring ="select username, email  from customer";
        $result =pg_query($sqlstring);
        echo "<select name='usernameList' class='from-control'>
        <option value='0'>Choose username</option>";
        while($row=pg_fetch_array($result)){
            echo "<option value='".$row['username']."'>""</option>";
        }
        echo "</select>";
    }
    function bind_Product_List(){
        $sqlstring ="select pro_id, pro_name from product";
        $result =pg_query($sqlstring);
        echo "<select name='ProductList' class='from-control'>
        <option value='0'>Choose Product ID</option>";
        while($row=pg_fetch_array($result)){
            echo "<option value='".$row['pro_id']."'>".$row['pro_name']."</option>";
        }
        echo "</select>";
    }
    if(isset($_GET["id"])){
		$id=$_GET["id"];
		$result=pg_query("Select * from orderdetails where orderid='$id'");
		$row=pg_fetch_array($result);
		$id=$row['orderid'];
		$username=$row['username'];
        $orderday=$row['orderdate'];
		$deliverydate=$row['deliverydate'];
        $delivery_loca=$row['delivery_loca'];
        $payment=$row['payment'];
        $pro_id=$row['pro_id'];
		
    ?>
	<?php if(isset($_POST["btnUpdate"]))
	{
		$id=$_POST["txtID"];
		$des=$_POST["txtDes"];
        $username =$_POST['usernameList'];
        $product =$_POST['productList'];
		$err="";
        if(($username)==""){
            $err.="<li>Enter Username,please</li>";
        }
        if(($$product)==""){
            $err.="<li>Enter Product ID,please</li>";
        }
		if($err!=""){
			echo"<ul>$err</ul>";
		}
		else{
			$sq="select * from orderdetails where orderid='$id' and username='$username'";
			$result=pg_query($sq);
			if(pg_num_rows($result)==0)
			{
				pg_query("Update orderdetails set username='$name', deliverydate='$deliverydate', orderday='$orderdate', delivery_loca='$delivery_loca', payment='$payment', pro_id='$pro_id'");
				echo '<meta http-equiv="refresh" content="0; URL=?page=order"/>';
			}
			else
			{
				echo "<li>Dublicate Username</li>";
			}
		}
	}
	?>
<div class="container">
	<h2>Updating Order Details</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Order ID(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Order ID" readonly 
								  value='<?php echo $id;?>'>
							</div>
					</div>	
                <div class="form-group">
                           <label for="" class="col-sm-2 control-label">Username(*):  </label>
                           <div class="col-sm-10">
                           <?php bind_Username_List(); ?></div>
                </div>
                <div class="form-group">
                           <label for="" class="col-sm-2 control-label">Product ID(*):  </label>
                           <div class="col-sm-10">
                           <?php bind_Product_List(); ?></div>
                </div>
                
                    <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Deliverydate(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Catepgy Name" 
								  value='<?php echo $deliverydate; ?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">DeliveryLocal(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" 
								  value='<?php echo $delivery_loca;?>'>
							</div>
					</div>
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Orderdate(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" 
								  value='<?php echo $orderday;?>'>
							</div>
					</div>
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Payment(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" 
								  value='<?php echo $payment;?>'>
							</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update"/>
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=order'" />
                              	
						</div>
					</div>
				</form>
	</div>
    <?php
	}
	else{
		echo '<meta http-equiv="refresh" content="0; URL=Management_order.php"/>';
	}
	?>


	<?php
   
    ?>