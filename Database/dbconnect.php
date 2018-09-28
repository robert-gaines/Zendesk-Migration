<?php

        error_reporting(~E_ALL);

        $server = '127.0.0.1';
        $user = 'root';
        $pass = "";
        $db = "zendesk_migration";

        $connection = mysqli_connect($server,$user,$pass,$db);

        if($connection)
        {
            //echo "[*] DB Connection Successful";
        }
        else
        {
            //echo "[!] DB Connection Failed";
        }

 ?>