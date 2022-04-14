<?php
    //session start
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['id_no']))
    {
        echo "<script> window.location.href = 'testing.php'; </script>";
    }
    $no_id = $_SESSION['id_no'];
$query="select*from blog where bid='".$_SESSION['id_no']."'";
$result=  mysqli_query($con, $query);
$query2="select count(*) as num from coment where bid='".$_SESSION['id_no']."'";
$result2=  mysqli_query($con, $query2);
$num=  mysqli_fetch_assoc($result2);
$row=  mysqli_fetch_assoc($result);
$sql2="select*from wishlist where id='".$_SESSION['aid']."' and bid='".$_SESSION['id_no']."'";
$res2=  mysqli_query($con, $sql2);
$num3=  mysqli_num_rows($res2);
if($num3>0)
{
    $i=1;
}
 else {
$i=0;    
}

    if(isset($_SESSION['last_login_timestamp']))
    {
        $sessiontimeval = $_SESSION['last_login_timestamp'];
        if(time()-$sessiontimeval>30)
        {
            header('location:logout.php');
            die();
        }
    }

    //connection to database
 require 'connection.php';
    $sql="select count(*) as num from blog";
    $res=  mysqli_query($con, $sql);
    $num2=  mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BLOG | Page</title>
        <link rel="stylesheet" href="styles/styles.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://kit.fontawesome.com/b1a6e9234b.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <!--
    <div class="review" style="width:30%;margin-top: 3%">
     <p><img src="https://img.icons8.com/ios/50/000000/user-male-circle.png" style="float:left;margin-left: -19%"/><h3><?php echo $data['name']; ?></h3></p>
        <p style="margin-top:-2%"><label style="color: #999999;margin-left: -2%;font-size: 13px"><?php echo $data['date'] ?></label></p>
        <p><h5 style="font-weight:200"><?php echo $data['coment'] ?></h5></p>
        </div>
    -->
    <style>
        .total-div-container div:nth-child(2) .bt1{
    font-size: 50px;
    margin-right: 1em;
    height: 100%;
    width: 0.5em;
    outline: none;
}
.total-div-container div:nth-child(2) button.bt1{
    border: none;
    background-color: transparent;
}

   

    </style>
    <body>
        
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:10%">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>         
          <div class="form-group">
               <input type="hidden" id="name" value="<?php echo $_SESSION['login_val'] ?>"/>
        <input type="hidden" id="bid" value="<?php echo $_SESSION['id_no'] ?>"/>
        <input type="hidden" id="id" value="<?php echo $_SESSION['aid'] ?>"/>
            <label for="message-text" class="col-form-label">Comment:</label>
            <textarea class="form-control" id="msg"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="height:10%">Close</button>
          <button type="button" class="btn btn-primary" id="send" data-dismiss="modal"  style="height:10%">send</button>
      </div>
    </div>
  </div>
