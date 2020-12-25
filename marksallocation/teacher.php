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


          <!--  
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> 
          -->
<style>
#b
{
    position:absolute;
    top:0px;
    left:-250px;

}
</style>
            
</head>
<body>
<button class="btn btn-success" onclick= "location.href='teacherlogin.php';"> LOG OUT</button>


<div class=" col-lg-6 m-auto d-block">
<form method="POST">

<?php
 session_start();
 $con = mysqli_connect('localhost','root');
 mysqli_select_db($con,'mas');

$displayquery ="select * from student where marks is NULL ";
$result =mysqli_query($con,$displayquery) or die(mysqli_error($con));
//$row= mysqli_num_rows($querydisplay);
//echo "$row";
$row= mysqli_num_rows($result);

if($row>0)
{
?>
<table class="table table-bordered table-striped table-hover text-center ">
    <thead class="text-white bg-dark">
         <th>profile pic</th>
         <th>ROLL NUMBER</th>
         <th>name</th>
         <th>marks</th>
         </thead>
    <tbody class="text-dark bg-white">
       
<?php

while( $r = mysqli_fetch_array($result))
{
     $nm=$r['rollno']; 
?>
    <tr height=10px >        
        <td><img src= "<?php echo $r['path']; ?> " class="img-circle" height=50px width=50px style="border-radius:50%" ></td>
        <td> <?php echo $r['rollno']; ?> </td>
        <td> <?php echo $r['name']; ?></td>
        <td><input type="number" name="val[]" placeholder="/10" step="0.001" min="0" max="10"></td>
    </tr>
    
    
    <br>
<?php
}

?>
</tbody>

</table>
<center> <input type="submit" name="ex" value="ALLOCATE" class="btn btn-success text-white text-center" ></center>

<?php
}
else{
  ?> <br><br><br><br><br><br><br><br<br><br><br><br><b><h2><lable class="l1 col-lg-8 m-auto d-block text-white bg-dark"> <?php echo "YOU HAVE ALREADY ALLOCATED CGPA TO ALL THE STUDENTS";?> </lable><h2><b><?php 

}
?>
</form>

<div>

<br>
<br>
<br>

<?php

if(isset($_POST['ex']))
{

  $val=$_POST['val'];
  //print_r($val);
  $displayquery ="select * from student where marks is NULL";
  $result =mysqli_query($con,$displayquery) or die(mysqli_error($con));
  $displayquery1 ="select * from teacher";
  $result1 =mysqli_query($con,$displayquery1) or die(mysqli_error($con));
  $i=0; 
  while($re = mysqli_fetch_array($result1))
{
  $usn=$re['usn'];    

   while($r = mysqli_fetch_array($result))
   {
       $n=$r['rollno'];
       
      if($val[$i]!='')
         {  
                     
                     $m=$val[$i];
                     $q="UPDATE student SET marks= $m, usn=$usn WHERE rollno=$n";
                     $query=mysqli_query($con,$q);
         }             
           
     $i=$i+1;
   }
}
}

?>

</body>

</html>