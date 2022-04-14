    <?php
require 'connection.php';
$description=str_replace("'", "\'", $_POST['description']);
$query="insert into coment values('".$_POST['id']."','".$_POST['bid']."','".$_POST['name']."','$description',CURRENT_DATE)";
$result=  mysqli_query($con, $query);
if($result)
{
    $query="select*from coment where bid='".$_POST['bid']."' order by date desc";
    $result=  mysqli_query($con, $query);
    if($result)
    {
        while ($data=  mysqli_fetch_assoc($result))
        {
            ?>
 <div class="review" style="width:30%;margin-top: 3%">
     <p><img src="https://img.icons8.com/ios/50/000000/user-male-circle.png" style="float:left;margin-left: -17%"/><h3><?php echo $data['name']; ?></h3></p>
        <p style="margin-top:-2%"><label style="color: #999999;margin-left: -2%;font-size: 13px"><?php echo $data['date'] ?></label></p>
        <p><h5 style="font-weight:200"><?php echo $data['coment'] ?></h5></p>
     
        </div>
<?php
        }
    }
}
 else {
    echo 'something went wrong';    
}
?>