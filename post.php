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
<?php

$cons=mysqli_connect("localhost","root","","simpleblog");
	// Check connection
	if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($cons,"SELECT * FROM post WHERE Id='".$_GET["Id"]."'");
	while($row = mysqli_fetch_array($result)) {
echo'<title>Simple Blog | '.$row['Judul'].'</title>
';}
?>

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
<?php	

	$con=mysqli_connect("localhost","root","","simpleblog");
	// Check connection
	if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($con,"SELECT * FROM post WHERE Id='".$_GET["Id"]."'");
	while($row = mysqli_fetch_array($result)) {
	echo'
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time">'.$row['Tanggal'].'</time>
            <h2 class="art-title">'.$row['Judul'].'</h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p>'.$row['Konten'].'</p>
            <hr />
	';
   	}
	echo'
            <h2>Komentar</h2>
            <div id="contact-area">
                <form name="myForm" method="post">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="button" onclick="loadXMLDoc('.$row["Id"].');return false;" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>
			
			
		';
				if (mysqli_connect_errno()) {
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				$result = mysqli_query($con,"SELECT * FROM komentar WHERE Id='".$_GET["Id"]."' ORDER BY Tanggal desc");
				echo'
				<div id="myDiv">
				<ul class="art-list-body">
				';
				while($row = mysqli_fetch_array($result)) {
				echo'
					<li class="art-list-item">
							<div class="art-list-item-title-and-time">
								<h2 class="art-list-title"><a>'.$row['Nama'].'</a></h2>
								<div class="art-list-time">'.$row['Tanggal'].'</div>
							</div>
							<p>'.$row['Komentar'].'</p>
						</li>
				';
					}
	echo'
				</ul>
				</div>
				
        </div>
	</div> ';
?>	
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
  function loadXMLDoc(Id)
		{
		var nama = document.getElementById("Nama").value;
		var email = document.getElementById("Email").value;
		var komentar = document.getElementById("Komentar").value;
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("myDiv").innerHTML=xmlhttp.responseText+document.getElementById("myDiv").innerHTML;
			}
		  } 
		if (validateForm()){
		xmlhttp.open("GET","linkkomentar.php?Id="+<?php echo $_GET["Id"]?>+"&Nama="+nama+"&Email="+email+"&Komentar="+komentar,true);
		xmlhttp.send();
		}
		
		}
		
	function validateForm() {
		var x = document.forms["myForm"]["Email"].value;
		var atpos = x.indexOf("@");
		var dotpos = x.lastIndexOf(".");
		if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
			alert("Alamat email yang Anda masukan salah!");
			return false;
		}else{return true;}
	}
</script>

</body>
</html>