</div>
    <!-- Navigation Section -->
    <nav>
                                      <img src="image/shopsky.jpg" style="height:50px;position: absolute;margin-top: 5px"/> <h5 style="margin-left:60px;position: absolute;margin-top: 10px;font-family: sans-serif;font-weight: 600;font-size: 30px">Shopsky</h5>

        <ul>
            <li class="toggle items"><button id="button_toggle" onclick="mytoggle()"><span class="bars"></span>
                </button></li>
                <li class="activated" id="home"><a href="index.php" style="text-decoration:none;color:black">Home</a></li>
            <li class="" id="contact"><a href="contact.html" style="text-decoration:none;color:black">Contact Us</a></li>
            <li class="" id="about"><a href="about.php" style="text-decoration:none;color:black">About Us</a></li>
             <?php
                        if(isset($_SESSION['aid']))
                        {
                            ?>
                        <li class="" id="home" ><a href="mypost.php" style="text-decoration:none;color:black">Wishlist</a></li>
                        <?php
                        }
                        ?>
              <?php
                        if(isset($_SESSION['role']))
                        {
                            if($_SESSION['role']=='admin')
                            {
                                ?>
                        <li class="activated" id="about"><a href="add_post.php" style="text-decoration:none;color:black">Add Post</a> (<?= $num2['num'] ?> posts)</li>
                        <?php
                            }
                        }
                        ?>
            <li class="login" id="login"><a href="
                <?php 
                                    if(isset($_SESSION['login_val']))
                                    {
                                        if($_SESSION['role']=='reader')
                                        {
                                        echo "logout.php";
                                        }
                                        else{
                                            echo 'signup.php';
                                        }
                                    }
                                    else{
                                        echo "signup.php";
                                    }
                                ?>" style="text-decoration:none;color:white">
                                <?php
                                        if(isset($_SESSION['login_val']))
                                        {
                                            if($_SESSION['role']=='reader')
                                            {
                                            echo "Logout";
                                            }
                                            else{
                                                echo 'Add Admin';
                                            }
                                        }
                                        else
                                        {
                                            echo "Login";
                                        }
                                ?>
            </a></li>
        </ul>
    </nav>
    <section class="all_blogs blog_section" style="margin: 5em 0 0;">
            <div class="total-div-container">
                <!-- Content Section -->
                <div class="content">
                    <h1><?= $row['title'] ?></h1>
                 
                    <img src="image/<?php echo $row['image'] ?>" width="100%" height="100%">
                    <h2><?php echo $row['author'] ?>, <?php echo substr($row['date'],0,4) ?></h2>
                    <p id="content_scroll"> 
                        <?php echo $row['description'] ?>
                    </p>
                </div>
                <!-- Like and Comment Section -->
                <div>
                    <button class="bt1 <?= $row['bid'] ?>" id="like-button" style="outline:none;border:none;background: none;"><i class="fas fa-thumbs-up" id="btn"></i></button><span id="value_like"><?= $row['likes'] ?> Likes</span>
                    <?php
                    if(isset($_SESSION['login_val']))
                    {
                        ?>
                    <button class="bt1" id="like-button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="outline:none;border:none;background: none;"><i class="fas fa-comments" id="btn"></i></button>

                    <?php
                    }
                    else{
                       ?>
                    <button class="bt1" id="like-button" style="outline:none;border:none;background: none;" onclick="redirect_page()"><i class="fas fa-comments" id="btn"></i></button>
                     <?php
                    }
                    ?>
                  
                 
                      <span id="value_like"><input type="text" value="<?php echo $num['num'] ?>" id="num_coment" style="border:none;outline: none;width: 13px"/> coment(s)</span>
                      <?php 
                      if(isset($_SESSION['login_val']))
                      {
                          ?>
                      <!-- bookmark  -->
                      <?php 
                      if($i==0)
                      {
                       ?>
                      <!-- unbook to book (filled icon)  -->
                      <div id="bookmark">
                      <div id="book">
                      <input type="hidden" id="id" value="<?php echo $_SESSION['aid'] ?>"/>
                      <input type="hidden" id="bid" value="<?php echo $_SESSION['id_no'] ?>"/>
                      <button class="bt1" id="book" value="tobook" style="outline:none;border:none;background: none;" ><i class="far fa-bookmark" id="btn"></i></button>
                      </div>
                      </div>
                      <?php
                      }
                      else{
                         ?>
                      <!-- book to unbook (unfilled icon)  -->
                      <div id="bookmark">
                      <div id="unbook">
                      <input type="hidden" id="id" value="<?php echo $_SESSION['aid'] ?>"/>
                      <input type="hidden" id="bid" value="<?php echo $_SESSION['id_no'] ?>"/>
                      <button class="bt1" id="unbook" value="tounbook" style="outline:none;border:none;background: none;" ><i class="fas fa-bookmark" id="btn"></i></button>
                      </div>
                      </div>
                      <?php
                      }
                      ?>
                
                      <?php
                      }
                      ?>
                      
                      
                    <?php 
                    if(isset($_SESSION['role']))
                    {
                        if($_SESSION['role']=='admin')
                        {
                            ?>
                      <form action="add_post.php" method="post" style="margin-top:-1%;margin-right: 6%"/>
                    <button class="bt1" id="like-button" type="submit" name="edit" style="outline:none;border:none;background: none;">
                          <input type="hidden" name="bid" value="<?php echo $_SESSION['id_no'] ?>"/>
                            <input type="hidden" name="title" value="<?php echo $row['title'] ?>"/>
                              <input type="hidden" name="description" value='<?php echo $row['description'] ?>'/>
                                <input type="hidden" name="author" value="<?php echo $row['author'] ?>"/>
                              <input type="hidden" name="date" value="<?php echo $row['date'] ?>"/>
                 <i class="fas fa-edit" id="btn"></i>
                    </button>
                </form>
                    <?php
                        }
                    }
                    ?>
                   
                       <?php 
                    if(isset($_SESSION['role']))
                    {
                        if($_SESSION['role']=='admin')
                        {
                            ?>
                      <form action="delete.php" method="post" style="margin-top:-1%;margin-right: 6%"/>
                      <button class="bt1" id="like-button" type="submit" name="delete" style="outline:none;border:none;background: none;">
                          <input type="hidden" name="bid" value="<?php echo $_SESSION['id_no'] ?>"/>
                         
                  <i class="fas fa-trash-alt" id="btn"></i></button>
                    
                    </button>
                </form>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div>
                    <h3>WRITTEN BY</h3>
                    <h2> - <?= $row['author'] ?></h2>
                </div>
            </div>
    </section>
    <hr style="margin-top:5%">
    <h2 style="margin-left: 10%;color: #999999;font-family: sans-serif;font-weight: 600;margin-top: 1%">Comments</h2>
    <div id="coment" style="margin-left: 15%;margin-top: 4%">
        <?php
       $query3="select*from coment where bid='".$_SESSION['id_no']."' order by date desc";
    $result3=  mysqli_query($con, $query3);
    if($result3)
    {
        if(mysqli_num_rows($result3)>0)
        {
        while ($data=  mysqli_fetch_assoc($result3))
        {
            ?>
 <div class="review" style="width:100%;margin-top: 3%">
     <p><img src="https://img.icons8.com/ios/50/000000/user-male-circle.png" style="float:left"/><h3><?php echo $data['name']; ?></h3></p>
        <p ><label ><?php echo $data['date'] ?></label></p>
        <p><h5 style="position: relative;font-weight:200;margin-left: 57px"><?php echo $data['coment'] ?></h5></p>
        </div>
<?php
        }
    }
    else{
    
    
    ?>
        <center><h3 style="color:#cccccc;font-family: serif;font-size: 30px;margin-top:5%;margin-bottom: 5%;margin-left: -20%">Be the first one to comment </h3></center>
        <?php
    }
    }
        ?>
        
    </div>
    
    <!-- Footer Section -->
   
    <footer>
            <div class="footer-container">
                <div class="footer-nav">
                    <!-- Media Section -->
                    <div class="social-media">
                        <h3>Social-Media</h3>
                        <ul>
                            <li><a href="" target="blank" style="text-decoration:none;color:white">
                                <i class="fab fa-twitter"></i>
                                <span>Twitter</span>
                            </a></li>
                            <li><a href="" target="blank" style="text-decoration:none;color:white">
                                <i class="fab fa-facebook-f"></i><span>  Facebook</span>
                            </a></li>
                            <li><a href="" target="blank" style="text-decoration:none;color:white">
                                <i class="fab fa-instagram"></i><span> Instagram</span>
                            </a></li>
                            <li><a href="" target="blank" style="text-decoration:none;color:white">
                                <i class="fab fa-linkedin-in"></i><span> Linkedin</span>
                            </a></li>
                        </ul>
                    </div>
                    <!-- Navigation Section -->
                    <div class="footer-navigation">
                        <h3>Navigation</h3>
                        <ul>
                            <li><a href="index.php" style="text-decoration:none;color:white">Home</a></li>
                            <li><a href="contact.html" style="text-decoration:none;color:white">Contact Us</a></li>
                            <li><a href="about.php" style="text-decoration:none;color:white">About Us</a></li>
                        </ul>
                    </div>
                    <!-- Contact Section -->
                    <div class="contact_me">
                        <h3 style="margin-left:-20%">Contact</h3>
                        <ul>
                            <li><a href="" style="text-decoration:none;color:white">
                                <i class="fas fa-phone-alt"></i>
                                <span> 9999999999</span>
                            </a></li>
                            <li><a href="" style="text-decoration:none;color:white">
                                <i class="far fa-envelope"></i>
                                <span> xyz@gmail.com</span>
                            </a></li>
                        </ul>
                    </div>
                </div>
                <!-- Copyrights Section -->
                <div class="copyright">
                    Copyright © 2020 All rights reserved
                </div>
            </div>
    </footer>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#send').click(function(e){
           e.preventDefault();
           var n=parseInt($('#num_coment').val());
           n=n+1;
           var n1=n.toString();
           $('#num_coment').val(n1);           
           var name=$("#name").val();
            var bid=$("#bid").val();
             var id=$("#id").val();
             var description=$('#msg').val();
            $.ajax({
               url:"comment.php",
               type:'post',
               data:{
                 'name':name,
                 'bid':bid,
                 'id':id,
                 'description':description
               },
               dataType:'text',
               success:function(result)
               {
                   $('#coment').html(result);
               }
               
            });
            
        });
    });
   $(document).ready(function(){
      $('#book').click(function(e){
          e.preventDefault();
          var id=$('#id').val();
          var bid=$('#bid').val();
          var tobook=$('#book').val();
          $.ajax({
             url:'bookmark.php',
             type:'post',
             data:{
                 'id':id,
                 'bid':bid,
                 'tobook':tobook
             },
             dataType:'text',
             success:function(result){
                 $('#bookmark').html(result);
             }
          });
      });
    
   });
   $(document).ready(function(){
        $('#unbook').click(function(e){
         e.preventDefault();
           var id=$('#id').val();
          var bid=$('#bid').val();
          var tounbook=$('#unbook').val();
          $.ajax({
             url:'bookmark.php',
             type:'post',
             data:{
                 'id':id,
                 'bid':bid,
                 'tounbook':tounbook
             },
             dataType:'text',
             success:function(result){
                 $('#bookmark').html(result);
             }
          });
      }); 
   });
    </script>
    <script>
        $(document).ready(function(){
            $("nav ul li button").on('click',function(){
                    //alert("Button clicked");
                    if($("#home").hasClass("activated") && $("#contact").hasClass("activated") && $("#about").hasClass("activated") && $("#login").hasClass("activated"))
                    {
                        $("#home").removeClass("activated");
                        $("#contact").removeClass("activated");
                        $("#about").removeClass("activated");
                        $("#login").removeClass("activated");
                    }
                    else {
                        $("#home").addClass("activated");
                        $("#contact").addClass("activated");
                        $("#about").addClass("activated");
                        $("#login").addClass("activated");
                    }
            });
            $("#like-button").on('click',function(){
                /*var clsId = $(this).attr("class");
                var classArr = clsId.split(/\s+/);
                //alert(classArr[1]);
                $.ajax({
                    url : "like.php",
                    type : "POST",
                    data : { classid : classArr[1] },
                    success : function(data){
                        $("#value_like").html(data);
                    }
                });*/
                <?php
                    if(isset($_SESSION['login_val']))
                    {
                        //echo "<script>alert('Value cm');</script>";
                        echo "like_inc();";
                    }
                    else
                    {
                        echo "redirect_page();";
                    }
                ?>
            });
        });
        function like_inc(){
            var clsId = $("#like-button").attr("class");
            var classArr = clsId.split(/\s+/);
            $.ajax({
                    url : "like.php",
                    type : "POST",
                    data : { classid : classArr[1] },
                    success : function(data){
                        $("#value_like").html(data);
                    }
                });
        }
        function redirect_page(){
            window.location.href = "signup.php";
        }
    </script>
      <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
    </script>
    <script type="text/javascript" src="js/index.js"></script>
    </body>
</html>