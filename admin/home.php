<?php session_start();
if(isset($_SESSION['id_admin'])){
include "koneksi.php";
?>
    <!DOCTYPE  html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<title>Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">    
		<link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
		<link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">
		<script src="lib/jquery-1.8.1.min.js" type="text/javascript"></script>

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
        <link rel="shortcut icon" href="" type="image/x-icon">
        
	</head>
	<body class="">
	<!--<![endif]-->
		<div class="navbar">
			<div class="navbar-inner">
				 <div class="pull-right">
					<ul class="nav pull-right">
						<li id="fat-menu" class="dropdown">
							<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-user"></i> <?php echo $_SESSION['username'];?>
								<i class="icon-caret-down"></i>
							</a>

							<ul class="dropdown-menu">
								<li><a tabindex="-1" href="?page=setting">Setting</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="?page=logout" onclick="return confirm('Apakah Anda yakin akan keluar?')">Logout</a></li>
							</ul>
						</li>
						
					</ul>
				</div>
					<a class="brand" href="#"><span class= first>UJIAN ONLINE </span> 
			</div>
		</div>
		
		<div class="sidebar-nav">
			<a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-file"></i>Soal</a>
			<ul id="accounts-menu" class="nav nav-list collapse in">
				<li><a href="?page=soal">Input Soal</a></li>
				<li><a href="?page=view">Lihat Soal</a></li>
			</ul>
					
			<a href="#murid-menu" class="nav-header" data-toggle="collapse"><i class="icon-group"></i>Peserta</a>
			<ul id="murid-menu" class="nav nav-list collapse in">
				<li><a href="?page=murid">Daftar Peserta</a></li>
			</ul>
		</div>
	
		<div class="content">
		
			<div id="main-col">
			
				<div id="content-wrapper">
					<div id="content">
					<?php 
						if(isset($_GET['page'])){
							$page=htmlentities($_GET['page']);
						}else{
							$page="welcome";
						}
						
						$file="$page.php";
						$cek=strlen($page);
						
						if($cek>10 || !file_exists($file) || empty($page)){
							
						}else{
							include ($file);
						}
					?>		
					</div>
				</div>
			</div>

			
		</div>
			
		<script src="lib/bootstrap/js/bootstrap.js"></script>
	</body>
	</html>
    
<?php
}else{
	?><script language="javascript">document.location.href='index.php?status=Anda belum login!'</script><?php
}
?>