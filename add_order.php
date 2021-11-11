 <!-- Bootstrap --> 
 <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	    
	<?php
	include_once("connection.php");
	if(isset($_POST["btnAdd"]))
	{
		$id=$_POST["orderID"];
		$name=$_POST["OrderDate"];
		$DeliveryDate=$_POST["DeliveryDate"];
        $Delivery_loca=$_POST["Delivery_loca"];
        $pay=$_POST["Payment"];
        $us=$_POST["username"];


		$err="";
		if($id==""){
			$err.="<li>Enter Order ID, Please</li>";
		}
		if($name==""){
			$err.="<li>Enter Order Date, Please</li>";
		}
		if($err!=""){
			echo "<ul>$err</ul>";
		}
		else{
			$sq="SELECT * FROM orderdetails WHERE orderid='$id";
			$result=mysqli_query($sq);
			if(mysqli_num_rows($result)==0)
			{
				mysqli_query("INSERT INTO orderdetails (orderid, username, orderdate, deliverydate, delivery_loca,payment,pro_id) values ('$id','$name','$DeliveryDate',' $Delivery_loca',
                '$pay','$us')");
				echo '<meta http-equiv="refresh" content="0; URL=?page=management_order"/>';
			}
			else{
				echo"<li>Dublicate Order ID or Order Date";
			}
		}
	}
	?>

<div class="container">
	<h2>Adding Order</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Order ID(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="orderID" id="orderID" class="form-control" placeholder="Order ID" value='<?php echo isset($_POST["orderID"])?($_POST["orderID"]):"";?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">OrderDate(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="OrderDate" id="OrderDate" class="form-control" placeholder="OrderDate" value='<?php echo isset($_POST["OrderDate"])?($_POST["OrderDate"]):"";?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">DeliveryDate(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="DeliveryDate" id="DeliveryDate" class="DeliveryDate" placeholder="DeliveryDate" value='<?php echo isset($_POST["DeliveryDate"])?($_POST["DeliveryDate"]):"";?>'>
							</div>
					</div>
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Delivery local(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="Delivery_loca" id="Delivery_loca" class="Delivery_loca" placeholder="Delivery_loca" value='<?php echo isset($_POST["Delivery_loca"])?($_POST["Delivery_loca"]):"";?>'>
							</div>
					</div>
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Payment(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="Payment" id="Payment" class="Payment" placeholder="Payment" value='<?php echo isset($_POST["Payment"])?($_POST["Payment"]):"";?>'>
							</div>
					</div>
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Username(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="username" id="username" class="username" placeholder="username" value='<?php echo isset($_POST["username"])?($_POST["Payment"]):"";?>'>
							</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new"/>
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='Manegement_order.php'" />
                              	
						</div>
					</div>
				</form>
	</div>