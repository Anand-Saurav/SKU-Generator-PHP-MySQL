        <?php 
            include 'header.php';
                            $query="select * from maincategories";
                            $result=mysqli_query($con,$query);
        ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Main Categories</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Main Category</th>
                                    	<th>Main Category Code</th>
                                    	
                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<?php 
                                            while ($row=mysqli_fetch_array($result)) {
                                                # code..
                                              //  $class = ($i == 0) ? "" : "alt";
                                                echo "<tr>";
                                                  echo "<td>".$row[0]."</td>";
                                                  echo "<td>".$row[1]."</td>";
                                                 
                                                echo "</tr>";
                                                // $i = ($i==0) ? 1:0;
                                            }

                                            ?>
                                        </tr>
                                     
                                    </tbody>
                                </table>
                            </div>

                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                         
                              <form method="_POST" enctype="multipart/form-data" autocomplete="off">
                                   <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label id="demo">Add New Main Category</label>
                                            </div>
                                        </div>
                                    </div>    

                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="Enter New Main Category" name="main_category" required="">
                                            </div>
                                         </div>       
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                 <input type="submit" name="submit" value="Submit " class="btn btn-info btn-fill">
                                            </div>
                                        </div>
                                     </div>   
                                       <?php 
                               

                               if (isset($_REQUEST['submit'])) {
                                  $main_category=$_REQUEST['main_category'];
                                 $sql="INSERT INTO maincategories (main_category) VALUES('".$main_category."') ";
                                 $run=mysqli_query($con,$sql) or die(mysqli_error($con ));
                                 if ($run) {
                               echo 'The New Main Category has been added.';
                               echo "<script>
                                window.location.href = 'http://localhost/myskugenerator/admin/adminmaintable.php';
                                </script>;
                               ";
                                       }
                                      

                                    }
                                ?>
                                </form>  
                              
            </div> 
         </div>      

        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js">
           $(document).ready(function(){

            $("#submit").click(function(){
               var main_category = $("#main_category").val();
                  var main_code = $("#main_code").val();
          
               $.ajax({
                  url:'maintable.php',
                     type:'post',
                 data:{main_category:main_category,main_code:main_code},
                 success:function(response){
                location.reload(); // reloading page
             }
              });
        
              });
            });
        </script>           




<!--
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-down">
                    
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="">Technoplanet Lab</a>
                </p>
            </div>
        </footer>
-->




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


</html>
