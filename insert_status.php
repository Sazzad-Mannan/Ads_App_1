<?php
 include 'conn.php'; 

  // initialize variables
	$name = "";
	$address = "";
	
	$update = false;


if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($conn,"SELECT * FROM status_app WHERE id=$id");

		if ($record->num_rows == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['category'];
			$address = $n['status'];
		}
	}


	if (isset($_GET['cat'])) {
		$id = $_GET['cat'];
		
		
	}





 if (isset($_POST["save"])) {
 	
$cat=$_POST["cat"];
$status=$_POST["stat"];



 $query = "INSERT INTO status_app(category,status) VALUES ('$cat','$status')";  
      if(mysqli_query($conn, $query))  
      {  
           echo '<script>alert("Category Inserted into Database")</script>';  

            // no redirect
header( "Location: status.php?cat=$cat" );
      } 


 }


  if (isset($_POST["update"])) {
 
 $id=$_POST["id"];	
$cat=$_POST["cat2"];
$status=$_POST["stat"];



 $query = "UPDATE status_app SET status='$status' WHERE id='$id'";  
      if(mysqli_query($conn, $query))  
      {  
           echo '<script>alert("Category Inserted into Database")</script>';  

            // no redirect
header( "Location: status.php?cat=$cat" );
      } 


 }

?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="style.css" rel="stylesheet" type="text/css"/ >
	</head>
	<body>
		<center>
			<!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
	


<div class="stat"><form id="status" action=""  method="post">

<?php if ($update == true): ?>
	
<?php else: ?>
	<input type="hidden" name="cat" value="<?php echo $id; ?>">
<?php endif ?>


	<br><br>
		<textarea class="catt"  cols="40" rows="10" name="stat"  placeholder="Write status.." required><?php if(!empty($address)){echo $address;} ?></textarea><br><br>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="cat2" value="<?php echo $name; ?>">
<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
<?php endif ?>
	</form></div>

</center>
	</body>
</html>