<?php
include 'conn.php';



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql = "SELECT * FROM ads_app_user ORDER BY points DESC";
$results=mysqli_query($conn, $sql);
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="style.css" rel="stylesheet" type="text/css"/ >
	</head>
	<body>
		<div class="div1">
<!--a href="insert_status.php" class="edit_btn" >Add Status</a--> 
		<table id="custom">
	<thead>
		<tr>
			<th>id</th>
			<th>Email</th>
			<th>Final Points</th>
			<th>Estimated Impression</th>

		
		</tr>
	</thead>
	
	<?php $i=0; while ($row = mysqli_fetch_array($results)) { $i++; ?>
		<tr>
			<td><?php echo $i ?></td>
			<td>

				<?php echo $row['email']; ?>
			</td>
			
			<td>
					<?php echo $row['f_point']; ?>
			</td>
			<td>
					<?php echo $row['points']; ?>
			</td>
		</tr>
	<?php } ?>
</table>

		
	</body>
</html>



