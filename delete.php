<?php
include 'conn.php';

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	$cat= $_GET['cat'];
	mysqli_query($conn, "DELETE FROM status_app WHERE id=$id");
	$_SESSION['message'] = "Status deleted!"; 
	header("location: status.php?cat=$cat");
}


if (isset($_GET['del_cat'])) {
	$id = $_GET['del_cat'];
	$nam=$_GET['del_nam'];
	mysqli_query($conn, "DELETE FROM category WHERE id=$id");
	mysqli_query($conn, "DELETE FROM status_app WHERE category=$nam");
	$_SESSION['message'] = "Status deleted!"; 
	header('location: index.php');
}
?>