<?php
 	 include 'conn.php';

// initialize variables
	//$name = "";
	$address = "";
	
	//$update = false;



		
		$record = mysqli_query($conn,"SELECT * FROM notice");

		if ($record->num_rows == 1 ) {
			$n = mysqli_fetch_array($record);
			
			$address = $n['note'];
			
		}
 
	 if (isset($_POST["update"])) {
 
	
$cat=$_POST["category"];
//$url=$_POST["url"];

 
  $query = "UPDATE notice SET note='$cat'";  
      if(mysqli_query($conn, $query))  
      {  
           echo '<script>alert("Category Inserted into Database")</script>';  

            // no redirect
header( "Location: index.php" );
      } 




 }




?>

<html>
	<head><meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="style.css" rel="stylesheet" type="text/css"/ >
	</head>
	<body>

		<center>
	

<div class="cat">
	
	<form id="category" action=""  method="post">
		
		<textarea class="catt"  cols="40" rows="10" name="category"  placeholder="Write notice.." required><?php if(!empty($address)){echo $address;} ?></textarea><br><br>




	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>


	</form>
</div>


</center>
	</body>
</html>