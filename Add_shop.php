<!-- Bootstrap --> 
<link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	 <div id="top">   
        <?php
	include_once("connection.php");
	if(isset($_POST["btnAdd"]))
	{
		$id =$_POST["txtID"];
		$name = $_POST["txtName"];
		$local = $_POST["txtLoca"];
		$err="";
		if($id==""){
			$err.="<li>Enter Shop ID, please</li>";
		}
		if($name==""){
			$err.="<li>Enter Shop Name, please</li>";
		}
		if($err!=""){
			echo"<ul>$err</ul>";
		}
		else{
			$sq=" Select * from shop where shop_id='$id' or shop_name='$name'";
			$result=pg_query($sq);
			if(pg_num_rows($result)==0)
			{
				pg_query("INSERT INTO shop (shop_id, shop_name, shop_loca)
				VALUES ('$id','$name','$local')");
				echo '<meta http-equiv="refresh" content="0,URL=?page=manager_shop"/>';
			}
			else
			{
				echo "<li>Duplication Shop ID or Name</li>";
			}
		}

	}


        ?>

<div class="container">
	<h2>Adding Category</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Shop ID(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Shop ID" value='<?php echo isset($_POST["txtID"])?($_POST["txtID"]):"";?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Shop Name(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Shop Name" value='<?php echo isset($_POST["txtName"])?($_POST["txtName"]):"";?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Shop local(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtLoca" id="txtLoca" class="form-control" placeholder="Shop address" value='<?php echo isset($_POST["txtLoca"])?($_POST["txtLoca"]):"";?>'>
							</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new" />
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=manager_shop'" />
                              	
						</div>
					</div>
				</form>
	</div>
	</div>