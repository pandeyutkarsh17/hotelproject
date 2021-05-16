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
   $bEmail=$_POST['bEmail'];
  
     $sqll="SELECT id,email from book1 where id='$bId' and email='$bEmail'";
 
       $rss=mysqli_query($conn, $sqll);

	 if($row = mysqli_fetch_assoc($rss)) {
    $sql="DELETE FROM book1 WHERE id='$bId' and email='$bEmail'";
    $rs=$conn->query($sql);
     if($rs)
    echo "<script>alert('Booking cancelled!')</script>";
    }
else
	echo "<script>alert('Error! Invalid details!')</script>";

	echo "<script>
	window.location.href='homepage.html';
	echo </script>";
    

	
?>    
</body>
</html>