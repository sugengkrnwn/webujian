<?php
session_start();
if(isset($_SESSION['username'])) {
header('location:indexa.php'); }
?>
<html>
<head>
	<title>Form Pendaftaran</title>
	<link rel="stylesheet" type="text/css" href="css/login2.css">
</head>

<body>
<div id="daftar">
	
	<form action="prosesdaftar.php" method="post">
	
	<div id="judul">
	<a>Daftar Baru<a>
	</div>
		<center>
			<table>
				<tr><td>Username</td><td> : <input type="text" name="username"></td></tr>
				<tr><td>Password</td><td> : <input type="password" name="password"></td></tr>
				<tr><td colspan="2" align="right"><input type="submit" value="Daftar"> <input type="reset" value="Batal"></td></tr>
				<tr><td colspan="2" align="center">Sudah Punya akun ? <a href="indexa.php"><b>Login</b></a></td></tr>
			</table>
		</center>
	</form>
	
		</div>
		<div id="bawah">
			<div class="text_foot">TUGAS PEMROGRAMAN INTERNET | Universitas Dian Nuswantoro </div>
		</div>

</body>
</html>