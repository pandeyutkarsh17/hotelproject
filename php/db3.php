<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    
    // Create connection
    $conn = new mysqli('localhost','root','', 'db_connect');
    
	if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

	
   $bId=$_POST['bId'];
   $bMob=$_POST['bMob'];
  
    $s="SELECT id,mob from dining where id='$bId' and mob='$bMob'";
    $result=mysqli_query($conn,$s);
    $num=mysqli_num_rows($result);
    if($num==1){
    $query="CALL dcancel($bId,'$bMob')";
    $result1=mysqli_query($conn,$query);
    $num1=mysqli_num_rows($result1);
    if($num1==1){
        echo "<script>alert('Something went wrong'); window.location.href = 'homepage.html'</script>";
    }
    else{
    echo"<script>alert('Your Booking has been deleted'); window.location.href = 'homepage.html'</script>";
    }
    }
    else{
    echo"<script>alert('Enter Valid details');window.location.href = 'ctest.html'</script>";}
  ?>    
</body>
</html>