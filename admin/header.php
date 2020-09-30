  <?php
  
   session_start();
   include'conn.php';    
   if (!isset($_SESSION['email'])) {
               header('Location: http://localhost/myskugenerator/index.php');
            }         
if (isset($_SESSION['email'])) {
   $email=$_SESSION['email'];



}
if (isset($_POST['logout'])) {
                                                # code...
                        session_destroy();
                        $time_1 = date('Y-m-d H:i:s');
$sql="UPDATE login_out SET logout_time='".$time_1."' WHERE token=".$_SESSION['token']." AND email='".$email."'";
$run=mysqli_query($con,$sql) or die(mysqli_error($con));

                        header('Location: http://localhost/myskugenerator/index.php');                      }                                              

?>
<?php
$_SESSION['token'];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>SKU Generator</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="dist/css/selectize.default.css">
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


        <div class="sidebar-wrapper">
            <div class="logo">
               
                <a href="admintestingFormi.php" class="simple-text">
                    SKU Generator
                </a>
            </div>

            <ul class="nav">
               <li>
                    <a href="admintestingFormi.php">
                        <i class="pe-7s-graph"></i>
                        <p>Add Products</p>
                    </a>
                </li>
                <li>
                    <a href="admintable.php">
                        <i class="pe-7s-graph"></i>
                        <p>View SKUs</p>
                    </a>
                </li>
                <li>
                    <a href="adminmaintable.php">
                        <i class="pe-7s-user"></i>
                        <p>Main Categories</p>
                    </a>
                </li>
                <li>
                    <a href="adminsubtable.php">
                        <i class="pe-7s-note2"></i>
                        <p>Sub Categories</p>
                    </a>
                </li>
                <li>
                    <a href="adminbrandtable.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Brand Names</p>
                    </a>
                </li>
                <li>
                    <a href="logs.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>View Logs</p>
                    </a>
                </li>
                

               
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                     
                       
                     
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                     
                    
                        <li>

                            
<form method="POST" action="">
    <input type="submit" name="logout" class="btn btn-info" value="LOGOUT">


</form>
                                                  </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
