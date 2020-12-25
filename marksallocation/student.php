<html>
<head>
<title>MAS</title>
          <link rel="stylesheet" href="style.css">
          <link rel="stylesheet" href="css/bootstrap.min.css">
          <link rel="stylesheet" href="css/bootstrap.css">

          
                    
            <script src="js/jquery.min.js"></script> 
            <script src="js/bootstrap.min.js"></script> 
            <script src="js/bootstrap.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.bundle.min.js"></script> 


            <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<style>
.c{
  background : rgba(255, 1, 1, 0.5);
}
.c1{
    background : rgba(1, 132, 255, 0.5);
}
#b1
{
    position:absolute;
    top:178px;
    right:514px;

}
</style>
            
</head>
<body>
<?php
session_start();
$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'mas');
  
$usn=$_SESSION['usn'];
$q ="select * from student S,teacher T where S.usn=T.usn and rollno= $usn ";

$result =mysqli_query($con,$q) or die(mysqli_error($con));
//$row= mysqli_num_rows($querydisplay);
//echo "$row";
$r = mysqli_fetch_array($result);
if($r)
{
?>
<br><br><br><br><br><br><br><br><br>


<button class="btn btn-success " onclick="location.href='studentlogin.php';" id="b1"> LOG OUT</button>


    <form action="" method="post" class="form-container  col-lg-6 col-md-9 col-sm-6 col-xl-4 m-auto d-block">
    <div class="row">
        <div class="col-lg-2 col-sm-2"> 
        </div>

        <div class="col-lg-5 col-sm-5">

         <img src= "<?php echo $r['path']; ?> " class="img-circle" height=50px width=50px style="border-radius:50%" >

         <label  class=" m-auto d-block text-white">NAME:</label>       
         <label  class=" m-auto d-block text-white"><?php echo $r['name']; ?></label>


         <label  class=" m-auto d-block text-white">ROLL NUMBER:</label>
         <label  class=" m-auto d-block text-white"> <?php echo $r['rollno']; ?></label> 

      
        </div>

        <div class="col-lg-5 col-sm-5">
        <br>

            <table class="c">
                    
               <th class="c1">  <label  class="col-lg-12 m-auto d-block text-white">  CGPA:  </label> </th>

                 <tr> <td><label  class="col-lg-12 m-auto d-block text-white"><br> &nbsp<?php echo $r['marks']; ?><br> <br></label></td></tr>

            </table>

        </div>
    </div >
</form>
<?php
}
else
{
    ?> <br><br><br><br><br><br><br><br<br><br><br><br><b><h2><lable class="col-lg-5 col-sm-5 col-md-5 col-xl-5 m-auto d-block text-white bg-dark"><br> <?php echo "YOUR CGPA IS NOT YET ALLOCATED";?> <br><br></lable><h2><b><?php 
}
?>
</body>

</html>