 <!-- Bootstrap --> 
 <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<?php
	include_once('connection.php');
        if(isset($_GET["id"])){
			$id=$_GET["id"];
			$result=pg_query("select * from shop where shop_id='$id'");
			$row=pg_fetch_array($result);
			$shop_id=$row['shop_id'];
			$shop_name=$row['shop_name'];
			$local=$row['shop_loca'];
		
    ?>
	<?php if(isset($_POST["btnUpdate"]))
	{
		$id=$_POST["txtID"];
		$name=$_POST["txtName"];
		$loca=$_POST["txtloca"];
		$err="";
		if($name==""){
			$err.="<li>Enter Shop Name, please<li>";
		}
		if($err!=""){
			echo"<ul>$err</ul>";
		}
		else{
			$sq="select * from shop where shop_id='$id' and shop_name='$name'";
			$result=pg_query($sq);
			if(pg_num_rows($result)==0)
			{
				pg_query("Update shop set shop_name='$name', shop_loca='$loca' where shop_id ='$id'");
				echo '<meta http-equiv="refresh" content="0; URL=?page=manager_shop"/>';
			}
			else
			{
				echo "<li>Dublicate shop Name</li>";
			}
		}
	}
	?>
<div class="container">
	<h2>Updating Product Category</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Shop ID(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Shop ID" readonly 
								  value='<?php echo$shop_id;?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Shop Name(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Shop Name" 
								  value='<?php echo $shop_name; ?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Shop Address(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtloca" id="txtloca" class="form-control" placeholder="Shop Address" 
								  value='<?php echo $local;?>'>
							</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update"/>
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=manager_shop'" />
                              	
						</div>
					</div>
				</form>
	</div>
    <?php
	}
	else{
		echo '<meta http-equiv="refresh" content="0; URL=manager_shop.php"/>';
	}
	?>


	<?php
   
    ?>