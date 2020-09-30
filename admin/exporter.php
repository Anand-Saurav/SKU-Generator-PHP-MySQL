<?php
              
                             function runQuery($query) {
                                $con=mysqli_connect("localhost","root","","skugenerator");
                             $result = mysqli_query($con,$query);
                             while($row=mysqli_fetch_assoc($result)) {
                             $resultset[] = $row;
                               }   
                                if(!empty($resultset))
                                            return $resultset;
                              }

                              if (isset($_POST['export'])) {
                                $product_result=runQuery("select * from item_list");
                              $filename = "Export_excel.xls";
                              header('Content-type: application/ms-excel');
                              header('Content-Disposition: attachment; filename='.$filename);
                               $isPrintHeader = false;
                              if (! empty($product_result)) {
                              foreach ($product_result as $row) {
                              if (! $isPrintHeader) {
                                      echo implode("\t", array_keys($row)) . "\n";
                                      $isPrintHeader = true;
                                  }
                                  echo implode("\t", array_values($row)) . "\n";
                              }
                          }
                          exit();
                      }



                                ?>