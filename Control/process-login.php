
<?php    

    session_start();

    include("../Database/dbconnect.php");

    if(isset($_POST['login']))
    {
        $uname = $_POST['user'];
        $pass = $_POST['password'];
        echo $uname."<br>";
        echo $pass;
    }

    $username = mysqli_real_escape_string($connection, $uname);

    $password = mysqli_real_escape_string($connection, $pass);

    $query = "SELECT * FROM authorized_users WHERE username = '{$uname}' ";

    $select_user = mysqli_query($connection, $query);

    if(!$select_user)
    {
        die("[!] Query Failed ");
    }

    while($row = mysqli_fetch_array($select_user))
    {
        $USERNAME = $row['username'];
        $USER_PASSWORD = $row['user_pass'];
        $USER_FIRST = $row['user_first'];
        $USER_LAST = $row['user_last'];
    }
    
    $password = crypt($password, $USER_PASSWORD);

    if($username !== $USERNAME && $password !== $USER_PASSWORD)
    {
        header("Location: ../index.php");
    }
    else if($username === $USERNAME && $password === $USER_PASSWORD)
    {
        header("Location: admin-landing.php");
        $_SESSION['USERNAME'] = $USER_NAME;
        $_SESSION['USER_FIRSTNAME'] = $USER_FIRST;
        $_SESSION['USER_LASTNAME'] = $USER_LAST;
        $_SESSION['USER_PASS'] = $USER_PASSWORD;
    }
    else
    {
        header("Location: ../index.php");
    }
    

 ?>