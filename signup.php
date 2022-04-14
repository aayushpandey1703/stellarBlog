<?php
    //Session start
    session_start();

    //Connection to database
    require 'connection.php';
    $msg='';
    //Form on submission
    if(isset($_POST['reader']))
    {
        if($_POST['password'] == $_POST['cpassword'])
        {
           
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
 $dbpassword = password_hash($password, PASSWORD_BCRYPT);
            $result = $con->query("INSERT INTO login (name,email,password,role) VALUES ('$name','$email','$dbpassword','admin')");
            if(!$result) die($con->error);
            else{
                $msg = 'Form submitted';
            }
        }
        else
        {
            $msg = 'Invalid Values';
        }
    }
    else if (isset ($_POST['admin'])) {
     if($_POST['password'] == $_POST['cpassword'])
        {
           
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
 $dbpassword = password_hash($password, PASSWORD_BCRYPT);
            $result = $con->query("INSERT INTO login (name,email,password,role) VALUES ('$name','$email','$dbpassword','admin')");
            if(!$result) die($con->error);
            else{
                $msg = 'Form submitted';
            }
        }
        else
        {
            $msg = 'Invalid Values';
        }
}
   
    //Form on login
    if(isset($_POST['u_submit']))
    {
    

        $umail = $_POST['u_email'];
        $upass = $_POST['u_password'];

        $result= $con->query("SELECT id,name,password,role FROM login WHERE email='$umail'");
        if($result->num_rows > 0)
        {
            $data = $result->fetch_array();
           if(password_verify($upass, $data['password']))
            {
                $_SESSION['login_val'] = $data['name'];
                $_SESSION['aid']=$data['id'];
                $_SESSION['role']=$data['role'];
                $_SESSION['last_login_timestamp'] = time();
                if(isset($_SESSION['id_no']))
                {
                      echo "<script>window.location.href = 'blog.php'</script>";
                $msg = 'log in successful';
                }
                else{
                echo "<script>window.location.href = 'index.php'</script>";
                $msg = 'log in successful';
                }
            
            }
                        else
            {
                $msg = 'Password invalid';
            }
        }
        
        else
        {
            $msg = 'Email invalid';
        }
        
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
        <meta name="description">
        <meta name="viewport" content="width=device-width intial-scale=1.0"> 
        <script src="https://kit.fontawesome.com/b1a6e9234b.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="styles/signup.css">
    <title>sign-up</title>
    </head>
    <body>
        <div class="box">
            <h2 ><a href="index.php">HOME</a></h2>
            <div class="box-inside">
                <!-- Sign up Form -->
                <form id="log" method="POST">
                <div class="box2">
                    <h4>Log in</h4>
                    <p>
                        <input id="" type="email" name="u_email" placeholder="Enter Email">
                    </p><p> </p>
                    
                    <p>
                        <input id="" type="password" name="u_password" placeholder="Enter Password">
                    </p>
                    <p>
                        <input class="signup" type="submit" value="Log in" name="u_submit">
                    </p><br>
                    </div><hr>
                    <p class="message">New User? Click to <a href="#">Sign up</a></p>
                
                </form>
                <!-- Login Form -->
           <?php
           if(isset($_SESSION['role']))
           {
               if($_SESSION['role']=='admin')
               {
                   ?>
                     <form id="sign" method="POST">
                    <div class="box2">
                    <h4>Sign up</h4>
                    <p>
                        <input id="" type="text" name="name" placeholder="Enter Name">
                    </p><p> </p>
                    <p>
                        <input id="" type="email" name="email" placeholder="Enter Email">
                    </p>
                    
                    <p>
                        <input id="" type="password" name="password" placeholder="Enter Password">
                    </p>
                    <p>
                        <input id="" type="password" name="cpassword" placeholder="confirm Password">
                    </p><br>
                    <p>
                       <input class="signup" type="submit" value="ADD ADMIN" name="admin">
                        </p>
                        <p><?= $msg; ?></p>
                    </div><hr>
                    <p class="message">Already Registered? Click to  <a href="#">Login</a></p>
                </form>
                <?php
               }
               else{
                   ?>
                     <form id="sign" method="POST">
                    <div class="box2">
                    <h4>Sign up</h4>
                    <p>
                        <input id="" type="text" name="name" placeholder="Enter Name">
                    </p><p> </p>
                    <p>
                        <input id="" type="email" name="email" placeholder="Enter Email">
                    </p>
                    
                    <p>
                        <input id="" type="password" name="password" placeholder="Enter Password">
                    </p>
                    <p>
                        <input id="" type="password" name="cpassword" placeholder="confirm Password">
                    </p><br>
                    <p>
                       <input class="signup" type="submit" value="Sign up" name="reader">
                        </p>
                        <p><?= $msg; ?></p>
                    </div><hr>
                    <p class="message">Already Registered? Click to  <a href="#">Login</a></p>
                </form>
                <?php
               }
           }
           else{
               ?>
                     <form id="sign" method="POST">
                    <div class="box2">
                    <h4>Sign up</h4>
                    <p>
                        <input id="" type="text" name="name" placeholder="Enter Name">
                    </p><p> </p>
                    <p>
                        <input id="" type="email" name="email" placeholder="Enter Email">
                    </p>
                    
                    <p>
                        <input id="" type="password" name="password" placeholder="Enter Password">
                    </p>
                    <p>
                        <input id="" type="password" name="cpassword" placeholder="confirm Password">
                    </p><br>
                    <p>
                       <input class="signup" type="submit" value="Sign up" name="reader">
                        </p>
                        <p><?= $msg; ?></p>
                    </div><hr>
                    <p class="message">Already Registered? Click to  <a href="#">Login</a></p>
                </form>
                <?php
           }
           ?>
            
            </div>
            
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.js">
        </script>
        <script>
            $('.message a').click(function(){
              $('form').animate({height:"toggle",opacity:"toggle"}, "slow");
            });
        </script>
        
    </body>
</html>