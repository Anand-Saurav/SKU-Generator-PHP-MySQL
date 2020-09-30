<?php
include 'header.php';
?>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><center><b>Product Logs</b></center></h4>
                                <p class="category"></p>
                            </div>

                            <div class="content">
            <div class="container-fluid">
                         
                                

                                     <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                       
                                        <th>Created By</th>
                                        <th>Product Added</th>
                                        <th>SKU Created</th>
                                        <th>Created At</th>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php 
                                            $query="select * from my_log";
                                              $filter_result=mysqli_query($con,$query);
                                            while ($row=mysqli_fetch_array($filter_result)) {
                                                # code..
                                              //  $class = ($i == 0) ? "" : "alt";
                                                echo "<tr>";
                                                  //echo "<td><img src='images/'".$row[0]."></td>";
                                                 echo "<td>".$row[1]."</td>";
                                                  echo "<td>".$row[2]."</td>";
                                                  echo "<td>".$row[3]."</td>";
                                                 echo "<td>".$row[4]."</td>";
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
                    </div>


                   



        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><center><b>Logins and Logouts </b></center></h4>
                                <p class="category"></p>
                            </div>

                            <div class="content">
            <div class="container-fluid">
                         
                               

                                     <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                       <th>Username</th>
                                        <th>Login Time</th>
                                        <th>Logout Time</th>
                                        

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php 
                                            $query1="select * from login_out";
                                              $filter_result1=mysqli_query($con,$query1);
                                            while ($row=mysqli_fetch_array($filter_result1)) {
                                                # code..
                                              //  $class = ($i == 0) ? "" : "alt";
                                                echo "<tr>";
                                                  //echo "<td><img src='images/'".$row[0]."></td>";
                                                 echo "<td>".$row[3]."</td>";
                                                  echo "<td>".$row[1]."</td>";
                                                  echo "<td>".$row[2]."</td>";
                                                 
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
                    </div>


                   


                </div>
            </div>
        </div>

<?php
include 'footer.php';
?>