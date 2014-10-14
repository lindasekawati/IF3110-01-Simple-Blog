<html>
<body>
<?php
// Create connection
$con=mysqli_connect("localhost","root","","simpleblog");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
	// escape variables for security
	$tanggal = mysqli_real_escape_string($con, $_POST['Tanggal']);
	$judul = mysqli_real_escape_string($con, $_POST['Judul']);
	$konten = mysqli_real_escape_string($con, $_POST['Konten']);

	mysqli_query($con,"INSERT INTO post (Judul, Tanggal, Konten)
	VALUES ('$judul', '$tanggal', '$konten')");


mysqli_close($con);

header('Location: index.php');

?>
</body>
</html>