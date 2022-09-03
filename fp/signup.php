<?php include "files/header.php"; ?>
<?php 

	// post value
	$username = @$_POST['username'];
	$password = @$_POST['password'];
	$email = @$_POST['email'];
	$country = @$_POST['country'];
	
	// ip address
	
	$ip = getIp();
	
	if(isset($_POST['signup'])){
		
		if(empty($username) || empty($password) || empty($email) || empty($country)){
			
			echo '<script>alert("נא למלא את כל הפרטים");</script>';				
		}
		else{
			
			$insert_c = "insert into customers(username,password,email,country,ip) values ('$username','$password','$email','$country','$ip')";
			
			$run_c = mysqli_query($connect, $insert_c);
			
			if(isset($run_c)){
				
				echo '<script>alert("! ברוך הבא ! ההרשמה שלך לאתר בוצעה בהצלחה")</script>';
				
			}
			
		}
		
	}



?>
<form action="" method="post">
	<div class="panel" style="width:500px;margin:0px auto;">
		<div class="panel_title">הרשמה לאתר</div>
		<div class="panel_body">
			<div class="label">שם משתמש : </div>
			<input type="text" name="username" />
			<br><br>
			<div class="label">סיסמה : </div>
			<input type="text" name="password" />
			<br><br>
			<div class="label">דואר אלקטרוני : </div>
			<input type="text" name="email" />
			<br><br>
			<div class="label">מדינה : </div>
			<input type="text" name="country" />
			<br><br>
			<input type="submit" name="signup" value="הרשמה" />
		</div>
	</div>
</form>
<?php include "files/footer.php"; ?>