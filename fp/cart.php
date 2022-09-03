<?php include "files/header.php"; ?>
<?php 

session_start();

?>
<form action="" method="post">

<table style="background:#fff;border:1px solid #eee;padding:10px;font-family:tahoma;" border="0" width="100%">
	<tr>
		<th>הסרה</th>
		<th>המוצר</th>
		<th>כמות</th>
		<th>מחיר</th>
	</tr>
	<?php 
	
	global $connect;
	
	$ip = getIp();
	
	$total = 0;
	
	$t_price = "select * from cart where ip_add = '$ip'";
	
	$run_price = mysqli_query($connect, $t_price);
	
	while($row_t_price = mysqli_fetch_array($run_price)){
		
		$pro_id_t = $row_t_price['p_id'];
		
		$price_pro = "select * from products where p_id = '$pro_id_t'";
		
		$run_price_pro = mysqli_query($connect, $price_pro);
		
		while($row_price_pro = mysqli_fetch_array($run_price_pro)){
			
			$pro_price = array($row_price_pro['p_price']);
			
			$pro_title = $row_price_pro['p_title'];
			
			$pro_img = $row_price_pro['p_image'];
			
			$pro_price_single = $row_price_pro['p_price'];
			
			$values = array_sum($pro_price);			
			
			$total +=$values;
			
	
	?>
	
	<tr align="center">
		<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id_t; ?>"/></td>
		<td><div><?php echo $pro_title; ?></div><img width="70" src="admin/images/<?php echo $pro_img ?>"/></td>
		<td><input type="text" name="qty" size="5" value="" /></td>
		<?php 
		
			if(isset($_POST['update_cart'])){
				
				$qty = $_POST['qty'];
				
				$update_qty = "update cart set qty='$qty'";
				
				$run_up_qty = mysqli_query($connect, $update_qty);

				$_SESSION['qty'] = $qty;
				
				$total = $total*$qty;
				
			}
		
		
		?>
		<td><?php echo $pro_price_single; ?> ש"ח</td>
	</tr>
	
	<?php } }  ?>
	
	<tr align="right">
		<th>  סך הכל  : <?php  echo $total; ?> ש"ח </th>
	</tr>
	<tr align="right">
		<td><input type="submit" name="update_cart" value="רענון כרטסת" /></td>
		<td><button><a href="index.php">המשך קניה</a></button></td>
		<?php 
		
			if($login_cookie == 1){
				
				echo '<td><button><a href="checkout.php">השלם קניה</a></button></td>';
								
			}
			else{
				
				echo '<td><button><a href="login.php">השלם קניה</a></button></td>';

				
			}
		
		?>
	</tr>
	
	<?php  
	
	function update_cart(){
		
	global $connect;
	
	$ip = getIp();
	
	if(isset($_POST['update_cart'])){
		
		foreach($_POST['remove'] as $id_remove){
			
			$delete_pro = "delete from cart where p_id = '$id_remove' AND ip_add = '$ip'";
			
			$run_delete = mysqli_query($connect, $delete_pro);
			
			if($run_delete){
				
				header("Location: cart.php");
				
			}
			
		}
		
	}
	
	echo @$up_c = update_cart();
	
	}
	
	?>

</table>
</form>
<?php include "files/footer.php"; ?>