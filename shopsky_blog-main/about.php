<?php

//session start
session_start();

//last time login up 
if(isset($_SESSION['last_login_timestamp']))
{
    $sessiontimeval = $_SESSION['last_login_timestamp'];
    if(time()-$sessiontimeval>15*60)
    {
        header('location:logout.php');
        die();
    }
}
//connect db
require 'connection.php';
   $sql="select count(*) as num from blog";
    $res=  mysqli_query($con, $sql);
    $num=  mysqli_fetch_assoc($res);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BLOG | About</title>
        <link rel="stylesheet" type="text/css" href="styles/about.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Playball&display=swap" rel="stylesheet"> 
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
                        <li class="active activated" id="home"><a href="index.php">Home</a></li>
                        <li class="activated" id="contact"><a href="contact.html">Contact Us</a></li>
                        <li class="activated" id="about"><a href="about.php">About Us</a></li>
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
        <section>
            <!-- Who are we Section -->
            <div class="who-are-we">
                <h2>Who are we??</h2>
                <img src="images/1234.jpg">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            <!-- What we do Section -->
           <div class="what-we-do">
             <h2>What we do??</h2>
                <div class="box">
                    <div class="box1">
                     <img src="images/abc.jpg">
                        <h3>Lorem Ipsum </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                    </div>
                   <div class="box1">
                       <img src="images/abcd.jpg">
                       <h3>Lorem Ipsum </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                   </div>
                 <div class="box1" >
                        <img src="images/abcde.jpg">
                        <h3>Lorem Ipsum </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                 </div>
               </div>  
            </div>
            <!-- Why choose us Section -->
            <div class="why-choose-us">
                <h2>Why choose us??</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>   
            </div>
            
            <!-- Meet out team Section -->
            <div class="meet-our-team">
                <h2>Meet Our Team...</h2>
                <div class="table-content">
                    <div class="column">
                        <div class="row-1">
                            <img src="images/12345.jpg">
                        </div>
                        <div class="row-2">
                             <h4>LOREM IPSUM</h4>
                             <h5>CEO</h5>
                             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500</p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="row-1">
                            <img src="images/123456.jpg">
                        </div>
                        <div class="row-2">
                             <h4>LOREM IPSUM</h4>
                             <h5>CEO</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s </p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="row-1">
                            <img src="images/321.jpg">
                        </div>
                        <div class="row-2">
                             <h4>LOREM IPSUM</h4>
                             <h5>CEO</h5>
                               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="row-1"> 
                            <img src="images/4321.jpg">
                        </div>
                        <div class="row-2">
                             <h4>LOREM IPSUM</h4>
                             <h5>CEO</h5>
                             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Additional Section -->
            <div class="additional-section">
                <h2>Additional Section...</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>  
               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>   
            </div>
        </section>
        
        
        
        <footer>
            <!-- Footer Section -->
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
                            <li><a href="testing.php">Home</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="#">About Us</a></li>
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
                <div class="copyright">
                    Copyright © 2020 All rights reserved
                </div>
            </div>
        </footer>
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
            });
        </script>
    </body>
</html>
