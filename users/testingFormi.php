<?php include'header.php'; ?>     
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><b>Add Product</b></h4>
                            </div>
                            <div class="content">
                                

                                <form method="POST" autocomplete="off">

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label id="demo">Main Category</label>
                                                <!--<input type="text" class="form-control"  placeholder="Enter Main Category" value="">
                                            -->

                                            <?php
                                   

                                               if(mysqli_connect_errno())

                                                {
                                                    echo "Connection Failed".mysqli_connect_error();
                                                }

                                                $query=mysqli_query($con,"select * from maincategories");

                                                echo"<input list='maincategory' class='form-control' type='search' placeholder='Enter Main Category' name='main_category' required=''/>";

                                                echo "<datalist id='maincategory'>";
                                                while($row=mysqli_fetch_array($query))
                                                {
                                                    echo"<option>$row[main_category]</option>";
                                                }

                                                    echo"</datalist>";
                                                
                                                ?>
                                    </div>
                                    </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Sub Category</label>
                                         <?php
                                  

                                               if(mysqli_connect_errno())

                                                {
                                                    echo "Connection Failed".mysqli_connect_error();
                                                }

                                                $query=mysqli_query($con,"select * from subcategories");

                                                echo"<input list='subcategory' class='form-control' type='search' placeholder='Enter Sub Category' name='sub_category' required=''/>";

                                                echo "<datalist id='subcategory'>";
                                                while($row=mysqli_fetch_array($query))
                                                {
                                                    echo"<option>$row[sub_category]</option>";
                                                }

                                                    echo"</datalist>";
                                                   
                                                ?>
                                            </div>
                                        </div>
                                     
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Product Name</label>

                                                 <?php
                                               

                                               if(mysqli_connect_errno())

                                                {
                                                    echo "Connection Failed".mysqli_connect_error();
                                                }

                                                $query=mysqli_query($con,"select item_name from item_list");

                                                echo"<input list='item' class='form-control' type='search' placeholder='Enter Product Name' name='item_name' required='' autocomplete='off' />";

                                                echo "<datalist id='item'>";
                                                while($row=mysqli_fetch_array($query))
                                                {
                                                    echo"<option>$row[item_name]</option>";
                                                }

                                                    echo"</datalist>";
                                                    
                                                ?>

                                               <!-- <input type="text" class="form-control" placeholder="Enter Product Name" value="" name="item_name" required="">-->
                                            </div>
                                        </div>
                                      
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Brand Name</label>
                                               <?php
                                           

                                               if(mysqli_connect_errno())

                                                {
                                                    echo "Connection Failed".mysqli_connect_error();
                                                }

                                                $query=mysqli_query($con,"select * from brands");

                                                echo"<input list='brand' class='form-control' type='search' placeholder='Enter Brand Name' name='brand_name' required=''/>";

                                                echo "<datalist id='brand'>";
                                                while($row=mysqli_fetch_array($query))
                                                {
                                                    echo"<option>$row[brand_name]</option>";
                                                }

                                                    echo"</datalist>";
                                                    
                                                ?>
                                            </div>
                                        </div>
                                        
                                    </div>
                            <!--  <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                  <label>Add Product Image</label>
                               
                                <input type="file" name="item_pic" enctype="multipart/form-data">
                                </div>
                            </div>
                                   </div> -->
                                   </div>
                                     <!--       <input type="checkbox" name="a_code" >  <label>&nbsp Availability</label>
                                  
                                      
                                <button type="submit" class="btn btn-info btn-fill pull-right" onclick="myFunction()">Add Product</button>-->
                                   
                                   <input type="submit" name="submit_11" value="Add Product" class="btn btn-info btn-fill pull-right">

                                   

                                    <div class="clearfix">

                                </form>


                            </div>
                            

                        </div>
                   </div>

                    
               </div>

            
               
                   <?php
                
                    if(isset($_REQUEST['submit_11'])) {
                    $main_category = $_REQUEST['main_category'];
                    $sqlm="select main_code from maincategories where main_category='".$main_category."'";
                    $runm=mysqli_query($con,$sqlm);
                    $rowm = mysqli_fetch_assoc($runm);
                    $m_code=$rowm['main_code'];
                    $m_code;

                    $sub_category = $_REQUEST['sub_category'];
                    $sqls="select sub_code from subcategories where sub_category='".$sub_category."'";
                    $runs=mysqli_query($con,$sqls);
                    $rows = mysqli_fetch_assoc($runs);
                    $s_code=$rows['sub_code'];
                    $s_code;

                    $brand_name = $_REQUEST['brand_name'];
                    $sqlb="select brand_code from brands where brand_name='".$brand_name."'";
                    $runb=mysqli_query($con,$sqlb);
                    $rowb = mysqli_fetch_assoc($runb);
                    $b_code=$rowb['brand_code'];
                    $b_code;

                  //  $imagename=$_FILES["item_pic"]["name"];                  
   /* $image=basename('item_pic'); 
    echo $image;
    $target='images/';
    $target=$target.basename($_FILES[$image]);
    
    

        if  (move_uploaded_file($_FILES[$image]['tmp_name'], $target)){
            echo 'Uploaded';
        }

     else {
        echo 'please choose a file';
    }*/
/*
    if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }*/
   
 /*$image = addslashes(file_get_contents($_FILES['item_pic']['tmp_name']));
      $image_name = addslashes($_FILES['item_pic']['name']);

      move_uploaded_file($image_name,"images/".$image);
*/
                    //Get the content of the image and then add slashes to it 
                   // $image=$_FILES["item_pic"]["name"];  
                   // $imagetmp=$_FILES['item_pic']['tmp_name'];
                    
                    //move_uploaded_file($_FILES['item_pic']['tmp_name'],$imagetmp);
                  //  if(isset($name)){
                    //   if(!empty($name)){      
                     //    $location = '../images/';      
                      //   move_uploaded_file($imagetmp, $location.$image);}}
                  //  echo $image;
                    //Insert the image name and image content in image_table
                    $image;

                    $item_name=$_REQUEST['item_name'];
                    $sqli="select max(item_code) as max from item_list where sub_category='".$sub_category."'";
                    $runi=mysqli_query($con,$sqli);
                    $rowi = mysqli_fetch_assoc($runi);
                    $item_code=$rowi['max'];
                    if($item_code==0)
                        $item_code=100;
                    else
                        $item_code=$item_code+1;
                    $item_code;
                  



                    $a=strval($m_code);
                    $a.=strval($s_code);
                    $a.=strval($item_code);
                    $a.=strval($b_code);
                
                    $sku_number=intval($a);
                

                    if (isset($_POST['submit_11'])) {
                       
                         echo $sql="INSERT INTO `item_list` (main_category,main_code,sub_category,sub_code,item_name,item_code,brand_name,brand_code,sku_number) VALUES('".$main_category."','".$m_code."','".$sub_category."','".$s_code."','".$item_name."','".$item_code."','".$brand_name."','".$b_code."','".$sku_number."') ";
                           $run=mysqli_query($con,$sql) or die(mysqli_error($con ));
                          // move_uploaded_file(['image'],$imagetmp);
                             date_default_timezone_set("Asia/Kolkata");
                           $pro_time = date('Y-m-d H:i:s');
                    $sql_1="INSERT INTO my_log(email,prod_name,prod_sku,pro_time) VALUES('".$email."','".$item_name."','".$sku_number."','".$pro_time."')";
                    $run=mysqli_query($con,$sql_1) or die(mysqli_error($con ));
                           
                           
                       if ($run) {
                        echo "<script>
                              alert('The New Product has been added.');
                             window.location.href = 'http://localhost/myskugenerator/users/testingFormi.php';
                               
                                </script>;
                               ";  }
            }                //alert('The New Product has been added.');
                             //window.location.href = 'http://localhost/weblight/BS3/testingFormi.php';
}
?>
                      

                
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


</html>

    

        

        
