<?php
session_start();

if(isset($_SESSION['name']))
{
    session_unset();
    session_destroy();
    header("location:/myproject /home.php?show=$showAlert");
}else
{
    echo "not set";
}

    



?>