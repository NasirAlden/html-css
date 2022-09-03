<?php


include "inc/cookie.php";

	// connect db
	$db = mysqli_connect('localhost','root','','electroSlam');


?>
<!DOCTYPE html>
<html>
<head>
	<title>לוח ניהול</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script src="inc/ckeditor/ckeditor.js"></script>
</head>
<body>
<div class="all">

	<!-- Admin Menu Start -->
	<div class="adminMenu">
		<ul>
			<li><a href="addcat.php">הוסף קטגוריה</a></li>
			<li><a href="addprod.php">הוסף מוצר</a></li>		
		</ul>
	</div>
	<!-- Admin Menu End -->
	<br>