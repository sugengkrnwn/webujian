<div>
<?php
if(isset($_SESSION['id_admin'])){

	$id=$_GET['id'];
	
	$query=mysql_query("delete from tabel_soal where id_soal='$id'");
	
	if($query){
		?><script language="javascript">document.location.href="?page=view&notif=Soal telah dihapus."</script><?php
	}else{
		echo mysql_error();
	}

}else{
	?><p>Anda belum login. silahkan <a href="index.php">Login</a></p><?php
}
?>
</div>
