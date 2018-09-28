<!DOCTYPE html>

<html lang="en">

<head>
   
    <meta charset="UTF-8">
    
    <title>Import to Database</title>
    
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
                       
                       <div class="form-group">
                       
                         <!-- 
                          - Select the Table
                           -->
                          
                           <br>
                          
                           <h6>Table Selection</h6>
                           
                           <br>
                           
                           <select class="custom-select" name="db_select">
                             <option value="#" name="#" selected>--Select Table--</option>
                             <option value="mmct_maf_data">MMCT_MAF</option>
                           </select>
                       
                           <br>
                           <br>
                           
                           <input class="btn btn-danger" type="Submit" name="truncate" value="Purge Database">
                           
                           <br>
                           <br>
                       
                       <!-- File Upload Form -->
                       <!-- Corresponding Script Parses .CSV Format -->
                       
                       <hr>
                       
                       <div class="mx-auto">
                       
                       <br>
                       
                       <h6>Update the Database</h6>
                       
                       <br>
                       
                    
                         <div class="input-group mb-3">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="data_file" value="data_file">
                            <label class="custom-file-label" for="data_file">Choose file</label>
                          </div>
                        </div>

                        <br>  
                          
                           </div>

                           <br>

                        <div class="form-group">

                           <input class="btn btn-warning col-sm-3" type="reset" name="reset_fields" value="Reset"> 

                           <input class="btn btn-success col-sm-3" type="submit" name="Submit" value="Submit"> 

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

            $tmp = $_FILES['data_file']['tmp_name'];

            $handle = file($tmp);

            $db = $_POST['db_select'];

            for($i = 1; $i < count($handle); $i++)
            {
                $temp = $handle[$i];
                list($TICKET_ID,$DATETIME,$PROBLEM,$UNIT,$DEVID,$RSSID,$SITE,$COMSTECH,$SYSTEM,$DISCREPANCY,$CORRECTIVE_ACTION,$DATETIME_CORRECTED,$CORRECTED_BY,$DEV_CAPABILITY) = explode(',', $temp);
                //
                $tickets[$i] = array('TICKET_ID'=>$TICKET_ID,'DATETIME'=>$DATETIME,'PROBLEM'=>$PROBLEM,'UNIT'=>$UNIT,'DEVID'=>$DEVID,'RSSID'=>$RSSID,'SITE'=>$SITE,'COMSTECH'=>$COMSTECH,'SYSTEM'=>$SYSTEM,'DISCREPANCY'=>$DISCREPANCY,'CORRECTIVE_ACTION'=>$CORRECTIVE_ACTION,'DATETIME_CORRECTED'=>$DATETIME_CORRECTED,'CORRECTED_BY'=>$CORRECTED_BY,'DEV_CAPABILITY'=>$DEV_CAPABILITY);

                $query = "INSERT INTO ".$db."(TICKET_ID,DATETIME,PROBLEM,UNIT,DEVID,RSSID,SITE,COMSTECH,SYSTEM,DISCREPANCY,CORRECTIVE_ACTION,DATETIME_CORRECTED,CORRECTED_BY,DEV_CAPABILITY)";
                $query .= "VALUES('{$TICKET_ID}','{$DATETIME}','{$PROBLEM}','{$UNIT}','{$DEVID}','{$RSSID}','{$SITE}','{$COMSTECH}','{$SYSTEM}','{$DISCREPANCY}','{$CORRECTIVE_ACTION}','{$DATETIME_CORRECTED}','{$CORRECTED_BY}','{$DEV_CAPABILITY}')";

                $tx_query = mysqli_query($connection, $query);
            }

        ?>

        <?php

            /*

            - Script Truncates a specified database table
            - Option clears the existing content in preparation
              for the introduction of new data

            */

            if(isset($_POST['truncate']) && isset($_POST['db_select']))
            {
                $db = $_POST['db_select'];
                //
                $truncate_query = "TRUNCATE TABLE ".$db;
                //
                $tx_truncate = mysqli_query($connection, $truncate_query);
            }
            else
            {
                echo "";
            }

         ?>
         
        </div>
   
    </body>

</html>
