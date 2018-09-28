<!DOCTYPE html>

<?php session_start() ?>

<?php

    $_SESSION['USERNAME'] = $_SESSION['USERNAME'];
    $_SESSION['USER_PASS'] = $_SESSION['USER_PASS'];

 ?>

<html lang="en">

<head>
   
    <meta charset="UTF-8">
    
    <title>Landing</title>
    
    <link rel="stylesheet" href="Style/Bootstrap-4/css/bootstrap.css">
    <link rel="stylesheet" href="Style/Font-Awesome/css/all.css">
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

        
        <?php
        
            $query_m = "SELECT * FROM mmct_maf_data";
            $tx_m = mysqli_query($connection, $query_m);
            $mmct_records = mysqli_num_rows($tx_m);
        
            $query_j = "#";
            $tx_m = mysqli_query($connection, $query_j);
            $jtctrs_records = mysqli_num_rows($tx_j);
        
         ?>

        <div class="card" style="width: 500px;">
            <br>
            <h5 class='mx-auto'><u>Administrator Landing Page</u></h5>
            
            <div class="card mx-auto">
            <br>
             <i class="fa fa-database fa-5x mx-auto"></i>
            <div class="card-body mx-auto">
            <h5 class="card-title mx-auto"> <u>MMCT</u> </h5>
            <h6 class="card-title mx-auto"> Transient Database Records</h6>
            <h6 class='mx-auto'><?php echo $mmct_records ?></h6>
         </div>
        </div>
        <br>
        <div class="card mx-auto">
            <br>
             <i class="fa fa-database fa-5x mx-auto"></i>
            <div class="card-body mx-auto">
            <h5 class="card-title mx-auto"> <u>JTC-TRS</u> </h5>
            <h6 class="card-title mx-auto"> Transient Database Records</h6>
            <h6 class='mx-auto'><?php echo /* $jtctrs_records */ "0" ?></h6>
         </div>
        </div>
        <br>
       </div>     
    
   
    </body>

</html>
