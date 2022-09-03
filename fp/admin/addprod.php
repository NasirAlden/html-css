<?php include "inc/header.php"; ?>
<?php
// post value

$p_title = @$_POST['p_title'];
$p_category = @$_POST['p_category'];
$p_image = @$_FILES['p_image']['name'];
$p_image_tmp = @$_FILES['p_image']['tmp_name'];
$p_price = @$_POST['p_price'];
$p_desc = @$_POST['p_desc'];
$p_keyword = @$_POST['p_keyword'];

// move uploaded image

	move_uploaded_file($p_image_tmp,"images/$p_image");


// insert product

if(isset($_POST['addpro'])){
	
	if(empty($p_title) || empty($p_category) || empty($p_image) || empty($p_price) || empty($p_desc) || empty($p_keyword)){
			echo '<script> alert("נא למלא את כל השדות הדרושים");</script>';
	}
	else{
		
		$insert_pro = "insert into products(p_title,p_category,p_image,p_price,p_desc,p_keyword) values
			(
			'$p_title',
			'$p_category',
			'$p_image',
			'$p_price',
			'$p_desc',
			'$p_keyword'
			)
		";
		
		$run_pro = mysqli_query($db, $insert_pro);
		
		if(isset($run_pro)){
			
			header("Location: addprod.php");
			
		}
		
	}
}


?>
<div class="adminBody">
	<form action="addprod.php" method="post" enctype="multipart/form-data" >
		<label>כותרת מוצר</label>
		<input type="text" name="p_title" />
		<label>קטלוג מוצר</label>
		<br>
		<select name="p_category" style="margin-top:5px;">
			<?php
			
			
			$get_c = "select * from category";
			
			$run_c = mysqli_query($db, $get_c);
			
			while($row_c = mysqli_fetch_array($run_c)){
				
				echo '<option value="'.$row_c['c_id'].'">'.$row_c['c_name'].'</option>';
				
			}
			
			?>
		</select>
		<br><br>
		<label>תמונת מוצר</label>
		<input type="file" name="p_image" />
		<label>מחיר מוצר</label>
		<input type="text" name="p_price" />
		<label>מפרט טכני</label>
		<textarea name="p_desc"></textarea>
		<script>
			CKEDITOR.replace( 'p_desc' );
		</script>
		<br>
		<label>תוויות</label>
		<input type="text" name="p_keyword" />
		<input type="submit" name="addpro" value="הוספה" />
		
	</form>
</div>
<?php include "inc/footer.php"; ?>