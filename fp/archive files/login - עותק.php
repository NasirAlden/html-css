<?php include "files/header.php"; ?>
<?php 

	// post value
	$username = @$_POST['username'];
	$password = @$_POST['password'];
	
	if(isset($_POST['login'])){
		
		if(empty($username) || empty($password)){
			
			echo '<script>alert("נא למלא את כל הפרטים");</script>';			
		}
		else{
			
			$select_c = "select * from customers where username = '$username' AND password = '$password'";
			
			$run_c = mysqli_query($connect, $select_c);
			
			if(mysqli_num_rows($run_c) > 0){
				
				$row_c = mysqli_fetch_array($run_c);
				
				$user = $row_c['username'];
				$pass = $row_c['password'];
				
				if($user != $username && $pass != $password){
					
									echo '<script>alert("הפרטים שהוזנו אינם נכונים");</script>';
							
									
				}
				else{
					
					setcookie("user",$user,time()+60*60*24);
					setcookie("login",1,time()+60*60*24);
					
					echo '<script>alert("! ברוך הבא, ההתחברות בוצעה בהצלחה");</script>';
					
					echo '<meta http-equiv="refresh" content="3; url=\'checkout.php\'" />';
					
					
				}
				
				
			}
			else{
				
				echo '<script>alert("הפרטים שהוזנו אינם נכונים");</script>';
				
			}
			
		}
		
	}



?>
<form action="" method="post">
	<div class="panel" style="width:500px;margin:0px auto;">
		<div class="panel_title">התחברות לאתר</div>
		<div class="panel_body">
			<div class="label">שם משתמש : </div>
			<input type="text" name="username" />
			<br><br>
			<div class="label">סיסמה : </div>
			<input type="text" name="password" />
			<br><br>
			<input type="submit" name="login" value="התחברות לאתר" />
		</div>
	</div>
</form>
<?php include "files/footer.php"; ?>