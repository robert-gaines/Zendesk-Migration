<!DOCTYPE html>

<html lang="en">

<head>
   
    <meta charset="UTF-8">
   
     <link rel="stylesheet" href="Style/Bootstrap-4/css/bootstrap.css">
     <script src="Style/Bootstrap-4/js/bootstrap.js"></script>
     
     <style>
    
        body
         {
             background-color: darkgray;
         }
    
         .card
         {
             margin: 0 auto;
             margin-top: 10px;
             background-color: black;
             width: 50%;
         }
         
         .logo
         {

             position: relative;
             border-radius: 5px;
         }
         
         label
         {
             margin: 0 auto;
             position: relative;
             color: white;
         }
         
     </style>
      
    <title>Zendesk Interface</title>
    
</head>

 <body>
 
    <div class="card mx-auto">
        
        <div class="card mx-auto">
            
            <img class="logo" src="Style/Images/QD-Black.png" alt="logo">
            
        </div>
        
        <form action="Control/process-login.php" method="POST">
        <div class="card-body">
         <div class="form-group text-center">
          <label for="user">Username</label>
          <input type="text" class="form-control col-sm-6 mx-auto" name="user">   
         </div>
         <div class="form-group text-center">
          <label for="password">Password</label>
          <input type="password" class="form-control col-sm-6 mx-auto" name="password">
         </div>                            
        </div>
        <div class="form-group text-center">
         <div class="col-sm-12">
          <button type="reset" class="btn btn-danger col-sm-3"> Reset </button>
          <button type="submit" class="btn btn-primary col-sm-3 " name="login">Submit</button>
         </div>
         </div>
        </form>

        
    </div>
          
 </body>

</html>