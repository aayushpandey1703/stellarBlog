<?php

    session_start();
    session_unset();
    session_destroy();
    echo "<script>alert('Logget out successful');window.location.href = 'index.php';</script>";
    die();

?>