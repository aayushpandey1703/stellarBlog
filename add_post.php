<?php
session_start();
?>
<!DOCTYPE HTML>

<html>
    <head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BLOG | Post</title>
          <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
   <script src="https://kit.fontawesome.com/b1a6e9234b.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="styles/styles.css">
        <script src="https://kit.fontawesome.com/b1a6e9234b.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         
    </head>
    <style>
        h2{
            color: white;
          
            width: 100%;
            line-height: 450px;
            height: 70%;
            position: absolute;
            background: rgb(.8,0,0);
            opacity: 0.8;
        }
        .blog{
            margin-top: 5%;
        
        }
        input[type='text']{
            width: 30%;
            border: 1px solid;
            border-radius: 10px;
            font-size: 30px;
            outline: none;
            font-family: sans-serif;
            text-align: center;
        }
        
        
        label{
            margin-left: 10%;
        }
        a{
            text-decoration: none;
            list-style: none;
        }
        
    </style>
    <body>
        
            <center><h2>ADD POST</h2></center>
        <img src="https://www.rd.com/wp-content/uploads/2019/11/shutterstock_509582812-e1574100998595.jpg"  style="width: 100%;height: 70%;"> 
        
        <nav>
            <img src="image/shopsky.jpg" style="height:50px;position: absolute;margin-top: 5px"/> <h5 style="margin-left:60px;position: absolute;margin-top: 10px;font-family: sans-serif;font-weight: 600;font-size: 30px">Shopsky</h5>
                    <ul>
                        <li class="toggle items"><button onclick="mytoggle()"><span class="bars"></span>
                        </button></li>
                        <li class="active activated" id="home"><a href="index.php" style="text-decoration:none">Home</a></li>
                        <li class="activated" id="contact"><a href="contact.html" style="text-decoration:none">Contact Us</a></li>
                        <li class="activated" id="about"><a href="about.php" style="text-decoration:none">About Us</a></li>
                         <?php
                        if(isset($_SESSION['aid']))
                        {
                            ?>
                        <li class="" id="home" ><a href="mypost.php" style="text-decoration:none;color:black">Wishlist</a></li>
                        <?php
                        }
                        ?>
                       
                        <li class="login activated" id="login"><a  href="
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
                                ?>" style="text-decoration:none">
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
        <?php
        if(isset($_POST['edit']))
        {
            ?>
         <center>
        <div class="blog">
            <form action="add.php" method="post">
                <input type="hidden" name="bid" value="<?php echo $_POST['bid'] ?>"/>
                <p> <input type="text" name="title" value="<?php echo $_POST['title'] ?>" placeholder="Title"/></p>
        <p style="margin-left: -10%; margin-top: 2%"><label><span style="color: red">By</span>:<input type="text" value="<?php echo $_SESSION['login_val']; ?>" name="name" style="border:none;font-size: 15px"/></label>
            <label><?php echo $_POST['date'] ?></label>
        </p>
        <p><div class="input-group mb-3">

    
 
</div></p>
<hr style="width: 70%;background: #cccccc;margin-top: 5%;">
        <p> <div class="form-group">
            <h3 style="margin-top:5%">Blog</h3>
            <textarea name="description"  class="form-control" id="message-text" style="width: 50%;height: 100%;margin-top: 1%;">
                <?php echo $_POST['description'] ?>
            </textarea>
          </div></p>
          <p><button type="submit" name="edit" class="btn btn-primary" style="height: 50px">Update</button></p>
            </form>
        </div>
    </center>
        <?php
        }
 else {
     ?>
     <center>
        <div class="blog">
            <form action="add.php" method="post" enctype="multipart/form-data">
                <p> <input type="text" name="title" value="" placeholder="Title"/></p>
                <p style="margin-left: -14%; margin-top: 2%"><label><span style="color: red;margin-left: -10px">By</span>:<input type="text" value="<?php echo $_SESSION['login_val']; ?>" name="name" style="border:none;font-size: 15px"/></label>
            <label><?php echo date("d-m-y"); ?></label>
        </p>
        <p><div class="input-group mb-3">

      <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" style="width:30%;margin-left: 35%;margin-top: 5%" >
    <label class="custom-file-label" for="inputGroupFile01"  style="width:30%;margin-left: 35%;margin-top: 5%">Choose a cover image</label>
 
</div></p>
<hr style="width: 70%;background: #cccccc;margin-top: 5%;">
        <p> <div class="form-group">
            <h3 style="margin-top:5%;margin-bottom: 3%">Write your Blog</h3>
            <textarea name="description" class="form-control" id="message-text" style="width: 50%;height: 100%;margin-top: 1%;"></textarea>
          </div></p>
          <p><button type="submit" name="post" class="btn btn-primary" style="height: 50px">Post</button></p>
            </form>
        </div>
    </center>
    <?php
 }
        ?>
   <script>
  tinymce.init({
  selector: 'textarea',
  height: 500,
  width: 900,
  plugins: 'image code hr',
  toolbar: 'undo redo | link image code | bold |italic| underline |Alignleft Aligncenter Alignright hr',
  images_upload_url: 'upload.php',
  image_upload_handler:function(blobInfo,success,failure,progress){
      var xhr, formData;

  xhr = new XMLHttpRequest();
  xhr.withCredentials = false;
  xhr.open('POST', 'upload.php');

  xhr.upload.onprogress = function (e) {
    progress(e.loaded / e.total * 100);
  };

  xhr.onload = function() {
    var json;

    if (xhr.status === 403) {
      failure('HTTP Error: ' + xhr.status, { remove: true });
      return;
    }

    if (xhr.status < 200 || xhr.status >= 300) {
      failure('HTTP Error: ' + xhr.status);
      return;
    }

    json = JSON.parse(xhr.responseText);

    if (!json || typeof json.location != 'string') {
      failure('Invalid JSON: ' + xhr.responseText);
      return;
    }

    success(json.location);
  };

  xhr.onerror = function () {
    failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
  };

  formData = new FormData();
  formData.append('file', blobInfo.blob(), blobInfo.filename());

  xhr.send(formData);
      
  }
});

  </script>
     <script>
            $('#inputGroupFile01').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
        </script>
    </body>
</html>
