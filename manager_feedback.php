<link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
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
                pg_query("delete from feedback where fb_id='$id'");
            }
        }
        ?>
        <form name="frm" method="post" action="">
        <h1>Management Feedback</h1>
        <p>
        <img src="images/add.png" alt="Add new" width="16" height="16" border="0" /> 
        <a href="?page=add_fb"> Add</a>
        </p>
        <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                <th style='text-align:center'><strong>No.</strong></th>
                <th style='text-align:center'><strong>Username</strong></th>
                <th style='text-align:center'><strong>Small Feedback</strong></th>
                <th style='text-align:center'><strong>Detail Feedback</strong></th>
                    <th style='text-align:center'><strong>Edit</strong></th>
                    <th style='text-align:center'><strong>Delete</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
            $No=1;
            $result=pg_query("select * from feedback");
            while($row=pg_fetch_array($result))
            {
            ?>
			<tr>
              <td class="cotCheckBox"><?php echo $No;?></td>
              <td>
                <?php echo $row["email"];?></td>
                <td><?php echo $row["username"];?></td>
                <td><?php echo $row["fb_smalldes"];?></td>
                <td><?php echo $row["fb_des"];?></td>
              <td style='text-align:center'><a href="?page=update_fb&&id=<?php echo $row["fb_id"];?>">
              <img src='images/edit.png' border='0'  /></a></td>
              <td style='text-align:center'><a href="?page=manager_fb&&function=del&&id=<?php echo $row["fb_id"];?>" onclick="deleteConfirm()"><img src='images/delete.png' border='0'></a></td>
            </tr>
            <?php
             $No++;}
             ?>
			</tbody>
        </table>  
        
        <!--Nút Thêm mới , xóa tất cả-->
        <div class="row" style="background-color:#FFF"><!--Nút chức nang-->
            <div class="col-md-12">
            	
            </div>
        </div><!--Nút chức nang-->
 </form>