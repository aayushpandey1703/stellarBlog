<?php
require 'connection.php';               
$query="delete from blog where bid='".$_POST['bid']."'";
$result=  mysqli_query($con, $query);
if($result)
{
    ?>
<script>
alert('Blog deleted');
window.location.href="index.php";
</script>
<?php
        
    }
    else{
        header("location:blog.php");
    }
