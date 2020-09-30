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
	alert('wrong email');</script>";
}


}
 ?>

 
