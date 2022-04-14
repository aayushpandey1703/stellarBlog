<?php
    //session start
    session_start();
    //connection to database
    require 'connection.php';
    //ajax request part
    if($_REQUEST["classid"])
    {
        $val = $_REQUEST["classid"];
        $result = $con->query("SELECT * FROM blog WHERE bid=$val");
        if(!$result) die($con->error);
        $row = $result->fetch_array(MYSQLI_ASSOC);

        $like_val = $row['likes'];
        $like_val++;

        $result= $con->query("UPDATE blog SET likes = $like_val WHERE bid=$val");
        if(!$result) die($con->error);
        else echo $like_val." Likes";

    }
    else
        echo "Not accepted";

?>