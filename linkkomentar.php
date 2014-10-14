<?php
// Create connection
$con=mysqli_connect("localhost","root","","simpleblog");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
	// escape variables for security
	$id = mysqli_real_escape_string($con, $_GET['Id']);
	$nama = mysqli_real_escape_string($con, $_GET['Nama']);
	$email = mysqli_real_escape_string($con, $_GET['Email']);
	$komentar = mysqli_real_escape_string($con, $_GET['Komentar']);
	$tanggal = date("Y/m/d H:i:s" );

	mysqli_query($con,"INSERT INTO komentar (Id, Nama, Email, Komentar,Tanggal)
	VALUES ('$id', '$nama', '$email', '$komentar', '$tanggal')");
	echo'				
	<ul class="art-list-body">
		<li class="art-list-item">
			<div class="art-list-item-title-and-time">
				<h2 class="art-list-title"><a>'.$nama.'</a></h2>
				<div class="art-list-time">'.$tanggal.'</div>
			</div>
			<p>'.$komentar.'</p>
		</li>
	</ul>
	';
							
mysqli_close($con);


?>