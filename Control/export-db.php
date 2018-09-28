<?php session_start(); ?>

<?php

    $_SESSION['USERNAME'] = $_SESSION['USERNAME'];
    $_SESSION['USER_PASS'] = $_SESSION['USER_PASS'];

 ?>

<!DOCTYPE html>

<html lang="en">

<head>
   
    <meta charset="UTF-8">
    
    <title>Export Database</title>
    
    <link rel="stylesheet" href="Style/Bootstrap-4/css/bootstrap.css">
    <script src="Style/Bootstrap-4/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../Style/CSS/main.css">
    <?php include("../Database/dbconnect.php"); ?>
    <?php include("../View/navbar.php"); ?>
    
    <style>
    
        body
        {
            background-color: black;
        }
        
        h6
        {
            color: white;
            margin: 0 auto;
        }
        
        form
        {
            align-content: center;
        }
        
        .card
        {
            margin-top: 10px;
            background-color: darkgray;
        }
        
        #customFile .custom-file-control:lang(en)::after 
        {
            content: "Select file...";
        }
        
    </style>
    
</head>

    <body>

                <div class="card" style="width: 500px;">
                   
                   <form class="mx-auto" action="" method='POST' enctype='multipart/form-data'>
                       
                       <div class="form-group" style="width: 400px;">
                       
                         <!-- 
                          - Select the Table
                           -->
                          
                           <br>
                          
                           <h6><u>Table Selection</u></h6>
                           
                           <br>
                           
                           <select class="custom-select" name="db_select">
                             <option value="#" name="#" selected>--Select Table--</option>
                             <option value="mmct_maf_data">MMCT_MAF</option>
                           </select>
                       
                           <br>
                           <br>
                           
                       
                       <!-- File Upload Form -->
                       <!-- Corresponding Script Parses .CSV Format -->
                    
                       
                       <div class="mx-auto">
                       
                       <br>
                       
                           <h6><u>Export the Database Table</u></h6>

                       <br>  
                          
                        </div>

                        <br>

                        <div class="form-group mx-auto">

                           <input class="btn btn-danger col-sm-4" type="reset" name="reset_fields" value="Reset"> 

                           <input class="btn btn-success col-sm-4" type="submit" name="Export" value="Export"> 

                        </div> 
                        
                       </div> 

                   </form>
                   
                   
                   
       <?php

            /*
               mmct_maf_data table structure
               0 (TICKET) -> Auto-incremented
               1 TICKET_ID
               2 DATETIME
               3 PROBLEM
               4 UNIT
               5 DEVID
               6 RSSID
               7 SITE
               8 COMSTECH
               9 SYSTEM
               10 DISCREPANCY
               11 CORRECTIVE_ACTION
               12 DATETIME_CORRECTED
               13 CORRECTED_BY
               14 DEV_CAPABILITY

            */

            $table = $_POST['db_select'];  
                    
            $export = "db_export.sql";
                    
            $query = "SELECT * INTO OUTFILE '$export' FROM $table";
                    
            $tx_query = mysqli_query($query,$connection);

                    
        ?>

         
        </div>
   
    </body>

</html>
