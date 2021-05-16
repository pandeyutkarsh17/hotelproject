<?php
    
    // Create connection Pls change database name 
    $conn = new mysqli('localhost','root','', 'db_connect');
    
	if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   $sEmail=$_POST['sEmail'];
   $sNumber=$_POST['sNumber'];
   $sName=$_POST['sName'];
   $sSpa=$_POST['sSpa'];
   $sTime=$_POST['sTime'];

    $sql="INSERT INTO spa (id,email,mob,name,date,time) VALUES ('','$sEmail','$sNumber','$sName','$sSpa','$sTime')";
	
	$rs=$conn->query($sql);
	

	if($rs)
	{
		echo "<script>alert('Booking successful! Looking forward to seeing you!')</script>";
	}
	else {echo "<script>alert('Booking not successful! We are sorry for the inconvenience')</script>";
	echo $conn->error;}
	echo "<br>";
	
    $sqll="SELECT id from spa where email='$sEmail'";
    
    $rss=mysqli_query($conn, $sqll);

	while($row = mysqli_fetch_assoc($rss)) 
	{
	$m= $row["id"];
	}
	
	echo '<script language="javascript">';
	echo "alert ('Your booking id is '+ $m+'. Kindly use this id during check in')";
	echo '</script>';

	echo "<script>
	window.location.href='homepage.html';
	echo </script>";
?>    