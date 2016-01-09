<div>
	<?php
		include "koneksi.php";
		session_start();
		
		if(isset($_POST['username'])){
			$username=htmlentities($_POST['username']);
			$password=md5($_POST['password']);
			
			if(empty($username) || empty($password)){
				?><p>Username atau Password anda masih kosong. silahkan ulangi <a href="indexa.php">Login</a></p><?php
			}else{
						
				$query=mysql_query("select * from tabel_user where username='$username' and password='$password'");
				$cek=mysql_num_rows($query);
				$data=mysql_fetch_array($query);
				
				if($cek){
					$_SESSION['username']=$username;
					$_SESSION['id_user']=$data['id_user'];
					
					
					?><script language="javascript">document.location.href='indexa.php'</script><?php
				}else{
					?><p>Anda gagal login. silahkan <a href="indexa.php">Login kembali</a></p><?php
					echo mysql_error();
				}
			}
		}else{
			unset($_POST['username']);
		}
	?>
</div>