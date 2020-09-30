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

    <!--For Importing Excel-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="testingFormi.php" class="simple-text">
                    SKU Generator
                </a>
            </div>

            <ul class="nav">
               <li>
                    <a href="testingFormi.php">
                        <i class="pe-7s-graph"></i>
                        <p>Add Products</p>
                    </a>
                </li>
                <li>
                    <a href="table.php">
                        <i class="pe-7s-graph"></i>
                        <p>View SKUs</p>
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
                            <a href="http://localhost/weblight/BS3/login.html">
                                <p>Log out</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
     
<?php
$con = mysqli_connect("localhost", "root", "", "sku");
$output = '';
if(isset($_POST["import"]))
{
$tmp = explode('.', $_FILES["excel"]["name"]);
$extension = end($tmp);
 //$extension = end(explode(".", $_FILES["excel"]["name"])); // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  include_once('PHPExcel/PHPExcel.php');
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

  echo"<label class='text-success'>Data Inserted</label><br />";
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=2; $row<=$highestRow; $row++)
   {
    
    $main_category = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
    
    $sub_category = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
   
    $item_name = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
    
    $brand_name = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
    

//for  main category 

  $queryi = "SELECT count(*) as allcounti FROM maincategories WHERE main_category='".$main_category."'";
  $resulti = mysqli_query($con,$queryi);
  $rowi = mysqli_fetch_array($resulti);
  $allcounti = $rowi['allcounti'];

  // insert new main category
  if($allcounti == 0){
    $insert_queryi = "INSERT INTO 
       maincategories (main_category) VALUES('".$main_category."') ";
       mysqli_query($con,$insert_queryi);
  }

  //for sub category

  $querys = "SELECT count(*) as allcounts FROM subcategories WHERE sub_category='".$sub_category."'";
  $results = mysqli_query($con,$querys);
  $rows = mysqli_fetch_array($results);
  $allcounts = $rows['allcounts'];

  // insert new sub category 
  if($allcounts == 0){
    $insert_querys = "INSERT INTO 
       subcategories (sub_category) VALUES('".$sub_category."') ";
       mysqli_query($con,$insert_querys);
  }

  //for brand

  $queryb = "SELECT count(*) as allcountb FROM brands WHERE brand_name='".$brand_name."'";
  $resultb = mysqli_query($con,$queryb);
  $rowb = mysqli_fetch_array($resultb);
  $allcountb = $rowb['allcountb'];

  // insert new brand
  if($allcountb == 0){
    $insert_queryb = "INSERT INTO 
       brands (brand_name) VALUES('".$brand_name."') ";
       mysqli_query($con,$insert_queryb);
  }
    

    //fetching codes

                    $sqlm="select main_code from maincategories where main_category='".$main_category."'";
                    $runm=mysqli_query($con,$sqlm);
                    $rowm = mysqli_fetch_assoc($runm);
                    $m_code=$rowm['main_code'];
                    $m_code;

                   
                    $sqls="select sub_code from subcategories where sub_category='".$sub_category."'";
                    $runs=mysqli_query($con,$sqls);
                    $rows = mysqli_fetch_assoc($runs);
                    $s_code=$rows['sub_code'];
                    $s_code;

                    
                    $sqlb="select brand_code from brands where brand_name='".$brand_name."'";
                    $runb=mysqli_query($con,$sqlb);
                    $rowb = mysqli_fetch_assoc($runb);
                    $b_code=$rowb['brand_code'];
                    $b_code;

                    
                    $sqli="select max(item_code) as max from item_list where sub_category='".$sub_category."'";
                    $runi=mysqli_query($con,$sqli);
                    $rowi = mysqli_fetch_assoc($runi);
                    $item_code=$rowi['max'];
                    if($item_code==0)
                        $item_code=100;
                    else
                        $item_code=$item_code+1;
                    $item_code;

  //for creating sku
                    $a=strval($m_code);
                    $a.=strval($s_code);
                    $a.=strval($item_code);
                    $a.=strval($b_code);
                
                    $sku_number=intval($a);
                
    //inserting values 


    $query = "INSERT INTO item_list (main_category,main_code,sub_category,sub_code,item_name,item_code,brand_name,brand_code,sku_number) VALUES('".$main_category."','".$m_code."','".$sub_category."','".$s_code."','".$item_name."','".$item_code."','".$brand_name."','".$b_code."','".$sku_number."') ";
    mysqli_query($con, $query);
   
    
   }
  } 
 

 }
 else
 {
  echo '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }
}
?>


  
  <style>
  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
  }
  .box
  {
   width:700px;
   border:1px solid #ccc;
   background-color:#fff;
   border-radius:5px;
   margin-top:100px;
  }
  
  </style>
 

  <div class="container box">
   <h3 align="center">Import Products using Excel File</h3><br />
   <form method="post" enctype="multipart/form-data">
    <label>Select Excel File</label>
    <input type="file" name="excel" />
    <br />
    <input type="submit" name="import" class="btn btn-info" value="Import" />
   </form>
   <br />
   <br />
   
  </div>
 

                
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="">Technoplanet Lab</a>
                </p>
            </div>
        </footer>


    </div>
</div>


</body>

       <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>
    <script src="dist/js/standalone/selectize.js"></script>
    <script src="js/bootstrap.js"></script>


</html>

    

        

        
