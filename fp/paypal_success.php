<?php  

session_start();

?>

<!DOCTYPE html>

<html>
<head>

	<title>! הקניה בוצעה</title>
	<meta charset="utf-8" />



</head>
<body dir="rtl">

<?php

	include "inc/function.php";
	
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
			
			$pro_id = $row_price_pro['p_id'];
			
			$values = array_sum($pro_price);			
			
			$total +=$values;
			
		}
	}
	
	
	$get_qty = "select * from cart where p_id = '$pro_id_t'";
	
	$run_qty = mysqli_query($connect, $get_qty);
	
	$row_qty = mysqli_fetch_array($run_qty);
	
	$qty = $row_qty['qty'];
	
	if($qty==0){
		
		$qty = 1;
	
	}
	else{
		
		$qty = $qty;
		
		$total = $total*$qty;
		
	}
	
	$username = $_SESSION['user_session'];
	
	$get_u = "select * from customers where username = '$username'";
	
	$run_u = mysqli_query($connect, $get_u);
	
	$row_u = mysqli_fetch_array($run_u);
	
	$c_id = $row_u['id'];
	
	// paypal info
	
	$amount = @$_GET['amount'];
	
	$currency = @$_GET['cc'];
	
	$trx_id = @$_GET['tx'];
	
	$insert_payment = "insert into payments(amount,cus_id,pro_id,trx_id,currency) 
	values('$amount','$c_id','$pro_id_t','$trx_id','$currency')
	";
	
	$run_payment = mysqli_query($connect, $insert_payment);
	
	$insert_order = "insert into orders(p_id,c_id,qty) values('$pro_id','$c_id','$qty')";
	
	$run_order = mysqli_query($connect, $insert_order);
	
	$delete_cart = "delete from cart";
	
	$run_cart = mysqli_query($connect,$delete_cart);
	
	
	
	if($amount == $total){
		
		echo "
		<h2>ברוך הבא ,".$_SESSION['user_session']."</h2>
		<h3>הקניה בוצעה בהצלחה , נא לפנות ל<a href='index.php'>דף הראשי</a></h3>
		";
		
	}
	else{
		
		echo "
		<h2> ברוך הבא לקוח יקר</h2>
		<h3>הקניה לא בוצעה בהצלחה , נא לפנות ל<a href='index.php'></a></h3>
		";
		
	}

?>

</body>
</html>