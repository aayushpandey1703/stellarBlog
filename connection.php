<?php
$host='stellarblog-server.mysql.database.azure.com';
$user='vjimpvyxwf';
$db='shopsky_blog';
$pass='';
$con=  mysqli_connect($host, $user, $pass, $db);

if(!$con)
{
    echo 'something went wrong';
}
?>
