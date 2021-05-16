<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $a=10;
    $b=10;
    $c=10;

    // Create connection
    $conn = new mysqli('localhost','root','', 'db_connect');
    
	if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

	echo "<br>";
   $bEmail=$_POST['bEmail'];
   $bNumber=$_POST['bNumber'];
   $bName=$_POST['bName'];
   $bCheck=$_POST['bCheck'];
   $bCout=$_POST['bCout'];
   $bChoice1=$_POST['bChoice1'];
   $bChoice2=$_POST['bChoice2'];
   $bChoice3=$_POST['bChoice3'];
   
    $sql1="SELECT r1 from book1";
    $sql2="SELECT r2 from book1";
    $sql3="SELECT r3 from book1";
    
      $result1 = mysqli_query($conn, $sql1);
      $result2 = mysqli_query($conn, $sql2);
      $result3 = mysqli_query($conn, $sql3);

     $m1=0;
     $m2=0;
     $m3=0;

	while($row = mysqli_fetch_assoc($result1)) 
	{
    $m1+= $row["r1"];
    }
  //  echo $m1;
    echo "<br>";
    while($row = mysqli_fetch_assoc($result2)) 
	{
    $m2+= $row["r2"];
    }
   // echo $m2;
    echo "<br>";
    while($row = mysqli_fetch_assoc($result3)) 
	{
    $m3+= $row["r3"];
    }
   // echo $m3;

    //   echo "<script>alert($sql1)</script>";
    //   echo "<script>alert($sql2)</script>";
    //   echo "<script>alert($sql3)</script>";

    if((($m1+$bChoice1)<=$a) && (($m2+$bChoice2)<=$b) && (($m3+$bChoice3<=$c)))
     {
    $sql="INSERT INTO book1 (id,email,mob,name,cin,cout,r1,r2,r3) VALUES ('','$bEmail','$bNumber','$bName','$bCheck','$bCout','$bChoice1','$bChoice2','$bChoice3')";
    
    $rs=$conn->query($sql);

	if($rs)
	{
		echo "<script> alert('Payment successful!')</script>";
		echo "<script> alert('Booking successful! Looking forward to seeing you!')</script>";
	}
	else {echo "<script> alert('not successful')</script>";
	echo $conn->error;}
	echo "<br>";
	
    $sqll="SELECT id from book1 where email='$bEmail'";
    
    $rss=mysqli_query($conn, $sqll);

	while($row = mysqli_fetch_assoc($rss)) 
	{
	$m= $row["id"];
	}
	
	echo '<script language="javascript">';
	echo "alert ('Your booking id is '+ $m+'. Kindly use this id for all future services')";
	echo '</script>';

	echo "<script>
	window.location.href='homepage.html';
	echo </script>";
  

      }
      else{ echo "<script>alert('No rooms available on the given dates!')</script>";
       echo "<script>
	window.location.href='book.html';
	echo </script>";}

?> 
</body>
</ht