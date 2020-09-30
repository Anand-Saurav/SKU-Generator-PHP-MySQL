

<?php 
        include 'header.php';;                               

                               if (isset($_POST['search'])) 
                                  {
                                    $valuetosearch=$_POST['valuetosearch'];
                                     $valuetosearch;
                                    $query="select * from `item_list` where concat(main_category,main_code,sub_category,sub_code,item_name,item_code,brand_name,brand_code,sku_number) like '%".$valuetosearch."%'";
                                      $search_result=filterTable($query);
                                     

                                   }
                                     else
                                    {         
                                              $query="select * from item_list";
                                              $search_result=filterTable($query);
                                              
                                    }
                                
                              
                                       

                            function filterTable($query)
                            {
                                $con=mysqli_connect("localhost","root","","skugenerator");
                                $filter_result=mysqli_query($con,$query);
                                return $filter_result;
                             }   
                                ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><center><b>SKUs of All Products</b></center></h4>
                                <p class="category"></p>
                            </div>

                            <div class="content">
            <div class="container-fluid">
                         
                              <form method="POST" autocomplete="off">
                                   
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="Search Here" name="valuetosearch" required>
                                            </div>
                                         </div>       
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                 <input type="submit" name="search" value="Apply Here" class="btn btn-info btn-fill">
                                            </div>
                                        </div>
                                     </div>   

                                     <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                       
                                        <th>Main Category</th>
                                        <th>Main Code</th>
                                        <th>Sub Category</th>
                                        <th>Sub Code</th>
                                        <th>Item name</th>
                                        <th>Item Code</th>
                                        <th>Brand Name</th>
                                        <th>Brand Code</th>
                                        
                                        <th>SKU Number</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php 
                                            while ($row=mysqli_fetch_array($search_result)) {
                                                # code..
                                              //  $class = ($i == 0) ? "" : "alt";
                                                echo "<tr>";
                                                  //echo "<td><img src='images/'".$row[0]."></td>";
                                                 echo "<td>".$row[1]."</td>";
                                                  echo "<td>".$row[2]."</td>";
                                                  echo "<td>".$row[3]."</td>";
                                                  echo "<td>".$row[4]."</td>";
                                                  echo "<td>".$row[5]."</td>";
                                                  echo "<td>".$row[6]."</td>";
                                                  echo "<td>".$row[7]."</td>";
                                                  echo "<td>".$row[8]."</td>";
                                                  echo "<td>".$row[9]."</td>";
                                                echo "</tr>";
                                                // $i = ($i==0) ? 1:0;
                                            }

                                            ?>
                                        </tr>
                                    
                                    </tbody>
                                </table>

                            </div>
                                      
                                </form>  
                              
            </div> 
         </div>      


                            
                        </div>
                    </div>


                   


                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="">Anand</a>
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


</html>
