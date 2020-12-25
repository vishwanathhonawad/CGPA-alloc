<html>
<head>
<title>MAS</title>

          <link rel="stylesheet" href="css/bootstrap.min.css">
          <link rel="stylesheet" href="css/bootstrap.css">
          <link rel="stylesheet" href="style.css">
          
                    
            <script src="js/jquery.min.js"></script> 
            <script src="js/bootstrap.min.js"></script> 
            <script src="js/bootstrap.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.bundle.min.js"></script> 


      <!-- 
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> 
      
      -->

            
</head>

<body>
        
<br><br><br>
      


<form action="" method="post" enctype="multipart/form-data" class="form-container col-lg-4 col-md-9 col-sm-4 col-xl-4 m-auto d-block "> 
<div class="container ">

      <div class="img form-group text-center">
            
            <img src="image/avatar.jpg" height=100px width=100px style="border-radius:70%" id="imgdisplay"  class="m-auto d-block" onclick="triggerClick()">
            <label for="file" class="col-lg-4 m-auto d-block text-white">Upload Profile</label>
            <input type="file" name="file" id="file" onchange="displayImage(this)" style="display: none;" >
        </div>
      
        <div class="form-group">
           <b> <label for="fname" class="col-lg-9 col-md-9 col-sm-9 col-xl-9 m-auto d-block text-white ">FULL NAME:</label></b>
            <input type="text" name="fname" id="fname" class="col-lg-9 col-md-9 col-sm-9 col-xl-9 m-auto d-block form-control " placeholder="Enter Your Name" required>
        </div>

        <div class="form-group">
        <b> <label for="user" class="col-lg-9 col-md-9 col-sm-9 col-xl-9 m-auto d-block text-white">TSN:</label></b>
            <input type="text" name="usn" id="user" class="col-lg-9 col-md-9 col-sm-9 col-xl-9 m-auto d-block form-control"  placeholder="Enter Your TSN" required>
        </div>

        <div class="form-group">
        <b> <label for="user" class="col-lg-9 col-md-9 col-sm-9 col-xl-9 m-auto d-block text-white">PHONE NUMBER:</label></b>
            <input type="text" name="phno" id="phno" class="col-lg-9 col-md-9 col-sm-9 col-xl-9 m-auto d-block form-control"  placeholder="Enter Your phone number" required>
        </div>


        <div class="form-group">
            <b><label for="pas" class="col-lg-9 col-md-9 col-sm-9 col-xl-9 m-auto d-block text-white"> ENTER YOUR PASSWORD:</label></b>
            <input type="password" name="pas" id="pas" class="col-lg-9 col-md-9 col-sm-9 col-xl-9 m-auto d-block form-control" placeholder="Enter Your password" required>
        </div>

        <div class="form-group">
        <b> <label for="pass" class="col-lg-9 col-md-9 col-sm-9 col-xl-9 m-auto d-block text-white">CONFIRM YOUR PASSWORD:</label></b>
            <input type="password" name="pass" id="pass" class="col-lg-9 col-md-9 col-sm-9 col-xl-9 m-auto d-block form-control"placeholder="Reenter Your password" required>
        </div>

    <input type="submit" name="submit_te" value="SIGNUP" class="btn btn-success form-control col-lg-9 col-md-9 col-sm-9 col-xl-9 m-auto d-block"><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <a href="teacherlogin.php" class="text-white text-center col-lg-4 m-auto ">login ..??</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <a href="index.php" class="text-white text-center col-lg-4 m-auto ">back</a>

</form>



<?php
 $conn = mysqli_connect('localhost','root');
 mysqli_select_db($conn,'mas');

if(isset($_POST['submit_te']))
{
  session_start();

  $name=$_POST['fname'];
  $usn=$_POST['usn'];
  $phno=$_POST['phno'];
  $pass1=$_POST['pas'];
  $pass2=$_POST['pass'];
  $files = $_FILES['file'];
  $filename=$files['name'];
  $fileerror=$files['error'];
  $filetemp=$files['tmp_name'];
  if ($filename=='')
  {
      $filename='avatar.jpg';
  }

           
            
            $fileext = explode('.',$filename);
            $filecheck = strtolower(end($fileext));
            
            
             
          if($pass1==$pass2)
          {
              
                 $fileextstored = array('png','jpg','jpeg');
                  
                    if(in_array($filecheck,$fileextstored))
                    { 
                      $destinationfile ='image/'.$filename;
                                  move_uploaded_file($filetemp,$destinationfile);
                                
                                 /*create table student
                                    (
                                        rollno int not null AUTO_INCREMENT PRIMARY KEY,
                                        name varchar ,
                                        phno int check ,
                                        pass varchar,
                                        path varchar
                                    );*/
                                  $q="INSERT INTO `teacher`(`usn`, `tname`, `tphno`, `tpass`, `tpath`) VALUES ($usn,'$name',$phno,'$pass1','$destinationfile')";
                                  $query=mysqli_query($conn,$q);
                                /* $displayquery ="select * from student";
                                  $row= mysqli_num_rows($querydisplay);*/

                                  header('location:teacher.php');
                                  ?> <lable class="l1 col-lg-6 m-auto d-block text-white bg-dark"> <?php echo "$usn,$name,$phno,$pass1,$filename";?> </lable><?php

                    }
                    else
                    
                    {
                      ?> <lable class="l1 col-lg-6 m-auto d-block text-white bg-dark"> <?php echo "it should be image";?> </lable><?php

                    
                    }
                 

          }
          else{
            ?> <lable class="l1 col-lg-6 m-auto d-block text-white bg-dark"><b> <?php echo "both passwords must be same";?></b> </lable><?php

          }

}


?>


</div>

            <script src="js/jquery.min.js"></script> 
            <script src="js/bootstrap.min.js"></script> 
            <script src="js/bootstrap.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.bundle.min.js"></script> 

<script>

            function triggerClick()
            {
              document.querySelector('#file').click();
            }


            function displayImage(e)
            {
              if(e.files[0])
              {
                var reader = new FileReader();
                reader.onload=function(e)
                {
                  document.querySelector('#imgdisplay').setAttribute('src',e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
              }
            }

</script>
</body>

 
</html>