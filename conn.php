 <?php 

 $conn = mysqli_connect("localhost", "root", "", "payment_gateway"); 
 	 // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

mysqli_query($conn,'SET CHARACTER SET utf8');
 mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");
 ?>