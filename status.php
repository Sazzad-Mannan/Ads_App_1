<?php
include 'conn.php';

if (isset($_GET['cat'])) {
		$id = $_GET['cat'];
		
		$results = mysqli_query($conn,"SELECT * FROM status_app WHERE category=$id");

		$sql = "SELECT id,status FROM status_app WHERE category='$id'";
$results=mysqli_query($conn, $sql);
	}
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="style.css" rel="stylesheet" type="text/css"/ >
	</head>
	<body>
		<div class="div1"><a href="index.php" class="edit_btn" >Home</a>
<a href="insert_status.php?cat=<?php echo $id;?>" class="edit_btn" >Add Status</a> <!--a href="insert_cat.php" class="edit_btn" >Add Category</a--> </div>
		<table id="custom">
	<thead>
		<tr>
			<th>id</th>
			<th>Status</th>
			
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php $i=0; while ($row = mysqli_fetch_array($results)) { $i++; ?>
		<tr>
			<td><?php echo $i ?></td>
			<td><?php echo $row['status']; ?></td>
			
			<td>
				<a href="insert_status.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="delete.php?del=<?php echo $row['id']; ?>&cat=<?php echo $id; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

		
	</body>
</html>