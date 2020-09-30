<?php
include 'header.php';
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


 
        
      <?php
      include 'footer.php';
       ?>