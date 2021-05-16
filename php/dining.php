<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    
    // Create connection Pls change database name 
    $conn = new mysqli('localhost','root','', 'db_connect');
    
	if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
 
   $dNumber=$_POST['dNumber'];
   $dName=$_POST['dName'];
   $dDining=$_POST['dDining'];
   $dChoice=$_POST['dChoice'];
   $dTables=$_POST['dTables'];
    
   $a=10;
   $sql1="SELECT tables from dining where choice='Dine-in'";
   $result1 = mysqli_query($conn, $sql1); 
   $m1=0;
   while($row = mysqli_fetch_assoc($result1)) 
	{
    $m1+= $row["tables"];
    }
  //  echo $m1;
  
   $b=10; 
   $sql2="SELECT tables from dining where choice='Buffet'";
   $result2 = mysqli_query($conn, $sql2); 
   $m2=0;
   while($row = mysqli_fetch_assoc($result2)) 
	{
    $m2+= $row["tables"];
    }
  //echo $m2;
    if(($dChoice=="Dine-in") && ($m1+$dTables)<=$a)
    {
    $sql="INSERT INTO dining (id,mob,name,date1,choice,tables) VALUES ('','$dNumber','$dName','$dDining','$dChoice','$dTables')";
    $rs=$conn->query($sql);
	
	if($rs)
	{
		echo "<script>alert('Booking successful! Looking forward to seeing you!')</script>";
	}
	else {echo "<script>alert('Booking not successful! We are sorry for the inconvenience!</script>";
	echo $conn->error;}
	echo "<br>";
	
    $sqll="SELECT id from dining where mob='$dNumber'";
    
    $rss=mysqli_query($conn, $sqll);

	while($row = mysqli_fetch_assoc($rss)) 
	{
	$m= $row["id"];
	}
	
	echo '<script language="javascript">';
	echo "alert ('Your booking id is '+ $m+'. Kindly use this id during booking verification')";
	echo '</script>';

	echo "<script>
	window.location.href='homepage.html';
	echo </script>";
     }

     else if(($dChoice=="Buffet") && ($m2+$dTables)<=$b)
    {
    $sql="INSERT INTO dining (id,mob,name,date1,choice,tables) VALUES ('','$dNumber','$dName','$dDining','$dChoice','$dTables')";
    $rs=$conn->query($sql);
	
	if($rs)
	{
		echo "<script>alert('Booking successful! Looking forward to seeing you!')</script>";
	}
	else {echo "<script>alert('Booking not successful! We are sorry for the inconvenience!</script>";
	echo $conn->error;}
	echo "<br>";
	
    $sqll="SELECT id from dining where mob='$dNumber'";
    
    $rss=mysqli_query($conn, $sqll);

	while($row = mysqli_fetch_assoc($rss)) 
	{
	$m= $row["id"];
	}
	
	echo '<script language="javascript">';
	echo "alert ('Your booking id is '+ $m+'. Kindly use this id during booking verification')";
	echo '</script>';

	echo "<script>
	window.location.href='homepage.html';
	echo </script>";}

     else{ echo "<script>alert('No tables available on the given date!')</script>";
       echo "<script>
	window.location.href='dining.html';
	echo </script>";
   }
?>    
</body>
</html>