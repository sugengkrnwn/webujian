<?php
session_start();
include "koneksi.php";

error_reporting(E_ALL & ~E_NOTICE);
?>
    <!DOCTYPE  html>
    <html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Siswa</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="Description" content="description" />
		<meta name="Keywords" content="keywords" />
		<?php if(!isset($_SESSION['id_user'])){
			?><link rel="stylesheet" type="text/css" href="css/login.css">
           <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

			<?php
		}else{ ?>
			<link rel="stylesheet" type="text/css" href="admin/lib/bootstrap/css/bootstrap.css">    
			<link rel="stylesheet" type="text/css" href="admin/stylesheets/theme.css">
			<link rel="stylesheet" href="admin/lib/font-awesome/css/font-awesome.css">
			<script src="admin/lib/jquery-1.8.1.min.js" type="text/javascript"></script><?php
		}
		?>
        <link rel="shortcut icon" href="favicon.gif" type="image/x-icon">

		<script type="text/javascript">
			var detik="7200"
			if (document.images)
			{
				parselimit=detik
			}
			function begintimer()
			{
				if (!document.images)
				return
				if (parselimit==1)
					document.location='?page=nilai';
				else {
					parselimit-=1
					curmin=Math.floor(parselimit/60)
					cursec=parselimit%60
				if (curmin!=0)
					curtime=curmin+":"+cursec+""
				else
					curtime=cursec+" detik"
					document.getElementById("servertime").innerHTML=curtime
				setTimeout("begintimer()",1000)
				}
			}
		</script>
		<style type="text/css">
			#line-chart {
				height:300px;
				width:800px;
				margin: 0px auto;
				margin-top: 1em;
			}
			.brand { font-family: georgia, serif; }
			.brand .first {
				color: #ccc;
				font-style: italic;
			}
			.brand .second {
				color: #fff;
				font-weight: bold;
			}
		</style>
		
	</head>
	
	<body onLoad="begintimer()">			
		<div id="body-top">
		<?php				
			if(!isset($_SESSION['id_user'])){ ?>
				<div id="main_body">
					<div id="judul">Login Siswa</div>
					<form action="login.php" method="post" name="postform">						
						<div id="konten_member">
						  <label>User</label>
						   <div id="in_userpass"> : <input type="text" name="username" class="txt" id="username" />
						   </div>
						</div>
						
						<div id="konten_member">
							<label>Password</label>
							<div id="in_userpass"> : <input type="password" name="password" id="password"> </div>
						</div>

						<div id="button"><input name="login" type="submit" class="btn primary" value="Masuk"></div>
						<div id="konten_member">
						Belum Punya akun ? <a href="daftar.php"><b>Daftar</b></a>
						</div>
					</form>
					
				</div>
				    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">ujian online</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="index.php#page-top">home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php#artikel">Artikel</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="indexa.php">MURID</a>
                    </li>
                    <li>
                        <a class="page-scroll"  href="admin/index.php">GURU</a>
                    </li>
                    <li>
                        <a class="page-scroll"  href="#bukutamu">buku tamu</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
				
			
				<div id="Header">					
					<div class="text_foot"><center>SUGENG KURNIAWAN  |  A11.2013.07469 | Universitas Dian Nuswantoro </center></div>
					
				</div>					
			<?php
			} else {
			?>

		<div class="navbar">
			<div class="navbar-inner">
				 <div class="pull-right">
					<ul class="nav pull-right">
						<li><a href="?page=welcome" class="hidden-phone visible-tablet visible-desktop" role="button">Home</a></li>
						<li><a href="?page=ujian" class="hidden-phone visible-tablet visible-desktop" role="button">Ujian</a></li>
						<li><a href="?page=logout" class="hidden-phone visible-tablet visible-desktop" role="button">Logout</a></li>
					</ul>
				</div>
					<a class="brand" href="#"><span class="first">UJIAN </span> <span class="second">ONLINE</span></a>
			</div>
		</div>
			

			<?php
			
			?>
			<div>
				<?php 
					if(isset($_GET['page'])){
						$page=htmlentities($_GET['page']);
					}else{
						$page="welcome";
					}
					
					$file="$page.php";
					$cek=strlen($page);
					
					include ($file);
					}
				?>		
			</div>
		</div>
		<script src="lib/bootstrap/js/bootstrap.js"></script>
	</body>
	</html>	