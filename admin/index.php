<?php
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);

	if (isset($_POST['login'])){

		include ("koneksi.php");
		
		$username=htmlentities((trim($_POST['username'])));
		$password=htmlentities(md5($_POST['password']));
		
		$login=mysql_query("select * from admin where username='$username' and password='$password'");
		$cek_login=mysql_num_rows($login);
		

		if (empty($cek_login)){	
			echo "<script> document.location.href='index.php?status=Password Anda salah!'; </script>";		
		}else{
			while ($row=mysql_fetch_array($login))
			{
				$id_admin=$row['id_admin'];
				$nama_admin=$row['nama_admin'];
				
				$_SESSION['id_admin']=$id_admin;
				$_SESSION['username']=$nama_admin;
			}
			echo "<script> document.location.href='home.php?page=welcome'; </script>";
		}
	}else{
		unset($_POST['login']);
	}
?>


<html>
	<head>
		<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
		<link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">
		<script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
		<link rel="shortcut icon" href="favicon.gif" type="image/x-icon">
		<title>Login</title>
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
	<body class="">
	
		<div class="navbar">
			<div class="navbar-inner">
                <ul class="nav pull-left">
                
                <a class="brand" href="admin/index.php"><span class="first">UJIAN</span> <span class="second"> ONLINE</span></a>
			    </ul>

                <ul class="nav pull-right">
                
                <a class="brand" href="../index.php"><span class="first">KEMBALI</span> <span class="second">HOME</span></a>
			    </ul>

			</div>
		</div>
	

    <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Login Administrator</p>
            <div class="block-body">
                <form action="index.php" method="post" name="postform">
                    <label>Username</label>
                    <input type="text" class="span12" name="username" id="username">
                    <label>Password</label>
                    <input type="password" name="password" class="span12">
					<input class="btn btn-primary btn-large span12" type="submit" value="LOGIN" name="login">
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
	</body>
</html>