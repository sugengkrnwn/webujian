<?php
require_once("koneksi.php");
$username = $_POST['username'];
$pass = md5($_POST['password']);

	if(!$username || !$pass) {
		echo "Masih ada data yang kosong!<br/>";
		echo "<a href='daftar.php'>&amp;amp;laquo; Back</a>";
	} else {
		$simpan = mysql_query("INSERT INTO tabel_user VALUES('','$username','$username','$pass','','','1')");
		if($simpan) {
			echo "Pendaftaran Sukses, Silahkan <a href='indexa.php'>Login</a>";
		} else {
			echo mysql_error();
		}
	}

?>