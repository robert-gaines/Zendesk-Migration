<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    
     <?php include("../Database/dbconnect.php") ?>
    
                                                                                                                                                            
     <?php  
    
        $_SESSION['USERNAME'] = null;
        $_SESSION['USER_FIRSTNAME'] = null; 
        $_SESSION['USER_LASTNAME'] = null;
        $_SESSION['USER_PASS'] = null;
    
        header("Location: ../index.php");
    
      ?>
      
</body>
</html>