<?php

    session_start();
    if($_REQUEST["idq"])
    {
        $_SESSION['id_no'] = $_REQUEST["idq"];
        echo "Received";
    }
    else
    {
        echo "Not received";
    }

?>