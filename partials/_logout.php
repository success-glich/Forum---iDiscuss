<?php
    echo "Logging you out. Please wait...";
    session_start();
    session_destroy();
    header("location:/forum/index.php");

?>