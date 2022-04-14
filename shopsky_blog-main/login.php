<?php
require 'connection.php';
$query="SELECT*from login where email='".$_POST['email']."' and password='".$_POST['password']."'";
$result=  mysqli_query($con, $query);
$data= mysqli_fetch_assoc($result);
if($result && mysqli_num_rows($result)>0)
{
    session_start();
    $_SESSION['id']=$data['id'];
    $_SESSION['name']=$data['name'];
    $_SESSION['role']=$data['role'];
    if($data['role']=='admin')
    {
        ?>
<script>
alert('successfully logged in');
window.location.href="index.php";
</script>
<?php
    }
    else{
        ?>
<script>
alert('successfully logged in');
window.location.href="login1.php";
</script>
<?php
    }


}
else{
    ?>
<script>
alert('User does not exist');
window.location.href="login1.php";
</script>
<?php
}
?>