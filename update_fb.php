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
            echo "<option value='".$row['username']."'>".$row['email']."</option>";
        }
        echo "</select>";
    }
        if(isset($_GET["id"])){
			$id=$_GET["id"];
			$result=pg_query("Select * from feedback where fb_id='$id'");
			$row=pg_fetch_array($result);
			$fb_id=$row['fb_id'];
			$username=$row['username'];
            $small_des=$row['smalldes'];
			$fb_des=$row['fb_des'];
            $email=$row['email'];
		
    ?>
	<?php if(isset($_POST["btnUpdate"]))
	{
		$id=$_POST["txtID"];
		$name=$_POST["txtName"];
		$des=$_POST["txtDes"];
		$err="";
		if($name==""){
			$err.="<li>Enter Username, please<li>";
		}
		if($err!=""){
			echo"<ul>$err</ul>";
		}
		else{
			$sq="select * from feedback wherefb_id='$id' and username='$name'";
			$result=pg_query($sq);
			if(pg_num_rows($result)==0)
			{
				pg_query("Update feedback set username='$name',smalldes='$small_des',email='$email', fb_des='$des' where fb_id ='$id'");
				echo '<meta http-equiv="refresh" content="0; URL=?page=manager_fb"/>';
			}
			else
			{
				echo "<li>Dublicate Username</li>";
			}
		}
	}
	?>
<div class="container">
	<h2>Updating Feedback Category</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Feeback ID(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Feedback ID" readonly 
								  value='<?php echo $fb_id;?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Username(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Catepgy Name" 
								  value='<?php echo  bind_Username_List() ?>'>
							</div>
					</div>
                    <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Smalldesc(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Catepgy Name" 
								  value='<?php echo $small_des; ?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Description(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" 
								  value='<?php echo $fb_des;?>'>
							</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update"/>
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=manager_fb'" />
                              	
						</div>
					</div>
				</form>
	</div>
    <?php
	}
	else{
		echo '<meta http-equiv="refresh" content="0; URL=manager_feedback.php"/>';
	}
	?>


	<?php
   
    ?>