<?php  include "inc/function.php"; 


$user_cookie = @$_COOKIE['user'];
$login_cookie = @$_COOKIE['login'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>אלקטרו סלאם - רשת מוצרי החשמל הזולה במדינה</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" href="css/fontawesome/css/font-awesome.min.css">
</head>
<body>
	<!-- Header Start -->
		<div class="headerTop">
			<div class="logo w">
				<a href="index.php"><img src="images/logo.png" width="300" /></a>
			</div>
		</div>
	<!-- Header End -->
	
	<!-- Menu Start -->
			<div class="menuBar">
				<ul class="w">
					<li><a href="index.php">דף ראשי</a></li>
					<li><a href="signup.php">הרשמה</a></li>
					<?php get_cat(); ?>
					<div class="c"></div>
					
				</ul>
			</div>		
	
	<!-- Menu End -->
	
	<!-- Search Start -->
		<div class="search">
		<?php cart(); ?>
			<div class="w">
				<div class="cart r">ברוך הבא ! <?php echo $user_cookie; ?>, סל הקניות -  כל המוצרים : <?php total_item(); ?>, מחיר מלא  : <?php total_price();echo ' ש"ח '; ?>  <a href="cart.php"> מעבר לכרטסת </a></div>
				<div class="searchForm l">
					<form action="search.php" method="get">
						<input type="text" name="searchArea" placeholder="חפש כאן..." />
						<input type="submit" name="search" value="חפש" />
					</form>
				</div>
				<div class="social l">
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube-square"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#"><i class="fa fa-reddit"></i></a></li>
					</ul>
				</div>
				<div class="c"></div>
			</div>
		</div>	
	
	<!-- Search End -->
	<br><br>
	
	<!-- Products area Start -->
		<div class="w content">