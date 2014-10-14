<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Deskripsi Blog">
<meta name="author" content="Judul Blog">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="omfgitsasalmon">
<meta name="twitter:title" content="Simple Blog">
<meta name="twitter:description" content="Deskripsi Blog">
<meta name="twitter:creator" content="Simple Blog">
<meta name="twitter:image:src" content="{{! TODO: ADD GRAVATAR URL HERE }}">

<meta property="og:type" content="article">
<meta property="og:title" content="Simple Blog">
<meta property="og:description" content="Deskripsi Blog">
<meta property="og:image" content="{{! TODO: ADD GRAVATAR URL HERE }}">
<meta property="og:site_name" content="Simple Blog">

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Simple Blog | Edit Post</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php"><h3>  +<h5>Post</h5></h3></a></li>
    </ul>
</nav>

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>Tambah Post</h2>

            <div id="contact-area">
                 <?php
				echo'<form method="post" action="linkeditpost.php?Id='.$_GET["Id"].'">';
					
					$con=mysqli_connect("localhost","root","","simpleblog");
					// Check connection
					if (mysqli_connect_errno()) {
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					$result = mysqli_query($con,"SELECT * FROM post WHERE Id='".$_GET["Id"]."'");
					while($row = mysqli_fetch_array($result)) {
 					echo '
					<label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul" value="'.$row['Judul'].'">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="Tanggal" id="Tanggal" value="'.$row['Tanggal'].'">
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten">'.$row['Konten'].'</textarea>
					';
					}
                    echo '<input type="submit" name="submit" value="Simpan" class="submit-button" onclick="return checkDate(Tanggal)">';
					?>
                </form>
            </div>
        </div>
    </div>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Asisten IF3110 /
        <a class="rss-link" href="#rss">RSS</a> /
        <br>
        <a class="twitter-link" href="http://twitter.com/YoGiiSinaga">Yogi</a> /
        <a class="twitter-link" href="http://twitter.com/sonnylazuardi">Sonny</a> /
        <a class="twitter-link" href="http://twitter.com/fathanpranaya">Fathan</a> /
        <br>
        <a class="twitter-link" href="#">Renusa</a> /
        <a class="twitter-link" href="#">Kelvin</a> /
        <a class="twitter-link" href="#">Yanuar</a> /
        
    </aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>
<script type="text/javascript">
  var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

  (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
      function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
      t=h.createElement(o);z=h.getElementsByTagName(o)[0];
      t.src='//www.google-analytics.com/analytics.js';
      z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
      ga('create',ga_ua);ga('send','pageview');
	  
 // Addopted from Original JavaScript code by Chirp Internet: www.chirp.com.au
  function checkDate(field)
  {
    var allowBlank = true;
    var minYear =  (new Date()).getFullYear();
	var minMonth = (new Date()).getMonth();
	var minDate = (new Date()).getDate();
	
    var errorMsg = "";

    // regular expression to match required date format
    re = /^(\d{4})\/(\d{1,2})\/(\d{1,2})$/;

    if(field.value != '') {
		  if(regs = field.value.match(re)) {
				if(regs[3] < 1 || regs[3] > 31) {
				  errorMsg = "Kesalahan memasukan tanggal : " + regs[3];
				} else if(regs[2] < 1 || regs[2] > 12) {
				  errorMsg = "Kesalahan memasukan bulan: " + regs[2];
				} else if(regs[3] >= minDate) {
					if(regs[2]>= minMonth ){
						if(regs[1]< minYear){
							errorMsg = "Tahun yang Anda masukan salah: " + regs[1] + " - harus sama dengan atau lebih dari " + minYear;
						}
					}else{
						if(regs[1]<= minYear){
							errorMsg = "Tahun yang Anda masukan salah: " + regs[1] + " - harus sama dengan atau lebih dari " + minMonth;}
					}
				} else if(regs[3]<minDate){
					if(regs[2]<= minMonth ){
						if(regs[1]<= minYear){
							errorMsg = "Tanggal yang Anda masukan salah: " +regs[3]+"/"+regs[2]+"/"+regs[1] + " - harus sama dengan atau lebih dari " + minDate+"/"+minMonth+"/"+minYear;
						}
					}else{
						if(regs[1]< minYear){
							errorMsg = "Bulan yang Anda masukan salah: " + regs[2] + " - harus sama dengan atau lebih dari " + minMonth;}
					}
				}
			}else {
			errorMsg = "Kesalahan format. " + field.value + "Seharusnya yyyy/mm/dd";}
		
	}else {
      errorMsg = "Masukkan tanggal";
    }
	
    if(errorMsg != "") {
      alert(errorMsg);
      field.focus();
      return false;
    }

    return true;
  }

</script>

</body>
</html>