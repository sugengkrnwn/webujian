<div class="header">
	<h1 class="page-title">Pengaturan Administrator</h1>
</div>

<ul class="breadcrumb">
	<li><a href="?page=welcome">Home</a> <span class="divider">/</span></li>
	<li class="active">Pengaturan <span class="divider">/</span></li><li class="active">Administrator</li>
</ul>

<div class="container-fluid">
<div class="row-fluid">
<?php 
	if(isset($_GET['action'])){
		//echo "ss";
		if($_GET['action'] == "delete"){
			$id = $_GET['id'];
			$query=mysql_query("delete from admin where id_admin='$id'");
			if($query){
				?><script language="javascript">document.location.href="?page=setting&notif=Administrator telah dihapus."</script><?php
			}else{
				echo mysql_error();
			}
		}
	}
	
	if(isset($_POST['tmbhMurid'])){
		$nama_admin=$_POST['nama_admin'];
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$query=mysql_query("insert into admin values('','$nama_admin', '$username','$password')");
		if($query){
			?><script language="javascript">document.location.href='?page=setting&notif=Administrator telah ditambahkan.'</script><?php
		}else{
			echo mysql_error();
		}
	}
	
	if(isset($_POST['editMurid'])){
		$id=$_POST['id'];
		$nama_admin=$_POST['nama_admin'];
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$query=mysql_query("update `admin` set `nama_admin`='".$nama_admin."', `username`='".$username."', `password`='".$password."'  where `id_admin`=".$id."");
		
		if($query){
			?><script language="javascript">document.location.href='?page=setting&notif=Administrator telah diedit.'</script><?php
		}else{
			echo mysql_error();
		}
		
	}
	
	if(isset($_GET['notif'])){
		echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>
				<strong>Berhasil! </strong>';
		echo $_GET['notif'];
		echo '</div>';
	}
?>

<form name="formcari" action="?page=setting" method="post">
	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
	<table cellpadding="0">
		<tr><?php
			if(isset($_GET['action'])){
				if($_GET['action'] == "edit"){
					$id = $_GET['id'];
					$query=mysql_query("select * from admin where id_admin='$id'");
					$row=mysql_fetch_array($query);?>
					<td>
						<input class="input-medium" placeholder="Nama Administrator" type="text" name="nama_admin" value="<?php echo $row['nama_admin']; ?>">
						<input class="input-medium" placeholder="Username" type="text" name="username" value="<?php echo $row['username']; ?>">
						<input class="input-medium" placeholder="Password"type="password" name="password" value="">
					</td>
						</tr>
						<tr>
					<td>
						<input class="btn btn-primary" type="submit" name="editMurid" id="editMurid" value="Simpan" >
					</td>
					<?php
				}
			}else{?>
				<td>
					<input class="input-medium" placeholder="Nama Administrator" type="text" name="nama_admin" value="">
					<input class="input-medium" placeholder="Username" type="text" name="username" value="">
					<input class="input-medium" placeholder="Password"type="password" name="password" value="">
				</td>
						</tr>
						<tr>						
				<td>
					<input class="btn btn-primary" type="submit" name="tmbhMurid" id="tmbhMurid" value="Tambah" >
				</td><?php
			}
			?>

		</tr>
	</table>
</form>

<table class="table table-striped" border="1">
	<tr>
		<td width="15px"><center>NO</center></td>
		<td><center>Nama Administrator</center></td>
		<td width="125px"><center>Action</center></td>
	</tr>
	
	<?php
		$query = mysql_query("select * from admin");
		$no=0;
		while($row=mysql_fetch_array($query)){
		?>
			<tr>
				<td width="15px"><?php echo $no=$no+1;?>.</td>
				<td><?php echo $row['nama_admin'];?></td>
				<td width="125px"><center>[ <a href="?page=setting&action=edit&id=<?php echo $row['id_admin'];?>"> Edit </a> | <a href="?page=setting&action=delete&id=<?php echo $row['id_admin'];?>">Delete</a> ]</center></td>
			</tr>
		<?php
		
	}
?>
</table>
</div></div>