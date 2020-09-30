 <?php
 session_start();
 $con=mysqli_connect('localhost','root','',"skugenerator");
if (isset($_POST['login'])) {
 $username=$_POST['email'];
 $password=$_POST['password'];

 $username=stripcslashes($username);
 $password=stripcslashes($password);
 //$username=mysqli_real_escape_string($username);
 //$password=mysqli_real_escape_string($password);




 $sql="SELECT * FROM users WHERE username='".$username."' and password='".$password."'" or die("Failed to connect to database".mysql_errno());
 //$user_id=$_SESSION("user_id");
 $result=mysqli_query($con,$sql);
 $num=mysqli_num_rows($result);

if ($num==1) {

$_SESSION['email']=$username;
date_default_timezone_set("Asia/Kolkata");
$time = date('Y-m-d H:i:s');

$token=rand();
$_SESSION['token']=$token;

$ql="INSERT INTO login_out(login_time,email,token) VALUES('".$time."','".$username."','".$token."')";
$run=mysqli_query($con,$ql) or die(mysqli_error($con));
if ($username=='anandsaurav85@gmail.com')
{
header('Location: http://localhost/myskugenerator/admin/admintestingFormi.php');
}	
else
{
	header('Location:http://localhost/myskugenerator/users/testingFormi.php');
}
}
else {
	echo "<script>
	alert('wrong email');
	</script>";
}


}
 ?>

 
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Login | SKU GENERATOR</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body style="background-color: rgba(11, 119, 157, 0.27);">
<div class="log-w3">
<div class="w3layouts-main">
	<h2>SKU GENERATOR</h2>
		<form action="" method="post">
			<input type="email" class="ggg" name="email" placeholder="E-MAIL" required="">
			<input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
			
			
				<div class="clearfix"></div>
				<input type="submit" value="Sign In" name="login" class="btn btn-primary btn-fill" >
		</form>
	
</div>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
