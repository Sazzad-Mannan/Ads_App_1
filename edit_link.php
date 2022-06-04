<?php
 	 include 'conn.php';

// initialize variables
	$name = "";
	$address = "";
	
	//$update = false;



		
		$record = mysqli_query($conn,"SELECT * FROM link");

		if ($record->num_rows == 1 ) {
			$n = mysqli_fetch_array($record);
			
			$address = $n['facebook'];
			$name = $n['youtube'];
		}
 
	 if (isset($_POST["update"])) {
 
	
$cat=$_POST["category"];
$url=$_POST["url"];

 
  $query = "UPDATE link SET facebook='$cat',youtube='$url'";  
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
		<input class="catt" type="text" value="<?php if(!empty($address)){echo $address;} ?>" name="category" placeholder="Insert facebook link" required><br><br>
<input type="text" name="url" class="catt" required value="<?php if(!empty($name)){echo $name;} ?>" placeholder="Insert youtube link"><br><br>



	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>


	</form>
</div>


</center>
	</body>
</html>