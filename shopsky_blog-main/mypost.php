
<?php
    //Session start
    session_start();
    $_SESSION['blog']='';
    //last time login time
    if(isset($_SESSION['last_login_timestamp']))
    {
        $sessiontimeval = $_SESSION['last_login_timestamp'];
        if(time()-$sessiontimeval>15*60)
        {
            header('location:logout.php');
            die();
        }
    }
    // Connection to database
    require 'connection.php';
//counting posts
    $sql="select count(*) as num from blog";
    $res=  mysqli_query($con, $sql);
    $num=  mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BLOG | Home</title>
        <link rel="stylesheet" href="styles/styles.css">
        <script src="https://kit.fontawesome.com/b1a6e9234b.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
    <header style="height: 100%;">
            <div class="total-section">
                <!-- Header Left Section -->
                <div class="left-container"></div>
                <!-- Navigation Section -->
                <nav>
                                <img src="image/shopsky.jpg" style="height:50px;position: absolute;margin-top: 5px"/> <h5 style="margin-left:60px;position: absolute;margin-top: 10px;font-family: sans-serif;font-weight: 600;font-size: 30px">Shopsky</h5>

                    <ul>
                        <li class="toggle items"><button onclick="mytoggle()"><span class="bars"></span>
                        </button></li>
                        <li class="activated" id="home"><a href="index.php">Home</a></li>
                        <li class="activated" id="contact"><a href="contact.html">Contact Us</a></li>
                        <li class="activated" id="about"><a href="about.php">About Us</a></li>
                         <li class=" active activated" id="home"><a href="mypost.php ">Wishlist</a></li>
                        <?php
                        if(isset($_SESSION['role']))
                        {
                            if($_SESSION['role']=='admin')
                            {
                                ?>
                        <li class="activated" id="about"><a href="add_post.php">Add Post</a> (<?= $num['num'] ?> posts)</li>
                        <?php
                            }
                        }
                        ?>
                        <li class="login activated" id="login"><a href="
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
                                ?>">
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
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- Header Matter Section-->
                <div class="container">
                    <span>Hello!!!</span>
                    <h1>Welcome</h1>
                    <span> To
                        <span class="typed-text">
                        </span>
                        <span class="cursor">&nbsp;</span>
                    </span>
                </div>
            </div>
    </header>
        <!-- wishlist -->
         <section class="recent">
                <h2>Wishlist</h2>
                <hr>
        <div class='popular-container'>
            <?php
            $query="SELECT * from blog 
INNER JOIN wishlist on wishlist.bid=blog.bid
WHERE wishlist.id='".$_SESSION['aid']."'";
            $result=  mysqli_query($con, $query);
            if(mysqli_num_rows($result)>0)
            {
            while($data=  mysqli_fetch_assoc($result))
            {
                $description=  substr(strip_tags($data["description"]),0,30);
                ?>
             <div class='popular-container-items'><a href='blog.php' id='<?php echo $data['bid'] ?>'>
                <div class='popular-container-image'>
                    <img src='image/<?php echo $data['image'] ?>' class='image' style='height: -webkit-fill-available; max-height:20em;' >
                    <div class='popular-container-matter'><?php echo $data['title'] ?></div>
                    </div>
                <div class='popular-container-bottom'>
                    <div class='popular-container-bottom-right' style="margin-left:-70%">
                        <p><?php echo $data['author'] ?></p>
                        <p><?php echo $data['date'] ?></p>
                        </div>
                    </div>
                     <div class='popular-container-bottom-left' style="margin-bottom:5%"><?php echo $description.'....<span style="color:grey">(Read more)<span>' ?></div>
                        </a>
            </div>
            <?php
            }
            }
 else {
     ?>
            <h3 style="color:grey;font-weight: 400;font-family: serif;font-size: 50px;margin-top:5%;margin-bottom: 5%">No Bookmarks </h3>
            <?php
 }
            ?>
       
            
                    </div>
         </section>
        <!-- Footer Section -->
        <footer>
            <div class="footer-container">
                <div class="footer-nav">
                    <!-- Media Section -->
                    <div class="social-media">
                        <h3>Social-Media</h3>
                        <ul>
                            <li><a href="" target="blank">
                                <i class="fab fa-twitter"></i>
                                <span>Twitter</span>
                            </a></li>
                            <li><a href="" target="blank">
                                <i class="fab fa-facebook-f"></i><span>  Facebook</span>
                            </a></li>
                            <li><a href="" target="blank">
                                <i class="fab fa-instagram"></i><span> Instagram</span>
                            </a></li>
                            <li><a href="" target="blank">
                                <i class="fab fa-linkedin-in"></i><span> Linkedin</span>
                            </a></li>
                        </ul>
                    </div>
                    <!-- Navigation Section -->
                    <div class="footer-navigation">
                        <h3>Navigation</h3>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="about.php">About Us</a></li>
                        </ul>
                    </div>
                    <!-- Contact Section -->
                    <div class="contact_me">
                        <h3>Contact</h3>
                        <ul>
                            <li><a href="">
                                <i class="fas fa-phone-alt"></i>
                                <span> 9999999999</span>
                            </a></li>
                            <li><a href="">
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
         <!-- Javascript Section -->
        <script type="text/javascript" src="js/index.js"></script>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                $("nav ul li button").on('click',function(){
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
                $(".carousel-blog-item a").on('click',function(e){
                    var elId = $(this).attr("id");
                    $.ajax({
                        url: "checking.php",
                        type : "POST",
                        data : { idq: elId },
                        success : function(data){
                            window.location.href = "blog.php";
                        }
                    });
                });
                $(".popular-container-items a").on('click',function(e){
                    var elId = $(this).attr("id");
                    $.ajax({
                        url: "checking.php",
                        type : "POST",
                        data : { idq: elId },
                        success : function(data){
                            window.location.href = "blog.php";
                        }
                    });
                });
                $(".all_blog_container-list a").on('click',function(e){
                    var elId = $(this).attr("id");
                    $.ajax({
                        url: "checking.php",
                        type : "POST",
                        data : { idq: elId },
                        success : function(data){
                            window.location.href = "blog.php";
                        }
                    });
                });
            });
        </script>
    </body>
</html>
