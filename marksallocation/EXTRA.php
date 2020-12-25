

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

            
</head>
<body>
<div class=" col-lg-6 m-auto d-block">
<table class="table table-bordered table-striped table-hover text-center ">
    <thead class="text-white bg-dark">
         <th>pic</th>
         <th>marks</th>
         
    </thead>
    <tbody class="text-dark bg-white">
    <?php


session_start();
$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'mas');
  
$usn=$_SESSION['usn'];
$q ="select * from student S,teacher T where S.usn=T.usn and rollno= $usn ";




$result =mysqli_query($con,$q) or die(mysqli_error($con));
//$row= mysqli_num_rows($querydisplay);
//echo "$row";
while( $r = mysqli_fetch_array($result))
{
?>
    <tr>
    <form action="" method="post" class="form-container  col-lg-4 col-md-9 col-sm-4 col-xl-4 m-auto d-block">
        
    <img src= "<?php echo $r['tpath']; ?> " class="img-circle" height=50px width=50px style="border-radius:50%" >
    
         <td><img src= "<?php echo $r['tpath']; ?> " class="img-circle" height=50px width=50px style="border-radius:50%" ></td>
        <td> <?php echo $r['marks']; ?></td>


    </form>
       
    </tr><br>
<?php
}
    
   







?>
</tbody>

</table>
<div>

<br>
<br>
<br>



</body>

 
</html>