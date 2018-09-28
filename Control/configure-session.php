<!DOCTYPE html>

<html lang="en">

<head>
   
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="Style/Bootstrap-4/css/bootstrap.css">
    <script src="Style/Bootstrap-4/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../Style/CSS/main.css">
    <?php include("../View/navbar.php"); ?>
    <?php include("../Database/dbconnect.php"); ?>
    
    <style>
    
        body
         {
             background-color: black;
         }
    
         .card
         {
             margin: 0 auto;
             margin-top: 10px;
             background-color: #fff;
             width: 50%;
         }
         
         .logo
         {

             position: relative;
             border-radius: 5px;
         }
        
         .submission
         {
             margin: 0 auto;
             text-align: center;
         }
         
         label
         {
             margin: 0 auto;
             margin-left: 5px;
             position: relative;
             color: #333;
         }
        
         ul,li
        {
            list-style-type: none;
        }
         
     </style>
    
    <title>Configure</title>
    
</head>

<!--
 
     -> Subdomain
     -> Username
     -> Token
 
 -->

 <body>
    
    <form action="" method="post">

       <div class="card" style="width: 500px;">
        <ul class="list-group list-group-flush">
         <li class="list-group-item mx-auto">Zendesk Migration Manager</li>
         <br>
         <li class="list-group-item">
          <select class="custom-select" name="db_select">
            <option value="#" name="#" selected>--Select Database Table--</option>
            <option value="mmct_maf_data">MMCT-MAF</option>
            <option value="jtctrs_data">JTCTRS-DB</option>
          </select>
         </li>
         <br>
         <li class="list-group-item">
          <select class="custom-select" name="subdomain">
           <option value="#" name="#" selected>--Select Subdomain--</option>
           <option value="mmct-sd">MMCT</option>
           <option value="jtctrs-sd">JTCTRS</option>
          </select>
         </li>
         <br>
         <li>
          <div class="form-group">
           <label for="token">API Token</label>
           <input type="text" class="form-control" placeholder="Enter Your Token" name="token">
          </div>
          </li>
          <br>
          <li>
           <div class="form-group">
            <label for="username">Username/Email</label>
            <input type="text" class="form-control" placeholder="Enter Your Username or E-mail" name="username">
           </div>
          </li>
          <br>
          <li>
           <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" class="form-control" placeholder="Enter Your Password" name="password">
           </div>
          </li>
          <li>
            <div class="form-group submission">

             <input class="btn btn-danger col-sm-4" type="reset" name="reset_fields" value="Reset"> 

            <!-- onclick='confirmation()' -->
            
             <button type="submit" onclick='confirmation()' class="btn btn-success col-sm-4 ">Migrate</button>
           
            </div> 
          </li>
         </ul>
        </div>

    </form>
    
    <script type="text/javascript">
           
    function confirmation(){

        var c = confirm("[!] You're about to convert a database into trouble tickets, proceed?")

        if(c == true)
            {
              var db = document.getELementByName('db_select').value;
              var dmn = document.getElementByName('subdomain').value;
              var token = document.getELementByName('token').value;
              var uname = document.getElementByName('username').value;
              var pass = document.getElementByName('password').value;
                
              window.location.href = ("configure-session.php?db_select="+db+"&subdomain="+dmn+"&token="+token+"&username="+uname+"&password="+pass);
            }
        else
            {
             window.location.back();
            }
    }
               
     </script>
     <br>
     <br>
     <div class="card" style="width: 500px;">
     <br>
     <h6 class="mx-auto"><u>Migrated Records</u></h6>
     <br>
     <div class="table-wrapper">
       <table class="table-light table-bordered mx-auto">
           <thead>
               <tr>
                    <th>Ticket</th>
                    <th>Subject</th>
                    <th>Body</th>
                    <th>Priority</th>
               </tr>
           </thead>
           <tbody>

                        
            <?php
               
             //load Composer

             require 'C:\Users\rober\vendor\autoload.php';

             use Zendesk\API\HttpClient as ZendeskAPI;

             $database_table = $_POST['db_select'];
             $subdomain = $_POST['subdomain'];
             $token = $_POST['token'];
             $username = $_POST['username'];
             $password = $_POST['password'];

             $client = new ZendeskAPI($subdomain);

             $client->setAuth('basic', ['username' => $username, 'token' => $token]);

             function createTicket($client, $subject, $body, $priority)
             {
                 $ticket = $client->tickets()->create([
                     'subject' => $subject,
                     'comment' => [
                     'body' => $body ],
                     'priority' => $priority,    
                 ]);
             }

             // createTicket($client, $subject, $body, $priority);

             $select_query = "SELECT TICKET,PROBLEM,DISCREPANCY FROM ".$database_table;

               
             $tx_select_query = mysqli_query($connection, $select_query);

             while($row = mysqli_fetch_assoc($tx_select_query))
             {
                 $ticket_number = $row['TICKET'];
                 $subject = $row['PROBLEM'];
                 $body = $row['DISCREPANCY'];
                 $priority = 'ROUTINE';
                 echo "<tr>";
                 echo "<td> $ticket_number </td>";
                 echo "<td> $subject </td>";
                 echo "<td> $body </td>";
                 echo "<td> $priority </td>";
                 echo "</tr>";
                 createTicket($client,$subject,$body,$priority);
             }

            ?>    
               

           </tbody>
        </table>
       </div>
      </div>
      
      <br>
      <br>
      <br>
     
     
    
 </body>

</html>