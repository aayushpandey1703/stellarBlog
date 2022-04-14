<?php 
require 'connection.php';

if(isset($_POST['tobook']))
{
    $query="insert into wishlist values('".$_POST['id']."','".$_POST['bid']."')";
    $result=  mysqli_query($con, $query);
    if($result)
    {
        ?>
<div id="unbook">
 <input type="hidden" id="id" value="<?php echo $_POST['id'] ?>"/>
                      <input type="hidden" id="bid" value="<?php echo $_POST['bid'] ?>"/>
                      <button class="bt1" id="unbook" value="tounbook" style="outline:none;border:none;background: none;" ><i class="fas fa-bookmark" id="btn"></i></button>
</div>
<?php
    }
}
if(isset($_POST['tounbook']))
{
    $query="delete from wishlist where id='".$_POST['id']."' and bid='".$_POST['bid']."'";
    $result=  mysqli_query($con, $query);
    if($result)
    {
        ?>
<div id="book">
    <input type="hidden" id="id" value="<?php echo $_POST['id'] ?>"/>
                      <input type="hidden" id="bid" value="<?php echo $_POST['bid'] ?>"/>
                      <button class="bt1" id="book" value="tobook" style="outline:none;border:none;background: none;" ><i class="far fa-bookmark" id="btn"></i></button>
</div>
    <?php
    }
}
?>