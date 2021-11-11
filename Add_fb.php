<!-- Bootstrap --> 
<link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	 <div id="top">   
        <?php
	include_once("connection.php");
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
	if(isset($_POST["btnAdd"]))
	{
		$id =$_POST["txtID"];
		$smalldes = $_POST["txtDes"];
        $des = $_POST["txtDesc"];
        $username =$_POST['usernameList'];
        $email = $_POST['txtEmail'];
		$err="";

		if($id==""){
			$err.="<li>Enter Feeback ID, please</li>";
		}
        if(trim($username)==""){
            $err.="<li>Enter Username,please</li>";
        }
		if($err!=""){
			echo"<ul>$err</ul>";
		}
		else{
			$sq=" Select * from feedback where fb_id='$id' or username='$username'";
			$result=pg_query($sq);
			if(pg_num_rows($result)==0)
			{
				pg_query("INSERT INTO feedback (fb_id, username, fb_smalldes, fb_des, email)
				VALUES ('$id',,'$username','$smalldes','$des','$email')");
				echo '<meta http-equiv="refresh" content="0,URL=?page=manager_fb"/>';
			}
			else
			{
				echo "<li>Duplication Feedbacks ID</li>";
			}
		}

	}


        ?>

<div class="container">
	<h2>Adding Feeback</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Feedback ID(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Feedback ID" value='<?php echo isset($_POST["txtID"])?($_POST["txtID"]):"";?>'>
							</div>
					</div>	
                <div class="form-group">
                           <label for="" class="col-sm-2 control-label">Email of username(*):  </label>
                           <div class="col-sm-10">
                           <?php bind_Username_List(); ?>
                </div>
            </div> 
                <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Small description(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" value='<?php echo isset($_POST["txtDes"])?($_POST["txtDes"]):"";?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Description(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" value='<?php echo isset($_POST["txtDesc"])?($_POST["txtDesc"]):"";?>'>
							</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new" />
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=manager_fb'" />
                              	
						</div>
					</div>
				</form>
	</div>
	</div>