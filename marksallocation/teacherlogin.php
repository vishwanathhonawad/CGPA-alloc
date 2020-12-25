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
<br><br><br><br><br><br><br><br>
<form action="" method="post" class="form-container col-lg-4 col-md-9 col-sm-4 col-xl-4 m-auto d-block"> 

       <div class="form-group">
        <b> <label for="user" class="col-lg-9 col-md-9 col-sm-9 col-xl-9 m-auto d-block text-white">TSN:</label></b>
            <input type="text" name="usn" id="user" class="col-lg-9 col-md-9 col-sm-9 col-xl-9 m-auto d-block form-control"  placeholder="Enter Your TSN" required>
        </div>

        <div class="form-group">
            <b><label for="pas" class="col-lg-9 col-md-9 col-sm-9 col-xl-9 m-auto d-block text-white"> ENTER YOUR PASSWORD:</label></b>
            <input type="password" name="pas" id="pas" class="col-lg-9 col-md-9 col-sm-9 col-xl-9 m-auto d-block form-control" placeholder="Enter Your password" required>
        </div>
    
    <input type="submit" name="submit_tl" value="LOGIN" class="btn btn-success form-control col-lg-9 col-md-9 col-sm-9 col-xl-9 m-auto d-block">&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp

    <a href="forgotth.php" class="text-danger text-center col-lg-4 col-sm-4 m-auto ">forgot password.. ??</a>&nbsp 
    <a href="teachersignup.php" class="text-success text-center col-lg-4 col-sm-4 m-auto ">sign up here</a>&nbsp
    <a href="index.php" class="text-white text-center col-lg-4 col-sm-7 m-auto ">back</a>
   
    <?php

if(isset($_POST['submit_tl']))
{
    session_start();
    $con = mysqli_connect('localhost','root');
    mysqli_select_db($con,'mas');
     $usn=$_POST['usn'];
    $pas=$_POST['pas'];
   
    $displayquery ="select * from teacher where (usn=$usn and tpass='$pas')";
    $result =mysqli_query($con,$displayquery) or die(mysqli_error($con));
    $row= mysqli_num_rows($result);

    if($row>0)
    {
       header('location:teacher.php');
    }
    else{
        ?> <lable class="l1 col-lg-8 m-auto d-block text-white bg-dark"> <?php echo "USN and password did not matched";?> </lable><?php
    }


}

?>
</form>


<br>
<br>
<br>



</body>

 
</html>