    <!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" src="scripts/ckeditor/ckeditor.js"></script>
	<div id="top">
        <?php
	include_once("connection.php");
		function bind_Category_List(){
			$sqlstring ="select cat_id, cat_name from category";
			$result =pg_query($sqlstring);
			echo "<select name='CategoryList' class='from-control'>
			<option value='0'>Choose category</option>";
			while($row=pg_fetch_array($result)){
				echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
			}
			echo "</select>";
		}
		function bind_Shop_List(){
			$sqlstring ="select shop_id, shop_name from shop";
			$result =pg_query($sqlstring);
			echo "<select name='ShopList' class='from-control'>
			<option value='0'>Choose Shop</option>";
			while($row=pg_fetch_array($result)){
				echo "<option value='".$row['shop_id']."'>".$row['shop_name']."</option>";
			}
			echo "</select>";
		}
		if(isset($_POST['btnAdd'])){
			$id =$_POST['txtID'];
			$proname =$_POST['txtName'];
			$detail =$_POST['txtDetail'];
			$price =$_POST['txtPrice'];
			$qty =$_POST['txtQty'];
			$pic =$_FILES['txtImage'];
			$category =$_POST['CategoryList'];
			$shop =$_POST['ShopList'];
			$err="";
			if(trim($id)==""){
				$err.="<li>Enter product ID,please</li>";
			}
			if(trim($proname)==""){
				$err.="<li>Enter product name,please</li>";
			}
			if(!is_numeric($price)){
				$err.="<li>Product price must be number,please</li>";
			}
			if(!is_numeric($qty)){
				$err.="<li>Product qty must be number,please</li>";
			}
			if(trim($shop)==""){
				$err.="<li>Enter Shop ID,please</li>";
			}
			if($err!=""){
				echo "<ul>$err</ul>";
			}
			else{
				if($pic['type']=="image/jpg"||$pic['type']=="image/jpeg"||$pic['type']=="image/png"||$pic['type']=="image/gif"){
					if($pic['size']<=614400)
					{

						$sq="select * from product where pro_id='$id' or pro_name='$proname'";
						$result=pg_query($sq);
						if(pg_num_rows($result)==0)
						{
							copy($pic['tmp_name'], 'images/' .$pic['name']);
							$filePic=$pic['name'];
							$sqlstring="INSERT INTO product(
								pro_id, pro_name, pro_price, detaildesc, pro_qty, pro_image, cat_id, shop_id)
								VALUES('$id','$proname','$price','$detail','$qty','$filePic','$category','$shop')";
							pg_query($sqlstring);
							echo '<meta http-equiv="refresh" content="0;URL=?page=product_management"/>';
						}
						else
						{
							echo "<li>Duplication product ID or Name</li>";
						}
					}
					else
					{
						echo "Size of image too big";
					}
				}
				else
				{
					echo "Image format is not correct";
				}
			}

		}
        ?>
<div class="container">
	<h2>Adding new Product</h2>

	 	<form id="frmProduct" name="frmProduct" method="post" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
				<div class="form-group">
					<label for="txtTen" class="col-sm-2 control-label">Product ID(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Product ID" value=''/>
							</div>
				</div> 
				<div class="form-group"> 
					<label for="txtTen" class="col-sm-2 control-label">Product Name(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Product Name" value=''/>
							</div>
                </div>   
                <div class="form-group">   
                    <label for="" class="col-sm-2 control-label">Product category(*):  </label>
							<div class="col-sm-10">
							      <?php bind_Category_List();  ?>
							</div>
                </div>  
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">Product Shop(*):  </label>
                <div class="col-sm-10">
                    <?php bind_Shop_List();  ?>
                </div>
            </div>
                          
                <div class="form-group">  
                    <label for="lblGia" class="col-sm-2 control-label">Price(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value=''/>
							</div>
                 </div>   
                            
               
                            
                <div class="form-group">  
        	        <label for="lblDetail" class="col-sm-2 control-label">Detail description(*):  </label>
							<div class="col-sm-10">
							      <textarea name="txtDetail" rows="4" class="ckeditor"></textarea>
              					  <script language="javascript">
                                        CKEDITOR.replace( 'txtDetail',
                                        {
                                            skin : 'kama',
                                            extraPlugins : 'uicolor',
                                            uiColor: '#eeeeee',
                                            toolbar : [ ['Source','DocProps','-','Save','NewPage','Preview','-','Templates'],
                                                ['Cut','Copy','Paste','PasteText','PasteWord','-','Print','SpellCheck'],
                                                ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
                                                ['Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField'],
                                                ['Bold','Italic','Underline','StrikeThrough','-','Subscript','Superscript'],
                                                ['OrderedList','UnorderedList','-','Outdent','Indent','Blockquote'],
                                                ['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
                                                ['Link','Unlink','Anchor', 'NumberedList','BulletedList','-','Outdent','Indent'],
                                                ['Image','Flash','Table','Rule','Smiley','SpecialChar'],
                                                ['Style','FontFormat','FontName','FontSize'],
                                                ['TextColor','BGColor'],[ 'UIColor' ] ]
                                        });
										
                                    </script> 
                                  
							</div>
                </div>
                            
            	<div class="form-group">  
                    <label for="lblSoLuong" class="col-sm-2 control-label">Quantity(*):  </label>
							<div class="col-sm-10">
							      <input type="number" name="txtQty" id="txtQty" class="form-control" placeholder="Quantity" value=""/>
							</div>
                </div>
 
				<div class="form-group">  
	                <label for="sphinhanh" class="col-sm-2 control-label">Image(*):  </label>
							<div class="col-sm-10">
							      <input type="file" name="txtImage" id="txtImage" class="form-control" value=""/>
							</div>
                </div>
                        
				<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new"/>
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=product_management'" />
                              	
						</div>
				</div>
			</form>
</div>
</div>
