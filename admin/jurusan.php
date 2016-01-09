<div class="header">
	<h1 class="page-title">Daftar Jurusan</h1>
</div>

<ul class="breadcrumb">
	<li><a href="?page=welcome">Home</a> <span class="divider">/</span></li>
	<?php
	if(isset($_GET['action'])){
		echo '<li><a href="?page=jurusan">Jurusan</a> <span class="divider">/</span></li><li class="active">Edit Jurusan</li>';
	}else{
		echo '<li class="active">Jurusan</li>';
	}?>
</ul>

<div class="container-fluid">
<div class="row-fluid">
			<?php 
				if(isset($_GET['action'])){
					//echo "ss";
					if($_GET['action'] == "delete"){
						$id = $_GET['id'];
						$query=mysql_query("delete from tabel_jurusan where id_jurusan='$id'");
						if($query){
							?><script language="javascript">document.location.href="?page=jurusan&notif=Jurusan telah sdihapus."</script><?php
						}else{
							echo mysql_error();
						}
					}
				}
					
				if(isset($_POST['tmbhJurusan'])){
					$nama_jurusan=$_POST['nama_jurusan'];
					$query=mysql_query("insert into tabel_jurusan values('','$nama_jurusan')");
					if($query){
						?><script language="javascript">document.location.href='?page=jurusan&notif=Jurusan telah ditambah.'</script><?php
					}else{
						echo mysql_error();
					}
				}
				
				if(isset($_POST['editJurusan'])){
					$id=$_POST['id'];
					$nama_jurusan=$_POST['nama_jurusan'];
					$query=mysql_query("update `tabel_jurusan` set `nama_jurusan`='".$nama_jurusan."'  where `id_jurusan`=".$id."");
					
					if($query){
						?><script language="javascript">document.location.href='?page=jurusan&notif=Jurusan telah diperbarui.'</script><?php
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
			
		<form name="formcari" action="?page=jurusan" method="post">
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
			<table cellpadding="0">
				<tr><?php
					if(isset($_GET['action'])){
						if($_GET['action'] == "edit"){
							$id = $_GET['id'];
							$query=mysql_query("select * from tabel_jurusan where id_jurusan='$id'");
							$row=mysql_fetch_array($query);?>
							<td>
								<input class="input-medium" placeholder="Nama Jurusan" type="text" name="nama_jurusan" value="<?php echo $row['nama_jurusan']; ?>">
							</td><tr></tr>
							<td>
								<input class="btn btn-primary" type="submit" name="editJurusan" id="editJurusan" value="Simpan" >
							</td><?php
						}
					}else{ ?>
						<td>
							<input class="input-medium" placeholder="Nama Jurusan" type="text" name="nama_jurusan" value="">
						</td><tr></tr>
						<td>						
							<input class="btn btn-primary" type="submit" name="tmbhJurusan" id="tmbhJurusan" value="Tambah" >
						</td><?php
					} ?>
					
				</tr>
			</table>
		</form>
		
		<table class="table table-striped" border="1">
			
			<tr>
				<td width ="15px">NO</td>
				<td><center>Nama Jurusan</center></td>
				<td width="125px"><center>Action</center></td>
			</tr>
			<?php
				$query = mysql_query("select * from tabel_jurusan");
				$no=0;
				while($row=mysql_fetch_array($query)){
				?>
					<tr>
						<td width ="15px"><?php echo $no=$no+1;?>.</td>
						<td><?php echo $row['nama_jurusan'];?></td>
						<td><center>[ <a href="?page=jurusan&action=edit&id=<?php echo $row['id_jurusan'];?>">Edit</a> | <a href="?page=jurusan&action=delete&id=<?php echo $row['id_jurusan'];?>">Hapus</a> ]</center></td>
					</tr>			
				<?php
				
			}
		?>
		</table>
		</div></div>