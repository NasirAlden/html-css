<?php 

session_start();

?>

<?php


// db connection

$con = mysqli_connect('localhost','root','','electroSlam');

// post  value

$ad_name=@$_POST['ad_name'];
$ad_pass=@$_POST['ad_pass'];

if(isset($_POST['login'])){
	
	if(empty($ad_name) OR empty($ad_pass)){
		echo '<script> alert("נא למלא את כל הפרטים הדרושים"); </script>';	
	}
	else{
		// get admin name and pass
		$get_admin = "select * from admin where ad_name = '$ad_name' AND ad_pass = '$ad_pass'";
		$run_admin = mysqli_query($con, $get_admin);
		
		// admin isset
		if(mysqli_num_rows($run_admin) == 1){
			$row_admin = mysqli_fetch_array($run_admin);
			
			// admin value isset
			$aname = $row_admin['ad_name'];
			
			//login cookie create
			
			$_SESSION['aname'] = $aname;
			
			$_SESSION['adminlogin'] = 1;
			
			setcookie("aname",$aname,time()+60*60*24);
			setcookie("adminlogin",1,time()+60*60*24);
			
			
			echo '<script> alert("ברוך הבא שוב מנהל"); </script>';	
			
			header("Location: ok.php");	
		}
		else{
			echo '<script> alert("הנתונים שהוזנו לא נכונים"); </script>';	
		}
	}
	
	
	
	
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>כניסה ללוח הניהול</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
	<div class="loginAll">
		<form action="login.php" method="post">
			<input type="text" name="ad_name" placeholder="שם משתמש" />
			<br>
			<input type="password" name="ad_pass" placeholder="סיסמה" />
			<br>
			<input type="submit" name="login" value="כניסה" />
		</form>
	</div>
</body>




</html>