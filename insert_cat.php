<?php
 	 include 'conn.php';

// initialize variables
	$name = "";
	$address = "";
	
	$update = false;

 	 if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($conn,"SELECT * FROM category WHERE id=$id");

		if ($record->num_rows == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['id'];
			$address = $n['name'];
			$url = $n['image'];
		}
	}


	 if (isset($_POST["update"])) {
 
 $id=$_POST["id"];	
$cat=$_POST["category"];
$url=$_POST["url"];

 $query1 = "SELECT * FROM category WHERE name='$cat'";
 $result =mysqli_query($conn, $query1);
 if(mysqli_num_rows($result)>0){
 	

            // no redirect
header( "Location: index.php" );
 	
 }else{ $query = "UPDATE category SET name='$cat',image='$url' WHERE id='$id'";  
      if(mysqli_query($conn, $query))  
      {  
           echo '<script>alert("Category Inserted into Database")</script>';  

            // no redirect
header( "Location: index.php" );
      } }




 }

 if (isset($_POST["save"])) {

$cat=$_POST["category"];
$url=$_POST["url"];

 $query1 = "SELECT * FROM category WHERE name='$cat'";
 $result =mysqli_query($conn, $query1);
 if(mysqli_num_rows($result)>0){
 	

            // no redirect
header( "Location: index.php" );
 	
 }else{
 	 $query = "INSERT INTO category(name,image) VALUES ('$cat','$url')";  
      if(mysqli_query($conn, $query))  
      {  
         

            // no redirect
header( "Location: index.php" );
      }
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
		<input class="catt" type="text" value="<?php if(!empty($address)){echo $address;} ?>" name="category" placeholder="Insert category name" required><br><br>
<input type="text" name="url" class="catt" required value="<?php if(!empty($url)){echo $url;} ?>" placeholder="Image url">

<input type="hidden" name="id" value="<?php echo $name; ?>">
<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
<?php endif ?>

	</form>
</div>


</center>
	</body>
</html>