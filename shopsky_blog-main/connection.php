<?php
$host='localhost';
$user='root';
$db='shopsky_blog';
$pass='';
$con=  mysqli_connect($host, $user, $pass, $db);

if(!$con)
{
    echo 'something went wrong';
}
?>